<?php
require_once('php/database/DataBase.php');
require_once('php/turmas/turmas.php');
require_once('php/funcionarios/Funcionarios.php');
session_start();
if($_SESSION['roleId'] != 1 && $_SESSION['roleId'] != 2 && $_SESSION['roleId'] != 3)
{
  header("Location: index.php");
}
$db = new DataBase();
$conn = $db->getConnection();
// Create an instance for workers(funcionários)
$turmas = new Turmas($conn);
$professores = new Funcionarios($conn);

$page_name = "Pagamentos";
 ?>
<html lang="pt">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/fav.ico">
  <title> Relatório de Aulas - Revolution School </title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/vertical-bar.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="assets/icons/open-iconic-master/font/css/open-iconic-bootstrap.css">
</head>
<body>

<?php include('header.php') ?>

<br/>
<div id="feedbackSaving"></div>
<div id="relatorio" style="background: white; padding: 15px; margin: 15px; width: 80%;">
  <button type="button" class="btn btn-primary btn btn-block" onclick="printDiv('conteudoRelatorio')">Imprimir</button>
  <br /><br />
  <div id="conteudoRelatorio" style="min-height: 500px;">
    <i>Por favor, gere um relatório.</i>
  </div>
  <br />
  <button type="button" class="btn btn-primary btn btn-block" onclick="printDiv('conteudoRelatorio')">Imprimir</button>
</div>
<!-- DIV DE LOADING -->
<div id="page-cover">
  <img src="assets/gifs/loading-icon6.gif" id="loading-gif" />
</div>
<!-- FIM DIV DE LOADING -->
<!-- MENU VERTICAL -->
<nav class="navbar-primary" id="vertical-nav-bar">
  <ul class="navbar-primary-menu">
    <form style="padding: 5px;">
      <li><h3 style="font-family: Impact">Filtros:</h3></li>
      <div class="form-row">
        <div class="form-group form-group col-sm">
          <label for="IdProfessor">Selecione o Professor:</label>
          <span style="color:red;">*</span>
          <select id="IdProfessor" class="form-control">
            <option value="0">(Selecione)</option>
            <?php
              $sql = "SELECT * FROM funcionarios WHERE cargo = 3";
              $result = $conn->query($sql);
              if($result->num_rows > 0)
              {
                while($row = $result->fetch_assoc())
                {
                  $id = $row['id'];
                  $nome = $row['nome'];
                  echo "<option value='{$id}'>{$nome}</option>";
                }
              }
             ?>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group form-group col-sm">
          <label for="referencia">Digite a Referência</label>
          <span style="color:red;">*</span>
          <input type="text" class="form-control" id="referencia" placeholder="Ex.: 10/2018" />
        </div>
      </div>
    <button type="button" class="btn btn-primary btn-block btn-sm" style="float: right;" onclick="geraRelatorioPagamento();">Gerar</button>
    </form>
  </ul>
</nav>
<!-- FIM DE MENU VERTICAL -->


<!-- END MODAL FORM -->





<?php include('footer.php') ?>
</body>
<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/dynamical-dom.js"></script>
<script src="js/jquery.mask.js"></script>
<script>
$(document).ready(function(){
  $("#referencia").mask('99/9999');
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#vertical-nav-bar").toggleClass("collapsed");
  });
});

function geraRelatorioPagamento(){
  IdProfessor = $("#IdProfessor").val();
  referencia = $("#referencia").val();
  $.ajax({
      type: "POST",
      dataType: "json",
      url: "php/relatorios_pagamentos/controle.php",
      data: {'acao':'pagamento', 'IdProfessor':IdProfessor, 'Referencia': referencia},
      success: function(data) {
        console.log(data);
        $("#conteudoRelatorio").html("");
        if(data){
          i = 0;
          $("#conteudoRelatorio").append("<h3>Relatório de Aulas Dadas - Referência "+data.referencia+"</h3><br/>");
          $("#conteudoRelatorio").append(data.professorNome);
          for(i; i < data.aulas.length; i++){
            $("#conteudoRelatorio").append("<hr>");
            $("#conteudoRelatorio").append(convertDate(data.aulas[i][0]['data'])+"<br/><br/>");
            // $("#conteudoRelatorio").append("<hr>");
            console.log(data.aulas[i]);
            for(j = 0; j < data.aulas[i].length; j++){
              $("#conteudoRelatorio").append("<div style='padding-left: 90px'>"+data.aulas[i][j]['Inicio']+" às "+data.aulas[i][j]['Fim']+" - <i>"+data.aulas[i][j]['Turma']+"</i></div><br />");
            }
          }
          $("#conteudoRelatorio").append("<hr><br />");
          $("#conteudoRelatorio").append("<b><i>Valor hora/aula:</b> R$ "+Number(data.valorAula)+"</i><br />");
          $("#conteudoRelatorio").append("<b><i>Total de aulas:</b> R$ "+data.totalAulas+"</i><br />");
          $("#conteudoRelatorio").append("<b><i>Valor total:</b> R$ "+data.valorTotal+"</i><br />");
          $("#conteudoRelatorio").css("display", "block");
        }else{
          alert('Nenhuma aula encontrada!');
        }
      },
      error: function(data) {
        alert('erro');
        console.error(data);
      }
  });
}
function convertDate(dateString){
  var p = dateString.split(/\D/g)
  return [p[2],p[1],p[0] ].join("/")
}

function printDiv(id) {
  var divToPrint=document.getElementById(id);
  newWin= window.open("");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
}
</script>
</html>
