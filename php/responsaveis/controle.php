<?php
/**
 * Created on 09/05/2018
 *
 * @category   Responsaveis
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
include_once('Responsaveis.php');
include_once('../database/DataBase.php');

$process = $_POST["acao"];

switch ($process) {
  case 'getResponsaveisByAlunoId':
    getResponsaveisByAlunoId();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function getResponsaveisByAlunoId(){
  if(isset($_POST["idAluno"]) && !empty($_POST["idAluno"])){
    $idAluno = $_POST["idAluno"];

    $db = new DataBase();
    $conn = $db->getConnection();

    $responsavel = new Responsaveis($conn);
    $responsaveis = $responsavel->getResponsaveisByAlunoId($idAluno);
    echo json_encode(array("erro" => false, "description" => "Responsáveis listados com sucesso", "responsaveis" => $responsaveis));
  }else{
    echo json_encode(array("erro" => true, "description" => "Dados inválidos", "responsaveis" => null));
  }
}

 ?>
