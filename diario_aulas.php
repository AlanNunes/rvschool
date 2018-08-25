<?php
require_once('php/database/DataBase.php');
require_once('php/turmas/turmas.php');
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
  <title> Diário de Aulas - Revolution School </title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/vertical-bar.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="assets/icons/open-iconic-master/font/css/open-iconic-bootstrap.css">
</head>
<body>

<?php include('header.php') ?>

<br>
<div class="container-fluid" id="content" style="width: 86%; margin-left: 0px;">
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
  <a href="#" class="btn-expand-collapse" id="menu-toggle"><span class="oi oi-arrow-left"></span></a>
  <ul class="navbar-primary-menu">
    <form style="padding: 5px;">
      <li><a href="#"><h5>Filtros:</h5></a></li>
      <div class="form-row">
        <div class="form-group col-sm">
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
        <div class="form-group col-sm">
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
    <button type="button" class="btn btn-primary btn-block btn-sm" style="float: right;" onclick="buscaDiario()">Filtrar</button>
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
            var tr = "<tr><td align='center'>"+aulas[i].dataAula+"</td><td align='center'>"+aulas[i].numero+"</td><td align='center'>"+aulas[i].PaginaInicial+"-"+aulas[i].PaginaFinal+"</td><td align='center'><input type='text' class='form-control' style='width: 50px;' /></td><td align='center'><input type='text' class='form-control' style='width: 150px;' /></td><td align='center'><center><input type='number' class='form-control' style='width: 50px;' /></center></td><td align='center'><center><input type='text' class='form-control' style='width: 50px;' /></center></td><td></td></tr>";
            $("#tableContent").append(tr);
          }
        }
        else
        {
          console.log(data);
        }
      },
      error: function(data) {
        console.error(data);
      }
  });
}

function getStatus(pagina, paginaInicial, paginaFinal)
{
  if(Number(pagina) >= Number(paginaInicial) && Number(pagina) <= Number(paginaFinal))
  {
    return "Em dia";
  }
  else if(Number(pagina) >= Number(paginaFinal))
  {
    return "Adiantado";
  }
  else
  {
    return "Atrasado";
  }
}
</script>
</html>
