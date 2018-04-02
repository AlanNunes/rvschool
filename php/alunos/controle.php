<?php
/**
 * This file is the controller of the Class Alunos.
 *
 * Data are received in this file from the view alunos.html and validated here.
 * The data is sent to the Class Alunos and then catch the response of the request and return it to the view.
 * Created on 31/03/2018
 *
 * @category   CategoryName
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 * @copyright  2018 Dual Dev
 */
include_once('../validation/Validation.php');
include_once('Alunos.php');
include_once('../database/DataBase.php');

$process = $_POST["acao"];

switch ($process) {
  case 'registrarAluno':
    registrarAluno();
    break;
  case 'listStudents':
    listStudents();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

// This function add a new student
function registrarAluno(){
  // This array has all the datas sent from the View alunos
  // The datas is put in the dictionary after passing by
  // the function safe_data() to make it safer and prevent SQL Injections
  $data = array(
    "nome" => safe_data($_POST["nome"]),
    "rg" => safe_data($_POST["rg"]),
    "cpf" => safe_data($_POST["cpf"]),
    "dataNasc" => safe_data($_POST["dataNasc"]),
    "estadoCivil" => safe_data($_POST["estadoCivil"]),
    "sexo" => safe_data($_POST["sexo"]),
    "escola" => safe_data($_POST["escola"]),
    "escolaridade" => safe_data($_POST["escolaridade"]),
    "serie" => safe_data($_POST["serie"]),
    "cep" => safe_data($_POST["cep"]),
    "logradouro" => safe_data($_POST["logradouro"]),
    "numeroCasa" => safe_data($_POST["numeroCasa"]),
    "complemento" => safe_data($_POST["complemento"]),
    "cidade" => safe_data($_POST["cidade"]),
    "bairro" => safe_data($_POST["bairro"]),
    "email" => safe_data($_POST["email"]),
    "telefone" => safe_data($_POST["telefone"]),
    "celular" => safe_data($_POST["celular"]),
    "banco" => safe_data($_POST["banco"]),
    "agencia" => safe_data($_POST["agencia"]),
    "conta" => safe_data($_POST["conta"]),
    "codigoClienteBanco" => safe_data($_POST["codigoClienteBanco"]),
    "bolsa" => safe_data($_POST["bolsa"]),
    "inadimplencia" => safe_data($_POST["inadimplencia"]),
    "nomeResponsavelUm" => safe_data($_POST["nomeResponsavelUm"]),
    "telefoneResponsavelUm" => safe_data($_POST["telefoneResponsavelUm"]),
    "celularResponsavelUm" => safe_data($_POST["celularResponsavelUm"]),
    "nomeResponsavelDois" => safe_data($_POST["nomeResponsavelDois"]),
    "telefoneResponsavelDois" => safe_data($_POST["telefoneResponsavelDois"]),
    "celularResponsavelDois" => safe_data($_POST["celularResponsavelDois"]),
    "observacoes" => safe_data($_POST["observacoes"]),
    "avatar" => safe_data($_POST["avatar"])
  );
  $dataSize = sizeof($data);
  $requiredFields = array(
    "nome",
    "dataNasc",
    "cidade",
    "bairro",
    "logradouro",
    "celular",
    "numeroCasa"
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

  if(validate_cpf($data["cpf"])){
    array_push($invalidFields, "cpf");
  }
  if(validate_telefone($data["telefone"]) && $data["telefone"] != ""){
    array_push($invalidFields, "telefone");
  }
  if(validate_celular($data["celular"]) && $data["celular"] != ""){
    array_push($invalidFields, "celular");
  }
  // if(validate_data($data["dataNasc"])){
  //   array_push($invalidFields, "dataNasc");
  // }
  if(validate_email($data["email"]) && $data["email"] != ""){
    array_push($invalidFields, "email");
  }
  if(validate_telefone($data["telefoneResponsavelUm"]) && $data["telefoneResponsavelUm"] != ""){
    array_push($invalidFields, "telefoneResponsavelUm");
  }
  if(validate_celular($data["celularResponsavelUm"]) && $data["celularResponsavelUm"] != ""){
    array_push($invalidFields, "celularResponsavelUm");
  }
  if(validate_telefone($data["telefoneResponsavelDois"]) && $data["telefoneResponsavelDois"] != ""){
    array_push($invalidFields, "telefoneResponsavelDois");
  }
  if(validate_celular($data["celularResponsavelDois"]) && $data["celularResponsavelDois"] != ""){
    array_push($invalidFields, "celularResponsavelDois");
  }

  // return false if there is no empty field
  $erro = (empty($invalidFields))? false:true;
  if($erro){
    $response = array('erro' => $erro, 'invalidFields' => $invalidFields);
    echo json_encode($response);
  }else{
    $db = new DataBase();
    $conn = $db->getConnection();
    $aluno = new Alunos($conn);
    $response = $aluno->registerStudent($data);
    echo json_encode($response);
  }
}

// This function do a request to the Class Alunos
// and receive all the students and then give back to the View as a JSON
function listStudents(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $aluno = new Alunos($conn);
    $response = $aluno->listStudents();
    // It return if there is any error or not and the data if there is
    echo json_encode($response);
}
 ?>
