<?php
/**
 * Created on 23/04/2018
 *
 * @category   CategoryName
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
include_once('../validation/Validation.php');
include_once('../database/DataBase.php');
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

function cadastrarContrato(){
  $data = validateData();
  if(!$data["erro"]){
    $db = new DataBase();
    $conn = $db->getConnection();

    $contrato = new Contratos($conn);
    $matriculaId = $contrato->matriculaAluno($data["aluno"], $data["turma"], $data["dataMatricula"], $data["dataInicioAtividades"]);
    $responseContrato = $contrato->cadastraContrato($data, $matriculaId);
    return json_encode($responseContrato);
  }else{
    return json_encode($data);
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
  $data = array(
    "aluno" => safe_data($_POST["aluno"]),
    "turma" => safe_data($_POST["turma"]),
    "dataMatricula" => safe_data($_POST["dataMatricula"]),
    "dataInicioAtividades" => safe_data($_POST["dataInicioAtividades"]),
    "numeroContrato" => safe_data($_POST["numeroContrato"]),
    "situacao" => safe_data($_POST["situacao"]),
    "tipo" => safe_data($_POST["tipo"]),
    "dataInicio" => safe_data($_POST["dataInicio"]),
    "dataTermino" => safe_data($_POST["dataTermino"]),
    "contratoTurmas" => safe_data($_POST["contratoTurmas"]),
    "contratoAulasLivres" => safe_data($_POST["contratoAulasLivres"]),
    "atendente1" => safe_data($_POST["atendente1"]),
    "atendente2" => safe_data($_POST["atendente2"]),
    "atendente3" => safe_data($_POST["atendente3"]),
    "dataContrato" => safe_data($_POST["dataContrato"]),
    "contratante" => safe_data($_POST["contratante"]),
  );
  $dataSize = sizeof($data);
  $requiredFields = array(
    "aluno",
    "turma",
    "dataMatricula",
    "dataInicioAtividades",
    "situacao",
    "tipo",
    "dataInicio",
    "dataTermino",
    "contratoTurmas",
    "contratoAulasLivres",
    "dataContrato",
    "contratante"
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
