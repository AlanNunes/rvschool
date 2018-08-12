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


$page_name = "Turmas";
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
    <table class="table table-hover table-sm">
      <thead class="thead-dark">
      <tr style="text-align: center;">
        <th scope="col">NOME</th>
        <th scope="col">PROFESSOR</th>
        <th scope="col">ESTÁGIO</th>
        <th scope="col">CURSO</th>
        <th scope="col">MÍN. ALUNOS</th>
        <th scope="col">SALA</th>
        <th scope="col">DURAÇÂO DA AULA</th>
        <th scope="col">DATA DE INÍCIO</th>
        <th scope="col">DATA DE TÉRMINO</th>
        <th scope="col">SITUAÇÂO</th>
        <th scope="col"></th>
      </tr>
      </thead>
      <tbody id="tableContent" style="text-align: center;"></tbody>
    </table>
  </div>
</div>

<!-- CONTENT -->

<nav class="navbar-primary" id="vertical-nav-bar">
  <a href="#" class="btn-expand-collapse" id="menu-toggle"><span class="oi oi-arrow-right"></span></a>
  <ul class="navbar-primary-menu">
    <li>
      <a href="#" id="openRegisterModal" data-toggle="modal" data-target="#registrarTurma"><span class="oi oi-plus"></span><span class="nav-label">   Incluir</span></a>
      <a href="#"><span class="oi oi-print"></span><span class="nav-label">   Relatório</span></a>
    </li>
  </ul>
</nav>

<button id="confirm-trigger" data-toggle="modal" data-target="#confirm-delete" hidden>
</button>

<!-- END CONTENT -->

<!-- MODAL FORM -->

<!-- Modal -->
<div class="modal fade" id="registrarTurma" tabindex="-1" role="dialog" aria-labelledby="registrarTurma" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registrarTurmaTitle">Registrar Turma</h5>
        <h5 class="modal-title" id="editarTurmaTitle" aria-hidden="true">Editar Turma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Registrar Turma</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form>
              <div class="form-row">
                <div class="col-md-6">
                  <label for="nome"> <span style="color:red">*</span> Nome:</label>
                  <input type="text" class="form-control" id="nome" placeholder="Ex.: Turma A">
                  <div class="invalid-feedback">
                    Por favor, digite o nome da turma.
                  </div>
                </div>

                <div class="col-md-4 offset-md-2">
                  <label for="situacao"> <span style="color:red">*</span> Situação:</label>
                  <select id="situacao" class="form-control">
                    <option value="2">Ativa</option>
                    <option value="1">Em formação</option>
                    <option value="0">Inativa</option>
                  </select>
                  <div class="invalid-feedback">
                    Por favor, selecione a situação da turma.
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="sala"> <span style="color:red">*</span> Sala:</label>
                  <select id="sala" class="form-control">
                    <option value="United States">United States</option>
                    <option value="Canada">Canada</option>
                    <option value="Australia">Australia</option>
                    <option value="England">England</option>
                  </select>
                  <div class="invalid-feedback">
                    Por favor, selecione a sala da turma.
                  </div>
                </div>

                <div class="col-md-4 offset-2">
                  <label for="duracaoAula"> <span style="color:red">*</span> Duração da aula:</label>
                  <select id="duracaoAula" class="form-control">
                    <option value="50">50</option>
                  </select>
                  <div class="invalid-feedback">
                    Por favor, a duração da aula da turma.
                  </div>
                </div>

                <div class="col-md-8">
                  <label for="horario"> <span style="color:red">*</span> Horário:</label>
                  <select id="horario" class="form-control">
                    <option value="Seg-Ter-Qua-Qui-Sex(18:00/18:50)">Seg-Ter-Qua-Qui-Sex(18:00/18:50)</option>
                    <option value="Seg-Ter-Qua-Qui-Sex(15:00/15:50)">Seg-Ter-Qua-Qui-Sex(15:00/15:50)</option>
                    <option value="Sab-Dom-(12:00/12:50)">Sab-Dom-(12:00/12:50)</option>
                    <option value="Sab-Dom-(18:00/18:50)">Sab-Dom-(18:00/18:50)</option>
                  </select>
                  <div class="invalid-feedback">
                    Por favor, o horário de aula da turma.
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="minimoAlunos"> <span style="color:red">*</span> Mínimo de Alunos:</label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="minimoAlunos" min="0" required>
                    <div class="invalid-feedback">
                      Por favor, digite o mínimo de alunos da turma.
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="dataInicio">Data de início da Turma</label>
                  <div class="input-group">
                    <input type="date" class="form-control" id="dataInicio">
                    <div class="invalid-feedback">
                      Por favor, digite a data de início da turma.
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="dataTermino">Data de Término da Turma</label>
                  <div class="input-group">
                    <input type="date" class="form-control" id="dataTermino">
                    <div class="invalid-feedback">
                      Por favor, digite a data de término da turma.
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="professor">Professor:</label>
                  <select id="professor" class="form-control">
                    <option value="null">(Selecione)</option>
                    <?php
                      $result = $funcionarios->getProfessores();
                      while($row = $result->fetch_assoc()){
                        $id = $row["id"];
                        $nome = $row["nome"];
                        echo "<option value='{$id}'>{$nome}</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="col-md-4">
                  <label for="estagio"> <span style="color:red">*</span> Estágio:</label>
                  <select id="estagio" class="form-control">
                    <option value="0" selected>(Selecione)</option>
                    <?php
                      $result = $estagios->getEstagios();
                      while($row = $result->fetch_assoc()){
                        $id = $row["id"];
                        $nome = $row["nome"];
                        echo "<option value='{$id}'>{$nome}</option>";
                      }
                    ?>
                  </select>
                  <div class="invalid-feedback">
                    Por favor, selecione o estágio da turma.
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="curso"> <span style="color:red">*</span> Curso:</label>
                  <select id="curso" class="form-control">
                    <option value="null">(Selecione)</option>
                    <?php
                      $result = $cursos->getCursos();
                      while($row = $result->fetch_assoc()){
                        $id = $row["id"];
                        $nome = $row["nome"];
                        echo "<option value='{$id}'>{$nome}</option>";
                      }
                    ?>
                  </select>
                  <div class="invalid-feedback">
                    Por favor, selecione o curso da turma.
                  </div>
                </div>
              </div>

              <div class="form-row">
                <span style="font-size: 10px; color: red;"> Os itens com * são obrigatórios </span>
              </div>


            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="gerarProgramacaoAulas">Gerar Programação de Aulas</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="registrar">Registrar</button>
        <button type="button" class="btn btn-primary" id="editar" aria-hidden="true">Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL FORM -->

<!-- CLOSE MODAL FORM -->

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-delete-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Excluir</div>
      <div class="modal-body">Você tem certeza que deseja excluir esta turma?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id="delete-turma" type="button" class="btn btn-danger btn-ok">Excluir</button>
      </div>
    </div>
  </div>
</div>

<!-- END CLOSE MODAL -->



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

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#vertical-nav-bar").toggleClass("collapsed");
    });

    $("#gerarProgramacaoAulas").click(function(e) {
        e.preventDefault();
        alert('test');
        gerarProgramacaoAulas(e.target.turma);
    });

    $("#delete-turma").click(function(e) {
        e.preventDefault();
        deleteTurma(e.target.turma);
    });

    $("#fixDateRadio").click(function() {
        $("#dateSection").hide();
    });

    $("#tempDateRadio").click(function() {
        $("#dateSection").show();
    });

    $("#openRegisterModal").click(function() {
        $("#editar").hide();
        $("#editarTurmaTitle").hide();
        $("#registrar").show();
        $("#registrarTurmaTitle").show();
    });

    $("#editar").click(function(e) {
        updateTurma(e.target.turma);
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
                var horario = new DOM_Element("td", false, false, false, turma.horario);
                var minAlunos = new DOM_Element("td", false, false, false, turma.minimoAlunos);
                var sala = new DOM_Element("td", false, false, false, turma.sala);
                var duracaoAula = new DOM_Element("td", false, false, false, turma.duracaoAula + " min.");
                var dataInicio = new DOM_Element("td", false, false, false, turma.dataInicio);
                var dataTermino = new DOM_Element("td", false, false, false, turma.dataTermino);
                var situacao = new DOM_Element("td");
                var edit = new DOM_Element("td");

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

                var closeButton = new DOM_Element("button", "btn transparent-button", false, [
                    {name: "type", value: "button"},
                    {name: "aria-label", value: "Close"},
                    {name: "data-toggle", value: "modal"},
                    {name: "data-target", value: "confirm-delete"}]);
                var deleteIcon = new DOM_Element("img", false, false, [{name: "src", value: "assets/icons/open-iconic-master/png/trash-2x.png"}]);

                closeButton.element.turma = turma.id;
                deleteIcon.element.turma = turma.id;
                closeButton.click(function(e) {
                    e.preventDefault();
                    var deleteTurma = document.getElementById("delete-turma");
                    deleteTurma.turma = e.target.turma;
                    $("#confirm-delete").modal("show");
                });

                var editButton = new DOM_Element("button", "btn transparent-button");
                var editIcon = new DOM_Element("img", false, false, [
                    {name: "src", value: "assets/icons/open-iconic-master/png/cog-2x.png"}
                    ]);

                editButton.element.turma = turma;
                editIcon.element.turma = turma;
                editButton.click(function(e) {
                    var currentTurma = e.target.turma;
                    document.getElementById("editar").turma = currentTurma.id;
                    document.getElementById("gerarProgramacaoAulas").turma = currentTurma.id;
                    e.preventDefault();
                    $("#registrar").hide();
                    $("#registrarTurmaTitle").hide();
                    $("#editar").show();
                    $("#editarTurmaTitle").show();

                    $("#nome").val(currentTurma.nome);
                    $("#situacao").val(currentTurma.situacao);
                    $("#professor").val(currentTurma.professor);
                    $("#estagio").val(currentTurma.estagio);
                    $("#curso").val(currentTurma.curso);
                    $("#horario").val(currentTurma.horario);
                    $("#minimoAlunos").val(currentTurma.minimoAlunos);
                    $("#sala").val(currentTurma.sala);
                    $("#duracao").val(currentTurma.duracaoAula);
                    $("#dataInicio").val(currentTurma.dataInicio);
                    $("#dataTermino").val(currentTurma.dataTermino);

                    $("#registrarTurma").modal("show");
                });
                closeButton.appendChild(deleteIcon);
                editButton.appendChild(editIcon);
                edit.appendChild(editButton);
                edit.appendChild(closeButton);
                tr.appendChild(name);
                tr.appendChild(professor);
                tr.appendChild(estagio);
                tr.appendChild(curso);
                tr.appendChild(minAlunos);
                tr.appendChild(sala);
                tr.appendChild(duracaoAula);
                tr.appendChild(dataInicio);
                tr.appendChild(dataTermino);
                tr.appendChild(situacao);
                tr.appendChild(edit);
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

    $("#registrar").click(function(){
        $("#loading").show();

        var data = getFormsVal();
        data.acao = "createTurma";
        console.log(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "php/turmas/controle.php",
            data: data,
            success: function(data) {
                if(data.erro) {
                    if(data.Description) {
                        alert(data.Description);
                    }
                    else {
                        alert("Arrume os campos em vermelho.");
                        setInvalidFields(data.invalidFields);
                    }
                }
                else {
                    setInvalidFields([]);
                    alert(data.Description);
                    listTurmas();
                }
            },
            error: function(data) {
                alert(data.responseText);
                listTurmas();
            }
        });
    });

    function deleteTurma(turmaId) {
        var data = {
            acao: "deleteTurma",
            id: turmaId
        };

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "php/turmas/controle.php",
            data: data,
            success: function(data) {
                alert(data.Description);
                listTurmas();
                $("#confirm-delete").modal("hide");
            },
            error: function(data) {
                console.log(data);
                listTurmas();
                $("#confirm-delete").modal("hide");
            }
        });
    }

    function updateTurma(turmaId) {
        $("#loading").show();
        var data = getFormsVal();
        data.acao = "updateTurma";
        data.id = turmaId;
        console.log("id: "+turmaId);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "php/turmas/controle.php",
            data: data,
            success: function(data) {
                if(data.erro) {
                    if(data.Description) {
                        console.log(data.Description);
                    }
                    else {
                        alert("Arrume os campos em vermelho.");
                        setInvalidFields(data.invalidFields);
                    }
                }
                else {
                    setInvalidFields([]);
                    alert(data.Description);
                    listTurmas();
                }
            },
            error: function(data) {
                alert(data.responseText);
                listTurmas();
            }
        });
    }

    function setInvalidFields(invalidFields) {
        var requiredFields = getRequiredFields();
        for(var i = 0;i < requiredFields.length;i++) {
            var requiredField = requiredFields[i];
            if(invalidFields.indexOf(requiredField) === -1) {
                $("#" + requiredField).removeClass("is-invalid");
            }
        }

        for(i = 0;i < invalidFields.length;i++) {
            var invalidField = invalidFields[i];
            $("#" + invalidField).removeClass("is-valid").addClass("is-invalid");
        }
    }

    function gerarProgramacaoAulas(idTurma)
    {
      console.log(idTurma);
      $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/aulas/controle.php",
          data: {'acao':'gerarProgramacaoAulas', 'IdTurma':idTurma},
          success: function(data) {
            try
            {
              console.log(data);
            }
            catch (error)
            {
              console.error(error);
            }
          },
          error: function(data) {
            console.error(data);
          }
      });
    }

    function getRequiredFields() {
        return ["nome", "situacao", "estagio", "curso", "horario", "minimoAlunos", "sala", "duracaoAula", "dataInicio",
        "dataTermino"];
    }

    function getFormsVal() {
        var nome = $("#nome").val();
        var situacao = $("#situacao").val();
        var professor = $("#professor").val();
        var estagio = $("#estagio").val();
        var curso = $("#curso").val();
        var horario = $("#horario").val();
        var minAlunos = $("#minimoAlunos").val();
        var sala = $("#sala").val();
        var duracao = $("#duracaoAula").val();
        var initDate = $("#dataInicio").val();
        var endDate =  $("#dataTermino").val();

        return {
            nome: nome,
            situacao: Number(situacao),
            professor: professor,
            estagio: estagio,
            curso: curso,
            horario: horario,
            minimoAlunos: minAlunos,
            sala: sala,
            duracaoAula: duracao,
            dataInicio: initDate,
            dataTermino: endDate
        };
    }
</script>
</html>
