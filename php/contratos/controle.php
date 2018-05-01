<?php
/**
 * Created on 23/04/2018
 *
 * @category   CategoryName
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
include_once('../validation/Validation.php');
include_once('../database/DataBase.php');
include_once('../database/Contratos.php');

$process = $_GET["acao"];

switch ($process) {
  case 'cadastrarContrato':
    cadastrarContrato();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function cadastrarContrato(){
  $db = new DataBase();
  $conn = $db->getConnection();

  $contrato = new Contratos($conn);
}

 ?>
