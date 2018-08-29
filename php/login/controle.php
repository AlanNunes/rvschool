<?php
/**
 * Created on 26/08/2018
 *
 * @category   Login
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
include_once('Usuarios.php');
include_once('../log_acessos/LogAcessos.php');
include_once('../database/DataBase.php');

$process = $_POST["acao"];

switch ($process) {
  case 'Login':
    Login();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function Login(){
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];
    $db = new DataBase();
    $conn = $db->getConnection();
    $usuario = new Usuarios($conn);
    $login = $usuario->Loga($matricula, $senha);
    if($login){
      $log_acesso = new LogAcessos($conn);
      $log_acesso->RegistraLog($matricula, date('Y-m-d'));
      unset($_SESSION);
      $_SESSION["usuarioId"] = $login["usuarioId"];
      $_SESSION["matricula"] = $login["matricula"];
      $ultimoLogin = $usuario->GetUltimoLoginByMatricula($matricula);
      if($ultimoLogin){
        // O usuário já acessou a conta alguma vez
        echo 1;
      }else{
        // Primeiro acesso
        echo 2;
      }
    }else{
      echo 0;
    }
}

 ?>
