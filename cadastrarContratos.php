<?php
// Include
require_once('php/situacoes_de_contratos/SituacoesContrato.php');
require_once('php/funcionarios/Funcionarios.php');
require_once('php/tipos_de_contratos/TiposContrato.php');
require_once('php/contratos/Contratos.php');
require_once('php/turmas/turmas.php');
require_once('php/database/DataBase.php');
// End Includes
// Create an instance for connection to DataBase
$db = new DataBase();
$conn = $db->getConnection();
// End Creation of database

// Create an instance for 'situações de contratos'
$situacoesContrato = new SituacoesContrato($conn);
// End Creation of situacoes de contrato

// Create an instance for 'situações de contratos'
$tiposContrato = new TiposContrato($conn);
// End Creation of situacoes de contrato

// Create an instance for 'Contratos'
$contratos = new Contratos($conn);
// End Creation of contrato

// Create an instance for 'Turmas'
$turmas = new Turmas($conn);
// End Creation of contrato

// Create an instance for 'Funcionários'
$funcionarios = new Funcionarios($conn);
// End Creation of Funcionários' Instance
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

<div id="page-cover">
  <img src="assets/gifs/loading-icon6.gif" id="loading-gif" />
</div>
<!-- TELA DE CADASTRO DE CONTRATOS -->
<div class="contratos">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="dados-contrato-tab" data-toggle="tab" href="#dados-contrato-section" role="tab" aria-controls="dados-contrato-section" aria-selected="true" style="color: #F3E1B9;" >Dados do Contrato</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="matricula-tab" data-toggle="tab" href="#matricula-section" role="tab" aria-controls="matricula" aria-selected="false" style="color: #F3E1B9;">Matrícula</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="outros-tab" data-toggle="tab" href="#outros-section" role="tab" aria-controls="outros" aria-selected="false" style="color: #F3E1B9;">Outros</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="impressao-documentos-tab" data-toggle="tab" href="#impressao-documentos" role="tab" aria-controls="impressao-documentos" aria-selected="false" style="color: #F3E1B9;">Impressão de Documentos</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">

    <!--DADOS DO  CONTRATO-->
    <div class="tab-pane fade show active" id="dados-contrato-section" role="tabpanel" aria-labelledby="dados-contrato">
      <form>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="nomeAluno">Nome do Aluno:</label>
            <input list="suggestions-alunos" class="form-control" id="nomeAluno" placeholder="Ex.: Eunice Maria" onkeyup="getAlunos(this.value)" oninput="verificarNome()">
            <datalist id="suggestions-alunos">
            </datalist>
            <div class="invalid-feedback">
              Por favor, digite o nome do aluno.
            </div>
          </div>
          <div class="form-group col-md-2">
            <label for="numeroContrato">Nº do Contrato:</label>
            <input type="text" class="form-control" id="numeroContrato">
            <div class="invalid-feedback">
              Por favor, digite um número válido
            </div>
          </div>
          <div class="form-group col-md-2">
            <label for="situacaoContrato">Situação do Contrato:</label>
            <select id="situacaoContrato" class="form-control">
              <?php $situacoesContrato->listSituacoesDeContrato(); ?>
            </select>
            <div class="invalid-feedback">
              Por favor, escolha uma situação
            </div>
          </div>
          <div class="form-group col-md-2">
            <label for="tipoContrato">Tipos de Contrato:</label>
            <select id="tipoContrato" class="form-control">
              <?php $tiposContrato->listTiposDeContrato(); ?>
            </select>
            <div class="invalid-feedback">
              Por favor, escolha um tipo
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="dataInicio">Início:</label>
            <input type="date" id="dataInicio" class="form-control" />
            <div class="invalid-feedback">
              Por favor, escolha uma data
            </div>
          </div>
          <div class="form-group col-md-2">
            <label for="dataTermino">Término:</label>
            <input type="date" id="dataTermino" class="form-control" />
            <div class="invalid-feedback">
              Por favor, escolha uma data
            </div>
          </div>
          <div class="form-group col-md-3">
            <br />
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="contrato-turmas" name="contrato-modalidade" class="custom-control-input" checked>
              <label class="custom-control-label" for="contrato-turmas">Contrato de Turmas</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="contrato-aulas-livres" name="contrato-modalidade" class="custom-control-input">
              <label class="custom-control-label" for="contrato-aulas-livres">Contrato de Aulas Livres</label>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <div class="table-responsive-md">
              <label>Contratos:</label>
              <table class="table" style='background-color: #fffcf7;'>
                <thead>
                  <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Data de Contrato</th>
                  </tr>
                </thead>
                <tbody id="contratosList">
                  <br />
                  <?php
                    if(isset($_GET["user"]) && !empty($_GET["user"])){
                        $result = $contratos->getContratosByUserId($_GET["user"]);
                        $quantidade = 0;
                        while($row = $result->fetch_assoc()){
                          $dataInicio = $row["dataInicio"];
                          $numero = $row["numero"];
                          $nome = $row["nome"];
                          $quantidade++;
                          echo "<tr>
                                  <td scope='row'><a href='mostrarContratos.php?numero={$numero}'>{$numero}</a></td>
                                  <td>{$nome}</td>
                                  <td>{$dataInicio}</td>
                                </tr>";
                        }
                        echo "<tr>
                                <td class='text-center' colspan='3'>{$quantidade} contrato(s)</td>
                              </tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- FIM DADOS DO CONTRATO -->
    <!--MATRÍCULA SECTION-->
    <div class="tab-pane fade" id="matricula-section" role="tabpanel" aria-labelledby="matricula">
      <form>
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="turma">Turma:</label>
            <select id="turma" class="form-control" onchange="updateCamposDeTurmas()">
              <option value='0' selected>(Selecione)</option>
              <?php
                $turmasResponse = $turmas->listTurmas();
                if(!$turmasResponse["erro"]){
                  $turmasArray = $turmasResponse["response"];
                  foreach($turmasArray as $row){
                    $id = $row["id"];
                    $nome = $row["nome"];
                    $teste = json_encode($turmasArray);
                    echo "<option value='{$id}'>{$nome}</option>";
                  }
                }
               ?>
            </select>
            <div class="invalid-feedback">
              Por favor, escolha uma turma
            </div>
          </div>
          <div class="form-group col-md-2">
            <label for="data-matricula">Data da Matrícula:</label>
            <input type="date" id="data-matricula" class="form-control" />
            <div class="invalid-feedback">
              Por favor, escolha uma data
            </div>
          </div>
          <div class="form-group col-md-2">
            <label for="inicio-das-atividades">Início das Atividades:</label>
            <input type="date" id="inicio-das-atividades" class="form-control" />
            <div class="invalid-feedback">
              Por favor, escolha uma data
            </div>
          </div>
          <div class="form-group col-md-2">
            <label for="curso">Curso:</label>
            <select id="curso" class="form-control">
            </select>
            <div class="invalid-feedback">
              Por favor, escolha um curso
            </div>
          </div>
          <div class="form-group col-md-2">
            <label for="estagio">Estágio:</label>
            <select id="estagio" class="form-control">
            </select>
            <div class="invalid-feedback">
              Por favor, escolha um estágio
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="horario">Horário:</label>
            <input type="text" id="horario" class="form-control" />
          </div>
        </div>
      </form>
    </div>
    <!-- FIM MATRÍCULA SECTION -->

    <!-- OUTROS-SECTION -->
    <div class="tab-pane fade" id="outros-section" role="tabpanel" aria-labelledby="outros">
      <form>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="atendente1">Atendente 1:</label>
            <select id="atendente1" class="form-control">
              <option value="-1">(Selecione)</option>
              <?php
                  $atendentes= $funcionarios->getFuncionarios();
                  foreach($atendentes as $atendente){
                    $id = $atendente["id"];
                    $nome = $atendente["nome"];
                    echo "<option value='{$id}'>{$nome}</option>";
                  }
               ?>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="atendente2">Atendente 2:</label>
            <select id="atendente2" class="form-control">
              <option value="-1">(Selecione)</option>
              <?php
                  foreach($atendentes as $atendente){
                    $id = $atendente["id"];
                    $nome = $atendente["nome"];
                    echo "<option value='{$id}'>{$nome}</option>";
                  }
               ?>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="atendente3">Atendente 3:</label>
            <select id="atendente3" class="form-control">
              <option value="-1">(Selecione)</option>
              <?php
                  foreach($atendentes as $atendente){
                    $id = $atendente["id"];
                    $nome = $atendente["nome"];
                    echo "<option value='{$id}'>{$nome}</option>";
                  }
               ?>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="responsavel">Responsável:</label>
            <select id="responsavel" class="form-control">
              <option value="-1" selected>(Aluno)</option>
              <div id="responsavel-options"></div>
            </select>
          </div>
        </div>
      </form>
    </div>
    <!-- FIM DE OUTROS-SECTION -->
  </div>
</div>
<div class="btns-panel-acoes">
  <button type="button" class="btn btn-primary" onclick="cadastrarContrato()">Pronto !</button>
  <button type="button" class="btn btn-danger">Cancelar</button>
</div>
<!-- FIM TELA DE CADASTRO DE CONTRATOS -->

<!-- MODALS de Feedback -->

<!-- MENSAGEM DE SUCESSO AO REGISTRAR UM ALUNO -->
<div class="modal fade" id="modal-feedback" tabindex="-1" role="dialog" aria-labelledby="modal-feedbackLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title-modal-feedback">RevolutionSchool</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="content-modal-feedback">
      </div>
      <div class="modal-footer" id="footer-modal-feedback">
      </div>
    </div>
  </div>
</div>
<!-- FIM MENSAGEM DE SUCESSO AO REGISTRAR UM ALUNO -->

<!-- FIM MODALS de Feedback -->

  <?php include('footer.php') ?>
<!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/dynamical-dom.js"></script>
    <script>
      $(document).ready(function(){
        // Set the date of 'data início' as the current date
        var fullDate = new Date();
        var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
        day = (fullDate.getDate() > 9)? fullDate.getDate() : "0"+fullDate.getDate();

        var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + day;
        var oneYearForwardDate = fullDate.getFullYear()+1 + "-" + twoDigitMonth + "-" + day;
        $("#dataInicio").val( currentDate );
        $("#dataTermino").val( oneYearForwardDate );
        $("#data-matricula").val( currentDate );
        // End process set date

        alunoId = ""; // variável global
      });
      function updateCamposDeTurmas(){
        e = document.getElementById("turma");
        id = e.options[e.selectedIndex].value;

        var data = {
        "acao": "getTurma",
        "id": id
        };
        console.log(data);
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/turmas/controle.php",
          data: data,
          beforeSend: function () {
            showLoadingGif();
          },
          success: function(data) {
            $("#inicio-das-atividades").val(data.dataInicio);
            $("#curso").html("<option value='"+data.curso+"'>"+data.cursoNome+"</option>");
            $("#estagio").html("<option value='"+data.estagio+"'>"+data.estagioNome+"</option>");
            $("#horario").val(data.horario);
            closeLoadingGif();
          },
          error: function(e)  {
            closeLoadingGif();
          }
        });
      }

      function getAlunos(text){
        // Only fetch students(alunos) if the information given is up to 4
        if(text.length >= 4){
          var data = {
            "acao":"getAlunosByName",
            "nome": text
          }
          data = $(this).serialize() + "&" + $.param(data);
          $.ajax({
            type: "POST",
            dataType: "json",
            url: "php/alunos/controle.php",
            data: data,
            beforeSend: function () {
              showLoadingGif();
            },
            success: function(data) {
              size = data.length;
              i = 0;
              document.getElementById("suggestions-alunos").innerHTML = '';
              for(i; i < size; i++){
                $("#suggestions-alunos").append("<option data-id='"+data[i].id+"' value='"+data[i].nome+"'>"+data[i].id+"</option>");
              }
              closeLoadingGif();
            },
            error: function(e)  {
              console.log(e);
              closeLoadingGif();
            }
          });
        }
      }

      function verificarNome(){
        var val = document.getElementById("nomeAluno").value;
        var opts = document.getElementById('suggestions-alunos').childNodes;
        for (var i = 0; i < opts.length; i++) {
          if (opts[i].value === val) {
            alunoId = opts[i].dataset.id;
            getContratosByUserId(opts[i].dataset.id);
            getResponsaveisByAlunoId(opts[i].dataset.id);
            break;
          }
        }
      }

      function getContratosByUserId(id){
        var data = {
          "acao":"getContratosByUserId",
          "id": id
        }
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "php/contratos/controle.php",
          data: data,
          beforeSend: function () {
            showLoadingGif();
          },
          success: function(data) {
            $("#contratosList").html(data);
            closeLoadingGif();
          },
          error: function(e)  {
            console.log(e);
            closeLoadingGif();
          }
        });
      }

      function getResponsaveisByAlunoId(id){
        var data = {
          "acao":"getResponsaveisByAlunoId",
          "idAluno": id
        }
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/responsaveis/controle.php",
          data: data,
          beforeSend: function () {
            showLoadingGif();
          },
          success: function(data) {
            $("#responsavel-options").html("");
            if(data.responsaveis != null){
              responsaveis = data.responsaveis;
              size = responsaveis.length;
              i = 0;
              for(i; i < size; i++){
                $("#responsavel-options").append("<option value='"+responsaveis[i].id+"'>"+responsaveis[i].nome+"</option>");
              }
            }
            closeLoadingGif();
          },
          error: function(e)  {
            console.log(e);
            closeLoadingGif();
          }
        });
      }

      // Cadastra um novo contrato
      function cadastrarContrato(){
        data = getFormValues();
        console.log(data);
        // data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/contratos/controle.php",
          data: {"acao":"cadastrarContrato", "data":data},
          beforeSend: function () {
            showLoadingGif();
          },
          success: function(data) {
            console.log(data);
            $("input").removeClass("is-invalid");
            $("input").addClass("is-valid");
            $("select").removeClass("is-invalid");
            $("select").addClass("is-valid");
            if(data.invalidFields != undefined){
              size = data.invalidFields.length;
              for(i = 0; i < size; i++){
                $("#"+data.invalidFields[i]).removeClass("is-valid");
                $("#"+data.invalidFields[i]).addClass("is-invalid");
              }
            }
            closeLoadingGif();
            showFeedbackModal("Cadastro de Contratos", data.description+"😎", "Beleza !", "btn btn-primary", [{name: "data-dismiss", value: "modal"}]);
          },
          error: function(e)  {
            console.log(e);
            closeLoadingGif();
          }
        });
      }
      // Fim de função para cadastrar um novo contrato

      // Function que mostra Modal com resposta de sucesso no cadastro de Contratos
      function showFeedbackModal(titulo, conteudo, botaoConteudo, botaoClass, botaoAtributos){
        $("#title-modal-feedback").html(titulo);
        $("#content-modal-feedback").html(conteudo);
        btn = document.createElement("button");
        btn.innerHTML = botaoConteudo;
        if(botaoClass) btn.className = botaoClass;
        for(i = 0; i < botaoAtributos.length; i++){
          botaoAtributos = botaoAtributos || [];
          console.log(botaoAtributos[i].name);
          btn.setAttribute(botaoAtributos[i].name, botaoAtributos[i].value);
        }
        $("#footer-modal-feedback").html(btn);
        $("#modal-feedback").modal('show');
      }
      // Fim Function

      // Retorna todos os dados dos campos do forms
      function getFormValues(){
        var data = {
          "aluno":alunoId,
          "numeroContrato":$("#numeroContrato").val(),
          "situacaoContrato":$("#situacaoContrato").val(),
          "tipoContrato":$("#tipoContrato").val(),
          "dataInicio":$("#dataInicio").val(),
          "dataTermino":$("#dataTermino").val(),
          "contratoTurmas":$("#contrato-turmas").is(":checked"),
          "contratoAulasLivres":$("#contrato-aulas-livres").is(":checked"),
          "turma":$("#turma").val(),
          "dataMatricula":$("#data-matricula").val(),
          "dataInicioAtividades":$("#inicio-das-atividades").val(),
          "curso":$("#curso").val(),
          "estagio":$("#estagio").val(),
          "horario":$("#horario").val(),
          "atendente1":$("#atendente1").val(),
          "atendente2":$("#atendente2").val(),
          "atendente3":$("#atendente3").val(),
          "contratante":$("#responsavel").val()
        }
        return data;
      }
      // Fim do método

      function showLoadingGif(){
        if(document.getElementById("page-cover").style.display == "none"){
          $("#page-cover").css("opacity",0.6).fadeIn(10, function () {
            $('#loading-gif').css({'position':'absolute','z-index':9999, "display":"block"});
          });
        }
      }
      function closeLoadingGif(){
        $("#page-cover").css("display","none");
        $("#loading-gif").css("display","none");
      }

      $("#nomeAluno").click(function(e) {
        e.preventDefault();
        console.log(e);
      });
    </script>
</html>
