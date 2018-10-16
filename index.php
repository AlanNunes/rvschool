<?php
session_start();
if($_SESSION['usuarioId'] == "" || $_SESSION['usuarioId'] == null)
{
  header("Location: login.php");
}
require_once('php/database/DataBase.php');
$db = new DataBase();
$conn = $db->getConnection();
$page_name = "Home";

// Função para pegar o primeiro e último nome de uma pessoa
function split_name($name) {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
}

// Dias da semana
$semana = array(
       'Sun' => 'Domingo',
       'Mon' => 'Segunda-Feira',
       'Tue' => 'Terca-Feira',
       'Wed' => 'Quarta-Feira',
       'Thu' => 'Quinta-Feira',
       'Fri' => 'Sexta-Feira',
       'Sat' => 'Sábado'
   );
 ?>

<html lang="pt">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/fav.ico">
  <title> Diário de Aulas - Revolution School </title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/vertical-bar.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="assets/icons/open-iconic-master/font/css/open-iconic-bootstrap.css">
</head>
<body>
<?php include('header.php') ?>
<br/><br/>
<center>
  <?php
  if($_SESSION["roleId"] == 4){
    include("ListaAulas.php");
  }else{
    include("schedule.php");
  }
   ?>
</center>
<?php include('footer.php') ?>
</body>
<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</html>
