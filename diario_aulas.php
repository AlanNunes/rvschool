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

$page_name = "Diário de Aulas";
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

<br/>
<div id="feedbackSaving"></div>
<div class="container-fluid" id="content" style="width: 86%; margin-left: 0px;">
  <div id="feedbackMobile"></div>
  <div class="table-responsive">
    <table class="table table-hover table-condensed table-sm" style ="cursor: pointer;">
      <thead class="thead-dark">
      <tr style="text-align: center;">
        <th scope="col">DATA</th>
        <th scope="col">DURAÇÃO</th>
        <th scope="col">PROGRAMAÇÃO</th>
        <th scope="col">PÁGINA</th>
        <th scope="col">CONTEÚDO</th>
        <th scope="col">DICTATION</th>
        <th scope="col">READING</th>
        <th scope="col">PROFESSOR</th>
        <th scope="col">SITUAÇÃO</th>
      </tr>
      </thead>
      <tbody id="tableContent" style="text-align: center;">
      </tbody>
    </table>
  </div>
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
          <label for="turmaId">Selecione a Turma:</label>
          <span style="color:red;">*</span>
          <select id="turmaId" class="form-control">
            <option value="0">(Selecione)</option>
            <?php
              $sql = "SELECT * FROM turmas";
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
          <label for="estagioId">Estágio:</label>
          <select id="estagioId" class="form-control">
            <option value="null">(Selecione)</option>
            <?php
            $sql = "SELECT * FROM estagios";
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
    <button type="button" class="btn btn-primary btn-block btn-sm" style="float: right;" onclick="buscaDiario();">Filtrar</button>
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
<script src="js/jquery.mask.js"></script>
<script src="js/dynamical-dom.js"></script>
<script>
$(document).ready(function(){
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#vertical-nav-bar").toggleClass("collapsed");
  });
});
function buscaDiario()
{
  var turmaId = $("#turmaId").val();
  var estagioId = $("#estagioId").val();

  $.ajax({
      type: "POST",
      dataType: "json",
      url: "php/aulas/controle.php",
      data: {'acao':'getAulasByTurma', 'IdTurma':turmaId, 'IdEstagio':estagioId},
      success: function(data) {
        console.log(data);
        if(!data.erro)
        {
          var aulas = data.aulas;
          $("#tableContent").html("");
          for(i = 0; i < aulas.length; i++)
          {
            if(aulas[i].PaginaInicial != null && aulas[i].PaginaFinal != null){
              pagina = aulas[i].PaginaInicial+"-"+aulas[i].PaginaFinal;
            }else{
              pagina = aulas[i].Descricao;
            }
            var tr = "<tr><td align='center'>"+aulas[i].dataAula+"</td><td align='center'>"+aulas[i].numero+"</td><td align='center'>"+pagina+"</td><td align='center'><input type='text' data-aulaid='"+aulas[i].idAula+"' onkeyup='atualizaStatus(this, "+aulas[i].idAula+", "+aulas[i].PaginaInicial+", "+aulas[i].PaginaFinal+");atualizaPagina(this);' value='"+mostraValor(aulas[i].pagina)+"' class='form-control' style='width: 50px;' /></td><td align='center'><input type='text' data-aulaid='"+aulas[i].idAula+"' value='"+mostraValor(aulas[i].conteudo)+"' onkeyup='atualizaConteudo(this)' class='form-control' style='width: 150px;' /></td><td align='center'><center><input type='text' value='"+mostraValor(aulas[i].dictation)+"' onkeyup='atualizaDictation(this)' data-aulaid='"+aulas[i].idAula+"' class='form-control' style='width: 50px;' /></center></td><td align='center'><center><input type='text' value='"+mostraValor(aulas[i].reading)+"' onkeyup='atualizaReading(this)' data-aulaid='"+aulas[i].idAula+"' class='form-control' style='width: 50px;' /></center></td><td data-idProfessor='"+aulas[i].idProfessor+"'>"+<?php if($_SESSION['roleId'] == 2){$prof = $professores->getProfessores(); echo "'<select id=professor class=form-control onchange=atualizaProfessor(this); data-aulaid='+aulas[i].idAula+' data-idprofessor='+aulas[i].idProfessor+'><option value=null>(Selecione)</option>'+"; foreach($prof as $p){$id=$p['id']; $nome=$p['nome']; echo "'<option value={$id}>{$nome}</option>'+";}echo "'</select>'+"; }else{echo "mostraNomeProfessor(aulas[i].nomeProfessor)+";} ?>"</td><td id='situacao-"+aulas[i].idAula+"'>"+getStatus(aulas[i].pagina, aulas[i].PaginaInicial, aulas[i].PaginaFinal)+"</td></tr>";
            $("#tableContent").append(tr);
          }
          selectProfessores();
          if($(window).width() <= 1070){
            $("#feedbackMobile").html("<strong>Deslize para os lados para ver todos os dados.");
            $("#vertical-nav-bar").toggleClass("collapsed");
          }else{
            $("#feedbackMobile").html("");
          }
        }
        else
        {
          console.log(data);
          alert(data.description);
        }
      },
      error: function(data) {
        console.error(data);
      }
  });
}

function selectProfessores(){
  selects = document.querySelectorAll('select[data-aulaid]');
  for(i = 0; i < selects.length; i++){
    for(j = 0; j < selects[i].options.length; j++){
      if(selects[i].options[j].value == selects[i].dataset.idprofessor){
        selects[i].options[j].selected = true;
      }
    }
  }
}

function getStatus(pagina, paginaInicial, paginaFinal)
{
  if(paginaInicial == null || paginaFinal == null)
  {
    return "-";
  }
  else if(Number(pagina) >= Number(paginaInicial) && Number(pagina) <= Number(paginaFinal))
  {
    return "<span class='emDia'>Em dia</span>";
  }
  else if(Number(pagina) >= Number(paginaFinal))
  {
    return "<span class='adiantado'>Adiantado</span>";
  }
  else if(Number(pagina) == 0)
  {
    return "<span class='atrasado'>-</span>";
  }
  else
  {
    return "<span class='atrasado'>Atrasado</span>";
  }
}

function mostraValor(v)
{
  if(v == null)
  {
    return "";
  }
  else
  {
    return v;
  }
}

function mostraNomeProfessor(v){
  if(v == null){
    return "<span class='atrasado'>-</span>";
  }else{
    var nomes = v.split(' ');
    return "<span style='color: #6ba2f9'>"+nomes[0]+" "+nomes[nomes.length-1]+"</span>";
  }
}

function mostraValorComRisco(v)
{
  if(v == null)
  {
    return "<span class='atrasado'>-</span>";
  }
  else
  {
    return v;
  }
}

function atualizaPagina(e)
{
  pagina = e.value;
  aulaId = $(e).data("aulaid");
  tr = e.closest("tr");
  if(tr.querySelector("select") != null){
    professor = tr.querySelector("select").value;
    console.log(professor);
  }else{
    professor = null;
  }
  $.ajax({
      type: "POST",
      dataType: "json",
      url: "php/aulas/controle.php",
      data: {'acao':'atualizaPagina', 'aulaId':aulaId, 'pagina':pagina, 'professorId':professor},
      before: function() {
        // $("#feedbackSaving").html("<strong>Salvando...</strong>");
        $(window).on("beforeunload", function() {
    			return "Alguns dados ainda estão sendo salvos. Se você sair agora poderá perdê-los.";
    		});
      },
      success: function(data) {
        $(window).off("beforeunload");
        if(data){
          // $("#feedbackSaving").html("<strong>Salvo!</strong>");
        }else{
          // $("#feedbackSaving").html("<strong>Erro ao tentar salvar uma alteração.</strong>");
        }
        console.log(data);
      },
      error: function(data) {
        console.error(data);
      }
  });
}

function atualizaConteudo(e)
{
  conteudo = e.value;
  aulaId = $(e).data("aulaid");
  tr = e.closest("tr");
  if(tr.querySelector("select") != null){
    professor = tr.querySelector("select").value;
    console.log(professor);
  }else{
    professor = null;
  }
  console.log(e);
  $.ajax({
      type: "POST",
      dataType: "html",
      url: "php/aulas/controle.php",
      data: {'acao':'atualizaConteudo', 'aulaId':aulaId, 'conteudo':conteudo, 'professorId':professor},
      before: function() {
        $(window).on("beforeunload", function() {
    			return "Alguns dados ainda estão sendo salvos. Se você sair agora poderá perdê-los.";
    		});
      },
      success: function(data) {
        $(window).off("beforeunload");
        console.log(data);
      },
      error: function(data) {
        console.error(data);
      }
  });
}

function atualizaDictation(e)
{
  dictation = e.value;
  aulaId = $(e).data("aulaid");
  tr = e.closest("tr");
  if(tr.querySelector("select") != null){
    professor = tr.querySelector("select").value;
    console.log(professor);
  }else{
    professor = null;
  }
  $.ajax({
      type: "POST",
      dataType: "json",
      url: "php/aulas/controle.php",
      data: {'acao':'atualizaDictation', 'aulaId':aulaId, 'dictation':dictation, 'professorId':professor},
      before: function() {
        $(window).on("beforeunload", function() {
    			return "Alguns dados ainda estão sendo salvos. Se você sair agora poderá perdê-los.";
    		});
      },
      success: function(data) {
        $(window).off("beforeunload");
        console.log(data);
      },
      error: function(data) {
        console.error(data);
      }
  });
}

function atualizaReading(e)
{
  reading = e.value;
  aulaId = $(e).data("aulaid");
  tr = e.closest("tr");
  if(tr.querySelector("select") != null){
    professor = tr.querySelector("select").value;
    console.log(professor);
  }else{
    professor = null;
  }
  $.ajax({
      type: "POST",
      dataType: "json",
      url: "php/aulas/controle.php",
      data: {'acao':'atualizaReading', 'aulaId':aulaId, 'reading':reading, 'professorId':professor},
      before: function() {
        $(window).on("beforeunload", function() {
    			return "Alguns dados ainda estão sendo salvos. Se você sair agora poderá perdê-los.";
    		});
      },
      success: function(data) {
        $(window).off("beforeunload");
        console.log(data);
      },
      error: function(data) {
        console.error(data);
      }
  });
}

function atualizaProfessor(e)
{
  professorId = e.value;
  aulaId = $(e).data("aulaid");
  $.ajax({
      type: "POST",
      dataType: "json",
      url: "php/aulas/controle.php",
      data: {'acao':'atualizaProfessor', 'aulaId':aulaId, 'professorId':professorId},
      before: function() {
        $(window).on("beforeunload", function() {
    			return "Alguns dados ainda estão sendo salvos. Se você sair agora poderá perdê-los.";
    		});
      },
      success: function(data) {
        $(window).off("beforeunload");
        console.log(data);
      },
      error: function(data) {
        console.error(data);
      }
  });
}

function atualizaStatus(e, idAula, paginaInicial, paginaFinal)
{
  pagina = e.value;
  $("#situacao-"+idAula).html(getStatus(pagina, paginaInicial, paginaFinal));
}
</script>
</html>
