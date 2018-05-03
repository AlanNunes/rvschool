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
  $db = new DataBase();
  $conn = $db->getConnection();

  $contrato = new Contratos($conn);
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

 ?>
