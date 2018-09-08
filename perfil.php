<?php
require_once('php/database/DataBase.php');
require_once('php/funcionarios/Funcionarios.php');
require_once('php/alunos/Alunos.php');
session_start();
if($_SESSION['roleId'] != 1 && $_SESSION['roleId'] != 2 && $_SESSION['roleId'] != 3 && $_SESSION['roleId'] !=4)
{
  header("Location: index.php");
}
$db = new DataBase();
$conn = $db->getConnection();

$page_name = "Meus Dados";
 ?>
<html lang="pt">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/fav.ico">
  <title> Meu Perfil - Revolution School </title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/vertical-bar.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="assets/icons/open-iconic-master/font/css/open-iconic-bootstrap.css">
</head>
<body>

<?php include('header.php') ?>
    <div class="contratos">
    <div class="painel">
      <form>
        <?php
        if($_SESSION["tipoUsuario"] == 'f'){
          $funcionario = new Funcionarios($conn);
          $dados = $funcionario->GetFuncionarioByMatricula($_SESSION["matricula"]);
        }else {
          $alunos = new Alunos($conn);
          $dados = $alunos->GetAlunoByMatricula($_SESSION["matricula"]);
        }
          $countElements = 0;
          echo "<div class='form-row'>";
          foreach($dados as $key => $value){
            echo "<div class='form-group col-md'>";
            echo "<label for='{$key}'>{$key}:</label>";
            if($value == null){
              $value = "-";
            }
            echo "<input type='text' name={$key} class='form-control' value='{$value}' disabled />";
            echo "</div>";
            $countElements++;
            if($countElements > 6){
              $countElements = 0;
              echo "</div>";
              echo "<hr />";
              echo "<div class='form-row'>";
            }
          }
          if($countElements > 0){
            echo "</div>";
          }
         ?>
      </form>
    </div>
  </div>

<!-- DIV DE LOADING -->
<div id="page-cover">
  <img src="assets/gifs/loading-icon6.gif" id="loading-gif" />
</div>

<?php include('footer.php') ?>
</body>
<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mask.js"></script>
<script src="js/dynamical-dom.js"></script>
