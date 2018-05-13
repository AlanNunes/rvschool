<?php
/**
 * Created on 23/04/2018
 *
 * @category   Controle de Contratos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
include_once('../validation/Validation.php');
include_once('../database/DataBase.php');
include_once('../matriculas/Matriculas.php');
include_once('Contratos.php');

$process = $_POST["acao"];

switch ($process) {
  case 'cadastrarContrato':
    cadastrarContrato();
    break;

  case 'getContratosByUserId':
    getContratosByUserId();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

// Esta função cadastra Contratos, porém antes de cadastrar o contrato ele matricula o aluno
function cadastrarContrato(){
  $data = validateData(); // Valida dados
  if(!$data["erro"]){ // Verifica se há campos inválidos
    // Pega os dados dos campos
    $data = $data["data"];
    $db = new DataBase();
    $conn = $db->getConnection();

    $matricula = new Matriculas($conn);
    // Matricula aluno
    $matriculaResponse = $matricula->matriculaAluno($data["aluno"], $data["turma"], $data["dataMatricula"], $data["dataInicioAtividades"]);

    // Verifica se ocorreu tudo certo no ato da matrícula
    if(!$matriculaResponse["erro"]){
      $contrato = new Contratos($conn);
      $contratoResponse = $contrato->cadastraContrato($data, $matriculaResponse["matriculaId"]);
      // Retorna a resposta do processo de contrato
      // A resposta pode ser um erro ou não
      echo json_encode($contratoResponse);
    }else{
      // Retorna a resposta de erro da matrícula
      echo json_encode($matriculaResponse);
    }
  }else{
    // Retorna a resposta de erro dos campos inválidos
    echo json_encode($data);
  }
}

function getContratosByUserId(){
  if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];

    $db = new DataBase();
    $conn = $db->getConnection();

    $contrato = new Contratos($conn);
    $result = $contrato->getContratosByUserId($id);
    $quantidade = 0;
    while($row = $result->fetch_assoc()){
      $dataInicio = $row["dataInicio"];
      $numero = $row["numero"];
      $nome = $row["nome"];
      $quantidade++;
      echo "<tr>
              <td scope='row'><a href='mostrarContratos.php?numero={$numero}'>{$numero}</a></td>
              <td>{$nome}</td>
              <td>{$dataInicio}</td>
            </tr>";
    }
    echo "<tr>
            <td class='text-center' colspan='3'>{$quantidade} contrato(s)</td>
          </tr>";
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
    "nomeAluno",
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
