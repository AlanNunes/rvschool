<?php
/**
 * Created on 09/05/2018
 *
 * @category   Responsaveis
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
include_once('RatingAulas.php');
include_once('../database/DataBase.php');

$process = $_POST["acao"];

switch ($process) {
  case 'registraRating':
    registraRating();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function registraRating(){
  session_start();
  if(isset($_POST['rate']) && !empty($_POST['rate'])){
    $rate = safeData($_POST['rate']);
    $texto = safeData($_POST['texto']);
    $idAula = safeData($_POST['idAula']);
    if($_POST['anonimo'] == "true"){
      $idUsuario = "null";
    }else {
      $idUsuario = $_SESSION["usuarioId"];
    }
    $db = new DataBase();
    $conn = $db->getConnection();
    $ratingAulas = new RatingAulas($conn);
    $ratingAulas->Rate = $rate;
    $ratingAulas->Feedback = $texto;
    $ratingAulas->IdUsuario = $idUsuario;
    $ratingAulas->IdAula = $idAula;
    if($ratingAulas->Add()){
      $conn->close();
      echo 1;
    }else {
      $conn->close();
      echo 0;
    }
  }else{
    // Falta dados
    echo 0;
  }
}


function safeData($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
