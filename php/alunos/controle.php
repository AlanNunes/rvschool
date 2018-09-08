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
include_once('../login/Usuarios.php');
include_once('../roles/RoleUsuarios.php');

$process = $_POST["acao"];

switch ($process) {
  case 'registrarAluno':
    registrarAluno();
    break;
  case 'listStudents':
    listStudents();
    break;

  case 'deleteStudent':
    deleteStudent();
    break;

  case 'editarAluno':
    editarAluno();
    break;

  case 'getAlunosByName':
    getAlunosByName();
    break;

  case 'getResponsaveis':
    getResponsaveis();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function validateData(){
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
    "profissao" => safe_data($_POST["profissao"]),
    "escolaridade" => safe_data($_POST["escolaridade"]),
    "midia" => safe_data($_POST["midia"]),
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
    "avatar" => safe_data($_POST["avatar"]),
    "matricula" => safe_data($_POST["matricula"])
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
  if($_POST['acao'] == 'editarAluno'){
    array_push($requiredFields, "matricula");
  }
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
  // if(validate_telefone($data["telefone"]) && $data["telefone"] != ""){
  //   array_push($invalidFields, "telefone");
  // }
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

  return array('erro' => $erro, 'invalidFields' => $invalidFields, 'data' => $data);
}

// This function add a new student
function registrarAluno(){
  $validateData = validateData();
  $invalidFields = $validateData['invalidFields'];
  $data = $validateData['data'];
  // Check for an error
  if($validateData['erro']){
    $response = array('erro' => true, 'invalidFields' => $invalidFields);
    echo json_encode($response);
  }else{
    $db = new DataBase();
    $conn = $db->getConnection();
    $aluno = new Alunos($conn);
    $response = $aluno->registerStudent($data);
    if($response['erro'] == false){
      $usuario = new Usuarios($conn);
      $senha = hash('sha256', $data['cpf']);
      $usuarioId = $usuario->registerUser($response['matricula'], $senha, 'a');
      if($usuarioId){
          $RolesUsuarios = new RoleUsuarios($conn);
          $RolesUsuarios->UsuarioId = $usuarioId;
          // Aluno
          $RolesUsuarios->RoleId = 4;
          if($RolesUsuarios->Add()){
            $conn->close();
            echo json_encode(array('erro' => false, 'Description' =>
            "Aluno registrado com sucesso."));
          }else {
            $conn->close();
            echo json_encode(array('erro' => true, 'Description' =>
        "O aluno foi registrado porém os acessos dele aos módulos
        falhou."));
          }
      }else{
          $conn->close();
          echo json_encode(array('erro' => true, 'Description' =>
      "O login do aluno não foi gerado."));
      }
    }else{
      $conn->close();
      echo json_encode($response);
    }
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

// This function calls a method to delete a student in the Class ALunos
// and return a json with the response
function deleteStudent(){
  if(isset($_POST["matricula"]) && !empty($_POST["matricula"])){
    $db = new DataBase();
    $conn = $db->getConnection();
    $aluno = new Alunos($conn);
    $response = $aluno->deleteStudent($_POST["matricula"]);
    // It return if there is any error or not and the data if there is
    echo json_encode($response);
  }else{
    echo json_encode(array('erro' => true, 'description' => 'Dados insuficientes.'));
  }
}

// This functions has the role to edit a student
function editarAluno(){
  $validateData = validateData();
  $invalidFields = $validateData['invalidFields'];
  $data = $validateData['data'];
  // Check for an error
  if($validateData['erro']){
    $response = array('erro' => true, 'invalidFields' => $invalidFields);
    echo json_encode($response);
  }else{
    $db = new DataBase();
    $conn = $db->getConnection();
    $aluno = new Alunos($conn);
    $response = $aluno->editStudent($data);
    echo json_encode($response);
  }
}

// Gets all the students(alunos) with the name like the one reported
function getAlunosByName(){
  if(isset($_POST["nome"]) && !empty($_POST["nome"])){
    $nome = $_POST["nome"];
    $db = new DataBase();
    $conn = $db->getConnection();

    $aluno = new Alunos($conn);
    $response = $aluno->getAlunosByName($nome);
    echo json_encode($response);
  }
}

function getResponsaveis(){
  if(isset($_POST["alunoId"]) && !empty($_POST["alunoId"])){
    $alunoId = $_POST["alunoId"];
    $db = new DataBase();
    $conn = $db->getConnection();

    $aluno = new Alunos($conn);
    $response = $aluno->getResponsaveis($alunoId);
    echo json_encode($response);
  }
}
 ?>
