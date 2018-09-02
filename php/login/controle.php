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
session_start();

$process = $_POST["acao"];

switch ($process) {
  case 'Login':
    Login();
    break;
  case 'MudaSenha':
    MudaSenha();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function MudaSenha(){
  $db = new DataBase();
  $conn = $db->getConnection();
  $usuario = new Usuarios($conn);
  if(isset($_SESSION['matricula']) && !empty($_SESSION['matricula'])){
    if(strlen($_POST['senha']) >= 7){
      if($_POST['senha'] === $_POST['senhaConfirm']){
        if($usuario->MudaSenha($_SESSION['matricula'], $_POST['senha'], $_POST['senhaConfirm'])){
          // Sucesso
          echo 1;
        }else{
          // Erro na hora de logar
          echo 0;
        }
      }else {
        // As senhas não batem
        echo 2;
      }
    }else {
      // Número de caracteres insuficientes
      echo 3;
    }
  }else {
    // Erro
    echo $_SESSION['matricula'];
  }
}

function Login(){
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];
    $db = new DataBase();
    $conn = $db->getConnection();
    $usuario = new Usuarios($conn);
    $login = $usuario->Loga($matricula, $senha);
    if($login){
      session_unset();
      session_destroy();
      session_start();
      $_SESSION["usuarioId"] = $login["usuarioId"];
      $_SESSION["matricula"] = $login["matricula"];
      $log_acesso = new LogAcessos($conn);
      $ultimoLogin = $usuario->GetUltimoLoginByMatricula($matricula);
      $log_acesso->RegistraLog($matricula, date('Y-m-d h:m:s'));
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
