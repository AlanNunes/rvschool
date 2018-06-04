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
include_once('Parcelas_Categorias.php');
include_once('../database/DataBase.php');

$process = $_POST["acao"];

switch ($process) {
  case 'registrarPlano':
    registrarPlano();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function registrarPlano(){
  $data = $_POST["data"];
  $validation = validateData($data);
  // Cria uma instância para o Banco de Dados
  $db = new DataBase();
  $conn = $db->getConnection();
  // Cria uma instância de Parcelas
  
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
    "forma-cobranca"
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
