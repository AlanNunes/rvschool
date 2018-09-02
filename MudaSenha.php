<?php
require_once('php/database/DataBase.php');
require_once('php/turmas/turmas.php');
session_start();
if($_SESSION['roleId'] != 1 && $_SESSION['roleId'] != 2 && $_SESSION['roleId'] != 3)
{
  header("Location: index.php");
}
$db = new DataBase();
$conn = $db->getConnection();
// Create an instance for workers(funcionários)
$turmas = new Turmas($conn);

$page_name = "Diário de Aulas";
 ?>
<html lang="pt">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/fav.ico">
  <title> Mude sua Senha - Revolution School </title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/vertical-bar.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="assets/icons/open-iconic-master/font/css/open-iconic-bootstrap.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>

<?php include('header.php') ?>

<div class="div-center">


  <div class="content">


    <h3>Troca de Senha</h3>
    <hr />
    <form>
      <div id="feedback" style="color: green;"></div>
      <div class="form-group">
        <div class="form-group">
          <label for="senha">Digite uma Nova Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="Senha">
          <div class="invalid-feedback">
            Sua senha deve possuir no mínimo 7 caracteres.
          </div>
        </div>
        <label for="senhaConfirm">Digite Novamente a Senha</label>
        <input type="password" class="form-control" id="senhaConfirm" placeholder="Repita a Senha">
        <div class="invalid-feedback">
          As senhas informadas estão diferentes.
        </div>
      </div>
      <span class="group-btn">
        <a href="#" class="btnlogin" onclick="mudaSenha()">Confirmar <i class="fa fa-sign-in"></i></a>
      </span>
    </form>
  </div>
  </span>
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
<script>
function mudaSenha(){
  var senha = $("#senha").val();
  var senhaConfirm = $("#senhaConfirm").val();
  $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/login/controle.php",
        data: {'acao':'MudaSenha', 'senha':senha, 'senhaConfirm':senhaConfirm},
        success: function(data) {
          console.log(data);
          switch (data){
            case 1:
            // Sucesso
            $("#senha").removeClass("is-invalid");
            $("#senhaConfirm").removeClass("is-invalid");
            $("#senha").addClass("is-valid");
            $("#senhaConfirm").addClass("is-valid");
            $("#feedback").html("Sua senha foi atualizada com sucesso!<br/>");
              break;
            case 2:
            // As senhas não batem
            $("#senha").removeClass("is-invalid");
            $("#senha").addClass("is-valid");
            $("#senhaConfirm").removeClass("is-valid");
            $("#senhaConfirm").addClass("is-invalid");
              break;
            case 3:
            // Número de caracteres insuficientes
            $("#senha").removeClass("is-valid");
            $("#senha").addClass("is-invalid");
              break;
            default:
              console.log("erro");
          }
        },
        error: function(data) {
            console.log(data);
        }
    });
}
</script>
