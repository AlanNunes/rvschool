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


$page_name = "Diário de Aulas";
 ?>
<html lang="pt">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/fav.ico">
  <title> Home Page - Revolution School </title>

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
        <th scope="col">NOME</th>
        <th scope="col">PROFESSOR</th>
        <th scope="col">ESTÁGIO</th>
        <th scope="col">CURSO</th>
        <th scope="col">SALA</th>
        <th scope="col">SITUAÇÂO</th>
        <th scope="col"></th>
      </tr>
      </thead>
      <tbody id="tableContent" style="text-align: center;"></tbody>
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

    $( document ).ready(function() {
        listTurmas();
        $("#vertical-nav-bar").toggleClass("collapsed");
    });

    $("#buttonHumburguer").click(function(){
        $("#vertical-nav-bar").toggle();
    });

    function listTurmas(){
        var data = {
            "acao": "listTurmas"
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "php/turmas/controle.php",
            data: data,
            success: listSuccess,
            error: function(data) {
                console.log(data);
            }
        });

        function listSuccess(data) {
            var tBody = document.getElementById("tableContent");
            tBody.innerHTML = "";
            for(var i = 0;i < data.length;i++) {
                var turma = data[i];
                var tr = new DOM_Element("tr");
                var name = new DOM_Element("th", false, false, false, turma.nome);
                var professor = new DOM_Element("td", false, false, false, turma.professorNome);
                var estagio = new DOM_Element("td", false, false, false, turma.estagio);
                var curso = new DOM_Element("td", false, false, false, turma.cursoNome);
                var sala = new DOM_Element("td", false, false, false, turma.sala);
                var situacao = new DOM_Element("td");

                if(!turma.professor) professor.changeContent("Sem Professor");

                if(Number(turma.situacao) === 2) {
                    situacao.changeContent("Ativa");
                    situacao.changeClass("itemActive");
                }
                else if(Number(turma.situacao) === 1) {
                    situacao.changeContent("Em formação");
                    situacao.changeClass("itemWaiting");
                }
                else {
                    situacao.changeContent("Inativa");
                    situacao.changeClass("itemExpired");
                }



                tr.appendChild(name);
                tr.appendChild(professor);
                tr.appendChild(estagio);
                tr.appendChild(curso);
                tr.appendChild(sala);
                tr.appendChild(situacao);
                tr.addToDOM(tBody);
            }

            //Contagem de turmas
            var trCount = new DOM_Element("tr");
            var tdCount = new DOM_Element("td", "text-center", false, [{name: "colspan", value: 14}], data.length + " Turmas");
            trCount.appendChild(tdCount);
            trCount.addToDOM(tBody);
            console.log(data);
        }
    }

</script>
</html>
