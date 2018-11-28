<!--
* @category   Schedule
* @author     Alan Nunes <alann.625@gmail.com>
* @copyright  2018 Dual Dev
-->
<?php
session_start();
require_once('php/database/DataBase.php');
require_once('php/turmas/turmas.php');
require_once('php/funcionarios/Funcionarios.php');
$db = new DataBase();
$conn = $db->getConnection();
$turma = new Turmas($conn);
$funcionario = new Funcionarios($conn);
date_default_timezone_set('America/Sao_Paulo');
$page_name = "Gerenc. Schedule";

$monday = date('Y-m-d',strtotime('Monday this week'));
$tuesday = date('Y-m-d',strtotime('Tuesday this week'));
$wednesday = date('Y-m-d',strtotime('Wednesday this week'));
$thursday = date('Y-m-d',strtotime('Thursday this week'));
$friday = date('Y-m-d',strtotime('Friday this week'));
$saturday = date('Y-m-d',strtotime('Saturday this week'));
?>

<html lang="pt">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/fav.ico">
  <title> Gerenciar Schedule </title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/vertical-bar.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="assets/icons/open-iconic-master/font/css/open-iconic-bootstrap.css">
  <style>
  @media print
  {
    #schedule {
      background: black!important;
    }
  }
  </style>
</head>
<body>
  <?php include('header.php') ?>
  <br/><br/>
  <center>
    <!--TABLE SCHEDULE-->
    <br>
    <div class="container-fluid">
      <div class="table-responsive">
        <table id="schedule" class="table table-hover" style="text-align: center;">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Time</th>
              <th scope="col" style="width: 10%">Class</th>
              <th scope="col">Stage</th>
              <th scope="col"><?php echo date('d/m/Y', strtotime($monday)); ?>  Monday</th>
              <th scope="col"><?php echo date('d/m/Y', strtotime($tuesday)); ?>  Tuesday</th>
              <th scope="col"><?php echo date('d/m/Y', strtotime($wednesday)); ?>  Wednesday</th>
              <th scope="col"><?php echo date('d/m/Y', strtotime($thursday)); ?>  Thursday</th>
              <th scope="col"><?php echo date('d/m/Y', strtotime($friday)); ?>  Friday</th>
              <th scope="col"><?php echo date('d/m/Y', strtotime($saturday)); ?>  Saturday</th>
              <th scope="col">Salvar</th>
            </tr>
          </thead>
          <tbody id="tableContent">
            <?php
            $todasTurmas = $turma->listTurmas();
            if($todasTurmas['erro'] == false){
              $n = 1;
              foreach ($todasTurmas['response'] as $t) {
                $idTurma = $t['id'];
                $idHorario = $t['IdHorario'];
                echo "<tr>";
                echo "<td data-horario='{$idHorario}' data-numero='{$n}'>" . date('h:i', strtotime($t['HorarioInicio'])) . "</td>";
                echo "<td data-turma='{$idTurma}' data-numero='{$n}'>" . $t['nome'] . "</td>";
                echo "<td>" . $t['estagio'] . "</td>";
                echo "<td>";
                echo "<select data-input='professor' data-day='monday' data-numero='{$n}' class='form-control'>";
                $todosProfessores = $funcionario->getProfessores();
                $sql = "SELECT IdFuncionario FROM schedules
                WHERE IdTurma = {$idTurma}
                AND Data = '{$monday}'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $response = $result->fetch_assoc();
                  $idProfessor = $response['IdFuncionario'];
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    if($id == $idProfessor) {
                      echo "<option value='{$id}' selected>{$nome}</option>";
                    } else {
                      echo "<option value='{$id}'>{$nome}</option>";
                    }
                  }
                } else {
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    echo "<option value='{$id}'>{$nome}</option>";
                  }
                }

                echo "</select>";
                echo "</td>";
                echo "<td>";
                echo "<select data-input='professor' data-day='tuesday' data-numero='{$n}' class='form-control'>";
                $todosProfessores = $funcionario->getProfessores();
                $sql = "SELECT IdFuncionario FROM schedules
                WHERE IdTurma = {$idTurma}
                AND Data = '{$tuesday}'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $response = $result->fetch_assoc();
                  $idProfessor = $response['IdFuncionario'];
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    if($id == $idProfessor) {
                      echo "<option value='{$id}' selected>{$nome}</option>";
                    } else {
                      echo "<option value='{$id}'>{$nome}</option>";
                    }
                  }
                } else {
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    echo "<option value='{$id}'>{$nome}</option>";
                  }
                }
                echo "</select>";
                echo "</td>";
                echo "<td>";
                echo "<select data-input='professor' data-day='wednesday' data-numero='{$n}' class='form-control'>";
                $todosProfessores = $funcionario->getProfessores();
                $sql = "SELECT IdFuncionario FROM schedules
                WHERE IdTurma = {$idTurma}
                AND Data = '{$wednesday}'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $response = $result->fetch_assoc();
                  $idProfessor = $response['IdFuncionario'];
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    if($id == $idProfessor) {
                      echo "<option value='{$id}' selected>{$nome}</option>";
                    } else {
                      echo "<option value='{$id}'>{$nome}</option>";
                    }
                  }
                } else {
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    echo "<option value='{$id}'>{$nome}</option>";
                  }
                }
                echo "</select>";
                echo "</td>";
                echo "<td>";
                echo "<select data-input='professor' data-day='thursday' data-numero='{$n}' class='form-control'>";
                $todosProfessores = $funcionario->getProfessores();
                $sql = "SELECT IdFuncionario FROM schedules
                WHERE IdTurma = {$idTurma}
                AND Data = '{$thursday}'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $response = $result->fetch_assoc();
                  $idProfessor = $response['IdFuncionario'];
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    if($id == $idProfessor) {
                      echo "<option value='{$id}' selected>{$nome}</option>";
                    } else {
                      echo "<option value='{$id}'>{$nome}</option>";
                    }
                  }
                } else {
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    echo "<option value='{$id}'>{$nome}</option>";
                  }
                }
                echo "</select>";
                echo "</td>";
                echo "<td>";
                echo "<select data-input='professor' data-day='friday' data-numero='{$n}' class='form-control'>";
                $todosProfessores = $funcionario->getProfessores();
                $sql = "SELECT IdFuncionario FROM schedules
                WHERE IdTurma = {$idTurma}
                AND Data = '{$friday}'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $response = $result->fetch_assoc();
                  $idProfessor = $response['IdFuncionario'];
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    if($id == $idProfessor) {
                      echo "<option value='{$id}' selected>{$nome}</option>";
                    } else {
                      echo "<option value='{$id}'>{$nome}</option>";
                    }
                  }
                } else {
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    echo "<option value='{$id}'>{$nome}</option>";
                  }
                }
                echo "</select>";
                echo "</td>";
                echo "<td>";
                echo "<select data-input='professor' data-day='saturday' data-numero='{$n}' class='form-control'>";
                $todosProfessores = $funcionario->getProfessores();
                $sql = "SELECT IdFuncionario FROM schedules
                WHERE IdTurma = {$idTurma}
                AND Data = '{$saturday}'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $response = $result->fetch_assoc();
                  $idProfessor = $response['IdFuncionario'];
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    if($id == $idProfessor) {
                      echo "<option value='{$id}' selected>{$nome}</option>";
                    } else {
                      echo "<option value='{$id}'>{$nome}</option>";
                    }
                  }
                } else {
                  while($row = $todosProfessores->fetch_assoc()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    echo "<option value='{$id}'>{$nome}</option>";
                  }
                }
                echo "</select>";
                echo "</td>";
                echo "<td>";
                echo "<button data-numero='{$n}' class='btn btn-success' onclick='salvar(this)'>Salvar</button>";
                echo "</td>";
                echo "</tr>";
              }
            }
            ?>
          </tbody>
        </table>
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="printDiv('schedule')">Imprimir</button>
      </div>
    </div>
    <!--END TABLE-->
  </center>
  <?php include('footer.php') ?>
</body>
<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script>
function salvar(e) {
  // Parent element
  var tr = e.parentElement.parentElement;
  var idTurma = tr.querySelector("[data-turma]").dataset.turma;
  var idHorario = tr.querySelector("[data-horario]").dataset.horario;
  var selects = tr.querySelectorAll("select");
  var monday = selects[0].value;
  var tuesday = selects[1].value;
  var wednesday = selects[2].value;
  var thursday = selects[3].value;
  var friday = selects[4].value;
  var saturday = selects[5].value;

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "php/schedule/controle.php",
    data: {acao:'salvar', idTurma:idTurma, idHorario:idHorario, monday:monday, tuesday:tuesday,
    wednesday:wednesday, thursday:thursday, friday:friday, saturday:saturday},
    success: function(data) {
      console.log(data);
      if(data == 1){
        alert('Salvo com sucesso!');
      }else{
        alert('Ocorreu algum problema. Tente novamente');
      }
    },
    error: function(data) {
      alert("Erro.<br/> Tente Novamente.");
    }
  });
}
function printDiv(id) {
  var divToPrint=document.getElementById(id);
  newWin= window.open('');
  newWin.document.write('<html><head><title></title>');
  newWin.document.write( "<link rel=\"stylesheet\" href=\"css/bootstrap.css\" type=\"text/css\" media=\"all\"/>" );
  newWin.document.write( "<link rel=\"stylesheet\" href=\"css/style.css\" type=\"text/css\" media=\"all\"/>" );
  newWin.document.write('</head><body >');
  newWin.document.write(divToPrint.outerHTML);
  newWin.document.write('</body></html>');
  newWin.print();
  newWin.close();
}
</script>
</html>
