<?php
/**
 * This file is the controller of the Class Interessados.
 *
 * Data are received in this file from the view alunos.html and validated here.
 * The data is sent to the Class Interessados and then catch the response of the request and return it to the view.
 * Created on 31/03/2018
 *
 * @category   Interessados
 * @author     Gustavo Brandão <sm70plus2gmail.com>
 * @copyright  2018 Dual Dev
 */
include_once('Parcelas.php');
include_once('Parcelas_Categorias.php');
include_once('../database/DataBase.php');

// Define o time zone para São Paulo
date_default_timezone_set('America/Sao_Paulo');

$process = $_POST["acao"];

switch ($process) {
  case 'registrarPlano':
    registrarPlano();
    break;

  case 'quitarParcela':
    quitarParcela();
    break;

  case 'getParcelaByIdAplicandoDescontos':
    getParcelaByIdAplicandoDescontos();
    break;

  case 'listParcelasByFilter':
    listParcelasByFilter();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}


/**
* Pega a parcela de acordo com o ID
* Retorna a parcela já com os descontos aplicados
*/
function getParcelaByIdAplicandoDescontos()
{
  if (isset($_POST['id']) OR !empty($_POST['id']))
  {
    $id = $_POST['id'];
    $db = new DataBase();
    $conn = $db->getConnection();
    $parcela = new Parcelas($conn);
    $valor_original = $parcela->getParcelaValorById($id);
    // Retorna o desconto da parcela ( number )
    $desconto = $parcela->getDescontoByParcelaId($id);
    $bolsa = $parcela->getBolsaByParcelaId($id);
    $percentualBolsa = 0;
    if ($bolsa)
    {
      // Entrou na condição, então significa que esta parcela possui bolsa
      if($bolsa['fixa'])
      {
        $percentualBolsa = $bolsa['desconto'];
      }
      else
      {
        $dataAgora = date('d-m-Y');
        if (strtotime($dataAgora) >= strtotime($bolsa['dataInicio'])
            && strtotime($dataAgora) <= strtotime($bolsa['dataTermino']))
        {
          $percentualBolsa = $bolsa['desconto'];
        }
      }
    }
    // Valor que o aluno deve pagar
    $mensalidade = $valor_original - $desconto;
    if($percentualBolsa)
    {
      $mensalidade = ($mensalidade * $percentualBolsa) / 100;
    }
    echo json_encode(array('mensalidade' => $mensalidade, 'valor_original' =>
                          $valor_original, 'desconto' => $desconto,
                          'percentualBolsa' => $percentualBolsa));
  }
  else
  {
    echo false;
  }
}

/**
* Quita uma Parcela
*/
function quitarParcela()
{
  $data = $_POST['data'];
  $invalidFields = [];
  if (!isset($data['conta_bancaria']) OR empty($data['conta_bancaria']))
  {
    array_push($invalidFields, 'conta_bancaria');
  }
  if (!isset($data['data_recebimento']) OR empty($data['data_recebimento']))
  {
    array_push($invalidFields, 'data_recebimento');
  }
  if (!isset($data['forma_de_cobranca']) OR empty($data['forma_de_cobranca']))
  {
    array_push($invalidFields, 'forma_de_cobranca');
  }
  if (!isset($data['troco']) OR empty($data['troco']))
  {
    array_push($invalidFields, 'troco');
  }
  if (!isset($data['valor_recebido']) OR empty($data['valor_recebido']))
  {
    array_push($invalidFields, 'valor_recebido');
  }
  if ($data['cartao'])
  {
    if (!isset($data['operadora_cartao']) OR empty($data['operadora_cartao']))
    {
      array_push($invalidFields, 'operadora_cartao');
    }
  }
  if ($invalidFields)
  {
    echo json_encode(array('erro' => true, 'invalidFields' => $invalidFields));
  }
  else
  {
    // Todos os dados estão válidos, vamos quitar a parcela agora
    $db = new DataBase();
    $conn = $db->getConnection();
    $parcela = new Parcelas($conn);
    $parcela->id = $data['id'];
    $parcela->setDesconto($data['desconto']);
    $parcela->setValor_Recebido($data['valor_recebido']);
    $parcela->setTroco($data['troco']);
    $parcela->dataRecebimento = $data['data_recebimento'];
    $parcela->formaCobranca = $data['forma_de_cobranca'];
    $parcela->operadoraCartao = ($data['operadora_cartao'])?"{$data['operadora_cartao']}":'null';
    $parcela->contaBancaria = $data['conta_bancaria'];
    $response = $parcela->quitar();
    echo json_encode(array('erro' => !$response));
  }
}

/**
* Filtra as Parcelas
*
* Filtra as parcelas de acordo com o número do mês, a situação da parcela e o
* nome do aluno
*/
function listParcelasByFilter()
{
  $data = $_POST['data'];
  if (isset($data['aluno']) && isset($data['mes'])
  && !empty($data['mes']) && isset($data['situacoes'])
  && !empty($data['situacoes']))
  {
    // Cria uma instância para o Banco de Dados
    $db = new DataBase();
    $conn = $db->getConnection();
    // Cria uma instância de Parcelas
    $parcelas = new Parcelas($conn);
    $aluno = $data['aluno'];
    $mes = $data['mes'];
    $situacoes = $data['situacoes'];
    for($i = 0; $i < sizeof($situacoes); $i++)
    {
      $situacoes[$i] = ($situacoes[$i] == "")? "-": $situacoes[$i];
    }
    echo json_encode($parcelas->getParcelasByFilter($aluno, $mes, $situacoes));
  }
  else
  {
    echo 0;
  }
}

function registrarPlano()
{
  $data = $_POST["data"];
  $validation = validateData($data);
  if($validation['erro']){
    echo json_encode($validation);
  }else{
    $params = $validation['data']; // Pega os parâmetros que passaram pela validação
    // Cria uma instância para o Banco de Dados
    $db = new DataBase();
    $conn = $db->getConnection();
    // Cria uma instância de Parcelas
    $parcelas = new Parcelas($conn);
    $parcelas->aluno = $params['aluno'];
    $parcelas->setValor($params['valor-parcela']);
    $parcelas->dataVencimento = $params['data-vencimento'];
    $parcelas->categoria = $params['categoria'];
    $parcelas->setDesconto($params['desconto-manual']);
    $parcelas->setBolsa($params['bolsa']);
    $parcelas->situacao_parcela = 'Pendente'; // Se refere à tabela situações de parcelas
    $parcelas->setObservacoes($params['observacoes']);
    $response = $parcelas->registrarParcelas($params['parcelas-quantidade'], filter_var($params['quitar-primeira-parcela'], FILTER_VALIDATE_BOOLEAN));
    echo json_encode($response);
  }

}

function validateData($data){
  $data = $data[0];
  $dataSize = sizeof($data);
  $requiredFields = array(
    "aluno",
    "parcelas-quantidade",
    "valor-parcela",
    "valor-total",
    "data-vencimento",
    "categoria",
  );
  $requiredAmount = sizeof($requiredFields);
  $i = 0;
  $invalidFields = array();
  // Check if the required fields are empties
  for($i; $i < $requiredAmount; $i++){
    $index = $requiredFields[$i];
    if(empty($data[$index]) OR !isset($data[$index])){
      // add the index of the field that is empty into invalidFields
      array_push($invalidFields, $index);
    }
  }
  // return false if there is no empty field
  $erro = (empty($invalidFields))? false:true;

  return array('erro' => $erro, 'invalidFields' => $invalidFields, 'data' => $data);
}
 ?>
