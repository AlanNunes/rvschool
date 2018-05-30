<?php
/**
 * Created on 23/04/2018
 *
 * @category   Controle de Contratos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
include_once('../database/DataBase.php');
include_once('../alunos/Alunos.php');
include_once('../responsaveis/Responsaveis.php');
include_once('Documentos.php');

$process = $_POST["acao"];

switch ($process) {
  case 'imprimirDocumento':
    imprimirDocumento();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function imprimirDocumento(){
  $data = $_POST['data'];
  if(!empty($data['alunoId']) && isset($data['alunoId']) && isset($data['responsavelId']) && isset($data['tipoDocumento']) && !empty($data['tipoDocumento'])){
    $alunoId = $data['alunoId'];
    $responsavelId = $data['responsavelId'];
    $tipoDocumento = $data['tipoDocumento'];

    $db = new DataBase();
    $conn = $db->getConnection();
    $alunos = new Alunos($conn);
    $responsaveis = new Responsaveis($conn);

    switch ($tipoDocumento) {
      case '1':
        // Documento de Matrícula
        include_once('Documentos_Matricula.php');
        $documentos = new Documentos_Matricula($conn);
        break;

      case '2':
        // Contrato That's The Way
        include_once('Documentos_Contrato_Thats_The_Way.php');
        $documentos = new Documentos_Contrato_Thats_The_Way($conn);
        break;

      case '3':
        // Contrato Kids
        include_once('Documentos_Contrato_Kids.php');
        $documentos = new Documentos_Contrato_Kids($conn);
        break;

      case '4':
        // Contrato Promocao
        include_once('Documentos_Contrato_Promocao.php');
        $documentos = new Documentos_Contrato_Promocao($conn);
        break;

      default:
        // Erro
        echo json_encode(array('erro' => true, 'description' => 'Este tipo de contrato não foi encontrado.'));
        break;
    }

    $documentos->vencimento = '26/05/2018';
    $documentos->parcelas = 12;
    $documentos->parcelaValor = 295.00;
    $documentos->valorTotal = 295.00*12;
    // $documentos->titulo = "DOCUMENTO DE MATRÍCULA";
    $aluno = $alunos->getAlunoById($alunoId);
    if($responsavelId > 0){
      $responsavel = $responsaveis->getResponsavelById($responsavelId);
      $documentos->setAlunosDados($aluno);
      $documentos->setResponsavelDados($responsavel);
      $documentos->buildDocumento();
      echo json_encode(array('erro' => false, 'description' => 'O documento foi gerado com sucesso.', 'documento' => $documentos->getDocumento()));
    }else{
      $documentos->setAlunosDados($aluno);
      $documentos->setResponsavelDados($aluno);
      $documentos->buildDocumento();
      echo json_encode(array('erro' => false, 'description' => 'O documento foi gerado com sucesso.', 'documento' => $documentos->getDocumento()));
    }
  }else{
    echo json_encode(array('erro' => true, 'description' => 'Dados Insuficientes !'));
  }
}

function validateData(){
  // This array has all the datas sent from the View alunos
  // The datas is put in the dictionary after passing by
  // the function safe_data() to make it safer and prevent SQL Injections
  $dataPOST = $_POST["data"];
  // echo json_encode($dataPOST);
  $data = array(
    "aluno" => safe_data($dataPOST["aluno"]),
    "turma" => safe_data($dataPOST["turma"]),
    "dataMatricula" => safe_data($dataPOST["dataMatricula"]),
    "dataInicioAtividades" => safe_data($dataPOST["dataInicioAtividades"]),
    "numeroContrato" => safe_data($dataPOST["numeroContrato"]),
    "situacaoContrato" => safe_data($dataPOST["situacaoContrato"]),
    "tipoContrato" => safe_data($dataPOST["tipoContrato"]),
    "dataInicio" => safe_data($dataPOST["dataInicio"]),
    "dataTermino" => safe_data($dataPOST["dataTermino"]),
    "contratoTurmas" => safe_data($dataPOST["contratoTurmas"]),
    "contratoAulasLivres" => safe_data($dataPOST["contratoAulasLivres"]),
    "atendente1" => safe_data($dataPOST["atendente1"]),
    "atendente2" => safe_data($dataPOST["atendente2"]),
    "atendente3" => safe_data($dataPOST["atendente3"]),
    "dataContrato" => date("Y-m-d"),
    "contratante" => safe_data($dataPOST["contratante"]),
    "curso" => safe_data($dataPOST["curso"]),
    "estagio" => safe_data($dataPOST["estagio"]),
    "horario" => safe_data($dataPOST["horario"]),
  );
  $dataSize = sizeof($data);
  $requiredFields = array(
    "aluno",
    "turma",
    "dataMatricula",
    "dataInicioAtividades",
    "situacaoContrato",
    "tipoContrato",
    "dataInicio",
    "dataTermino",
    "contratoTurmas",
    "contratoAulasLivres",
    "dataContrato",
    "curso",
    "estagio",
    "horario"
    // "contratante"
  );
  $requiredAmount = sizeof($requiredFields);
  $i = 0;
  $invalidFields = array();
  // Check if the required fields are empties
  for($i; $i < $requiredAmount; $i++){
    $index = $requiredFields[$i];
    if(empty($data[$index]) OR !isset($data[$index])){
      // add the index of the field that is empty or null into invalidFields
      array_push($invalidFields, $index);
    }
  }

  // return false if there is no empty field
  $erro = (empty($invalidFields))? false:true;

  return array('erro' => $erro, 'description' => 'Oops !<br/> Dê uma olhadinha nos campos, parece que você esqueceu de preencher algo !', 'invalidFields' => $invalidFields, 'data' => $data);
}

 ?>
