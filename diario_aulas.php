<?php
require_once('php/database/DataBase.php');
require_once('php/funcionarios/Funcionarios.php');
require_once('php/cursos/Cursos.php');
require_once('php/estagios/Estagios.php');
$db = new DataBase();
$conn = $db->getConnection();
// Create an instance for workers(funcionários)
$funcionarios = new Funcionarios($conn);
// Create an instance for courses(cursos)
$cursos = new Cursos($conn);
// Create an instance for stages(estágios)
$estagios = new Estagios($conn);

$sql = "SELECT * FROM programacao_estagios WHERE IdProgramacao_Estagio = 1";
$result = $conn->query($sql);



$duracao = 1;

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
<div class="container-fluid" id="content">
  <div class="table-responsive">
    <table class="table table-hover table-sm" style ="cursor: pointer;">
      <thead class="thead-dark">
      <tr style="text-align: center;">
        <th scope="col">DATA</th>
        <th scope="col">DURAÇÃO</th>
        <th scope="col">PROGRAMAÇÃO</th>
        <th scope="col">PÁGINAS</th>
        <th scope="col">CONTEÚDO</th>
        <th scope="col">DICTATIONS</th>
        <th scope="col">READINGS</th>
        <th scope="col">SITUAÇÃO</th>
      </tr>
      </thead>
      <tbody id="tableContent" style="text-align: center;">
        <tr style="text-align: center;">
          <th><?php echo date("d/m/Y") ?> </th>
          <th><?php echo $duracao ?></th>
          <th>
          <?php
            while($row = $result->fetch_assoc()) {
                echo $row['PaginaInicial'] . " - " . $row['PaginaFinal'];
            }
            ?>
          </th>
          <th><input type="text" style="width: 60px;"/></th>
          <th><input type="text"/></th>
          <th><input type="text" style="width: 60px;"/></th>
          <th><input type="text" style="width: 60px;"/></th>
          <th>Atrasado</th>
        </tr>
      </tbody>
    </table>
  </div>
</div>


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



</script>
</html>
