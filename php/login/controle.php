<?php
/**
 * Created on 26/08/2018
 *
 * @category   Controle de Contratos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
include_once('Usuarios.php');
include_once('../database/DataBase.php');

$process = $_POST["acao"];

switch ($process) {
  case 'logar':
    logar();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function logar(){
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];
    $db = new DataBase();
    $conn = $db->getConnection();
    $usuario = new Usuarios($conn);
}

 ?>
