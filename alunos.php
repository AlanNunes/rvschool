<html lang="pt">
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/fav.ico">
  <title> Home Page - Revolution School </title>

  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="assets/icons/open-iconic-master/font/css/open-iconic-bootstrap.css">
    <link rel="stylesheet" href="css/vertical-bar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/avatar-image.css">

</head>
<body>
  <?php include('header.php') ?>

  <div id="page-cover">
    <img src="assets/gifs/loading-icon6.gif" id="loading-gif" />
  </div>
  <!--TABLE FUNCIONÁRIOS-->


  <br>
  <div class="container-fluid">
  <div class="table-responsive">
  <table class="table table-hover" style="text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">AVATAR</th>
      <th scope="col">NOME</th>
      <th scope="col">MATRÍCULA</th>
      <th scope="col">ATIVO</th>
      <th scope="col">DATA NASC.</th>
      <th scope="col">CELULAR</th>
      <th scope="col">EMAIL</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="tableContent">

  </tbody>
</table>

</div>
</div>
<!--END TABLE-->


<!-- CONTENT -->

<nav class="navbar-primary" id="vertical-nav-bar">
  <a href="#" class="btn-expand-collapse" id="menu-toggle"><span class="oi oi-arrow-left"></span></a>
  <ul class="navbar-primary-menu">
    <li>
      <a href="#" data-toggle="modal" data-target="#registrarAluno" onclick="prepareRegistroAluno()"><span class="oi oi-plus"></span></span><span class="nav-label">   Incluir</span></a>
      <a href="#"><span class="oi oi-print"></span><span class="nav-label">   Relatório</span></a>
    </li>
  </ul>
</nav>

<!-- END CONTENT -->

<!-- MODAL INCLUIR ALUNO -->

    <!-- Modal -->
    <div class="modal fade" id="registrarAluno" tabindex="-1" role="dialog" aria-labelledby="registrarAluno" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registrarAlunoHeader">Registro de Aluno</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color: #F3E1B9">Dados do Aluno</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="endereco-tab" data-toggle="tab" href="#endereco" role="tab" aria-controls="endereco" aria-selected="false" style="color: #F3E1B9">Endereço/Comunicação</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="dadosBancarios-tab" data-toggle="tab" href="#dadosBancarios" role="tab" aria-controls="dadosBancarios" aria-selected="false" style="color: #F3E1B9">Dados Bancários</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="responsaveis-tab" data-toggle="tab" href="#responsaveis" role="tab" aria-controls="responsaveis" aria-selected="false" style="color: #F3E1B9">Responsáveis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="observacoes-tab" data-toggle="tab" href="#observacoes" role="tab" aria-controls="observacoes" aria-selected="false" style="color: #F3E1B9">Observações</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form name="avatarForm" id="avatarForm">
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <div class="avatar-upload">
                          <div class="avatar-edit">
                              <input type='file' name="image" id="image" accept=".png, .jpg, .jpeg" class="btn btn-primary">
                              <label for="image"><span class="oi oi-pencil" style="left:10px; top: 5px;"></span></label>
                          </div>
                          <div class="avatar-save">
                            <button type="submit" name="submit" id="submitRegistrar" class="btn btn-light"><span class="oi oi-cloud-upload"></span></button>
                            <label for="submitRegistrar"></label>
                          </div>
                          <div class="avatar-preview">
                              <div id="imagePreview">
                              </div>
                          </div>
                      </div>
                    </div>
                  </form>
                    <div class="form-group col-md-3" style="margin-top: 40px;">
                      <label for="nome">Nome:</label>
                      <input type="text" class="form-control" id="nome" placeholder="Ex.: Joaquin Teixeira" required>
                      <div class="invalid-feedback" id="invalid-feedback-nome">
                        Preencha o nome do aluno.
                      </div>
                    </div>
                    <div class="form-group col-md-3" style="margin-top: 40px;">
                      <label for="rg">RG:</label>
                      <input type="text" class="form-control" id="rg" placeholder="Ex.: 171.251.54-2">
                    </div>
                    <div class="form-group col-md-3" style="margin-top: 40px;">
                      <label for="cpf">CPF:</label>
                      <input type="text" class="form-control" id="cpf" placeholder="Ex.: 171.251.54-26">
                      <div class="invalid-feedback" id="invalid-feedback-cpf">
                        Informe um CPF válido.
                      </div>
                    </div>
                  </div>
                <hr>
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="dataNasc">Data de Nasc.:</label>
                      <input type="date" class="form-control" id="dataNasc" required>
                      <div class="invalid-feedback" id="invalid-feedback-dataNasc">
                        Este campo não pode estar vazio.
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="estadoCivil">Estado Civil:</label>
                      <select class="custom-select" id="estadoCivil">
                        <option value="solteiro">Solteiro</option>
                        <option value="casado">Casado</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="sexo">Sexo:</label>
                      <select class="custom-select" id="sexo" required>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="matricula">Matrícula:</label>
                      <input type="text" class="form-control" id="matricula" value="Automático">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="profissao">Profissão:</label>
                      <input type="text" class="form-control" id="profissao">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="escolaridade">Escolaridade:</label>
                      <select class="custom-select" id="escolaridade">
                        <option value="" selected>Selecione</option>
                        <option value="Ensino Superior">Ensino Superior</option>
                        <option value="Ensino Médio">Ensino Médio</option>
                        <option value="Ensino Fundamental">Ensino Fundamental</option>
                        <option value="Analfabeto">Analfabeto</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="midia">Mídia:</label>
                      <select class="custom-select" id="midia">
                        <option value="" selected>Selecione</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Amigos">Amigos</option>
                        <option value="Panfletos">Panfletos</option>
                        <option value="Internet">Internet</option>
                        <option value="Outros">Outros</option>
                      </select>
                    </div>
                  </div>
                <!-- </form> -->
              </div>
              <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="endereco-tab">
                  <!-- <form> -->
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="cep">CEP:</label>
                      <input type="text" class="form-control" id="cep" oninput="buscaCEP(this.value)" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="logradouro">Logradouro:</label>
                      <input type="text" class="form-control" id="logradouro" placeholder="Ex.: Avenida 1" required>
                      <div class="invalid-feedback" id="invalid-feedback-logradouro">
                        Informe o logradouro.
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="numeroCasa">Número:</label>
                      <input type="number" class="form-control" id="numeroCasa" placeholder="Ex.: 77">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="complemento">Complemento:</label>
                      <input type="text" class="form-control" id="complemento">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="cidade">Cidade:</label>
                      <input type="text" class="form-control" id="cidade" required>
                      <div class="invalid-feedback" id="invalid-feedback-cidade">
                        Informe a cidade.
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="bairro">Bairro:</label>
                      <input type="text" class="form-control" id="bairro" required>
                      <div class="invalid-feedback" id="invalid-feedback-bairro">
                        Informe o bairro.
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="email">E-mail:</label>
                      <input type="email" class="form-control" id="email" required>
                      <div class="invalid-feedback" id="invalid-feedback-email">
                        Informe um e-mail válido
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="telefone">Telefone:</label>
                      <input type="text" class="form-control" id="telefone">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="celular">Celular:</label>
                      <input type="text" class="form-control" id="celular" required>
                      <div class="invalid-feedback" id="invalid-feedback-celular">
                        Número de celular inválido.
                      </div>
                    </div>
                  </div>
                <!-- </form> -->
              </div>
              <!-- BEGIN DADOS BANCÁRIOS -->
              <div class="tab-pane fade" id="dadosBancarios" role="tabpanel" aria-labelledby="dadosBancarios-tab">
                  <!-- <form> -->
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="banco">Banco:</label>
                      <select class="form-control" id="banco">
                        <option value="">(Selecione)</option>
                        <option value="Itaú">Itaú</option>
                        <option value="Bradesco">Bradesco</option>
                        <option value="Santander">Santander</option>
                        <option value="Caixa Econômica">Caixa Econômica</option>
                        <option value="Banco do Brasil">Banco do Brasil</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="agencia">Agência:</label>
                      <input type="text" class="form-control" id="agencia" aria-describedby="agenciaHelp">
                      <small id="agenciaHelp" class="form-text text-muted">Sem dígito.</small>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="conta">Conta:</label>
                      <input type="text" class="form-control" id="conta" aria-describedby="contaHelp">
                      <small id="contaHelp" class="form-text text-muted">Sem dígito.</small>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="codigoClienteBanco">Código do Cliente no Banco:</label>
                      <input type="text" class="form-control" id="codigoClienteBanco">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="bolsa">Bolsa:</label>
                      <select class="form-control" id="bolsas">
                        <option value="0">(Selecione)</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="inadimplencia">
                        <label class="custom-control-label" for="inadimplencia">Inadimplência</label>
                      </div>
                      <small id="inadimplenteHelp" class="form-text text-muted">Marque esta opção se o aluno possuir inadimplência.</small>
                    </div>
                  </div>
                <!-- </form> -->
              </div>
              <!-- END DADOS BANCÁRIOS -->
              <!-- BEGIN DADOS RESPONSÁVEIS -->
              <div class="tab-pane fade" id="responsaveis" role="tabpanel" aria-labelledby="dadosBancarios-tab">
                  <!-- <form> -->
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="nomeResponsavelUm">Nome:</label>
                      <input type="text" class="form-control" id="nomeResponsavelUm">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="telefoneResponsavelUm">Telefone:</label>
                      <input type="text" class="form-control" id="telefoneResponsavelUm">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="celularResponsavelUm">Celular:</label>
                      <input type="text" class="form-control" id="celularResponsavelUm">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="nomeResponsavelDois">Nome:</label>
                      <input type="text" class="form-control" id="nomeResponsavelDois">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="telefoneResponsavelDois">Telefone :</label>
                      <input type="text" class="form-control" id="telefoneResponsavelDois">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="celularResponsavelDois">Celular:</label>
                      <input type="text" class="form-control" id="celularResponsavelDois">
                    </div>
                  </div>
                <!-- </form> -->
              </div>
              <!-- END DADOS RESPONSÁVEIS -->
              <!-- BEGIN DADOS RESPONSÁVEIS -->
              <div class="tab-pane fade" id="observacoes" role="tabpanel" aria-labelledby="dadosBancarios-tab">
                  <!-- <form> -->
                  <label>Escreva observações:</label>
                  <textarea class="form-control" id="observacaoText" rows="6"></textarea>
                  <small id="observacaoHelp" class="form-text text-muted">Escreva coisas importantes sobre o aluno neste campo.</small>
                <!-- </form> -->
              </div>
              <!-- END DADOS RESPONSÁVEIS -->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a href="matriculas.html" class="btn disabled btn btn-success" id="btn-matricularAluno">Matricular</a>
            <button type="button" class="btn btn-primary" id="btn-registrarAluno">Registrar</button>
            <button type="button" class="btn btn-primary" id="btn-editarAluno">Editar</button>
          </div>
        </div>
      </div>
    </div>

<!-- END INCLUIR ALUNO -->

<!-- MENSAGEM DE SUCESSO AO REGISTRAR UM ALUNO -->
<div class="modal fade" id="sucessoRegistro" tabindex="-1" role="dialog" aria-labelledby="sucessoRegistroLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sucessoRegistroLabel">RevolutionSchool</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        O aluno foi registrado com sucesso.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Entendi</button>
      </div>
    </div>
  </div>
</div>
<!-- FIM MENSAGEM DE SUCESSO AO REGISTRAR UM ALUNO -->

<!-- EXCUIR ALUNO MODAL FORM -->

  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-delete-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">Excluir</div>
        <div class="modal-body">Você tem certeza que deseja excluir este aluno, permanentemente ?</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button id="delete-student" type="button" class="btn btn-danger btn-ok">Estou Ciente</button>
        </div>
      </div>
    </div>
  </div>

<!-- END EXCLUIR ALUNO CLOSE MODAL -->
<footer>
  <a>© Revolution School.</a>
</footer>
<!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/avatar-image.js"></script>
    <script src="js/dynamical-dom.js"></script>
    <script>
      // Starts a Global Variable that's going to contain the path of the image's student
      var avatarPath =  "";
      $( document ).ready(function() {
        // Collapse the vertical menu
        $("#vertical-nav-bar").toggleClass("collapsed");
        // list all the students inner the Table
        listStudents();
        $("#rg").mask("99.999.999-9");
        $("#cpf").mask("999.999.999-99");
        $("#cep").mask("99999-999");
        $("#matricula").prop('disabled', true);
      });

      $("#buttonHumburguer").click(function(){
          $("#vertical-nav-bar").toggle();
      });

      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#vertical-nav-bar").toggleClass("collapsed");
      });

      $("#delete-student").click(function(e) {
        e.preventDefault();
        console.log(e);
        deleteStudent(e.target.matricula);
      });

      $("#cep").mask("00000-000");
      $("#celular").mask("(00) 000000000");

      function buscaCEP(cep){
        if(cep.length == 9){
          $.post("https://viacep.com.br/ws/"+cep+"/json/", function(data, status){
            if(!data.erro){
              $("#logradouro").val(data.logradouro);
              $("#complemento").val(data.complemento);
              $("#bairro").val(data.bairro);
              $("#cidade").val(data.localidade);
            }else{
              alert('erro');
            }
          });
        }
      }

      function prepareRegistroAluno(){
        cleanForm();
        $("#btn-matricularAluno").addClass("disabled");
        $("#btn-editarAluno").hide();
        $("#btn-registrarAluno").show();
        $("#imagePreview").css("background-image", "url('')");
        $("#imagePreview").removeClass("avatar-preview");
        $("#imagePreview").removeClass("avatar-previewSuccess");
        $("#imagePreview").removeClass("avatar-previewFailure");
        listBolsas();
      }

      // Delete a student having a enrol code as identification
      function deleteStudent(matricula){
        console.log("Deleting the user "+ matricula);
        $.post("php/alunos/controle.php", {'acao': 'deleteStudent', 'matricula': matricula}, function(data){
          if(data.erro){
            console.log(data);
            alert('Erro inesperado.');
          }
          $("#confirm-delete").modal('hide');
          listStudents();
        }, 'json');
      }

      function listBolsas(){
        var data = {
        "acao": "listBolsas",
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/bolsas/controle.php",
          data: data,
          success: function(data) {
            for(i = 0; i < data.length; i++){
              $("#bolsas").append("<option value='"+data[i].id+"'>"+data[i].nome+"</option>");
            }
          }
        });
      }

      $("#avatarForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
        url: "php/avatar/upload.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        dataType: 'json',
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data)   // A function to be called if request succeeds
        {
          if(data.erro){
            alert(data);
            $("#imagePreview").removeClass("avatar-preview");
            $("#imagePreview").removeClass("avatar-previewSuccess");
            $("#imagePreview").addClass("avatar-previewFailure");
          }else{
            console.log(data);
            $("#imagePreview").removeClass("avatar-preview");
            $("#imagePreview").removeClass("avatar-previewFailure");
            $("#imagePreview").addClass("avatar-previewSuccess");
            avatarPath = data.imageName;
          }
        }
        });
      }));

      $("#btn-editarAluno").click(function(e) {
        e.preventDefault();
        editarAluno(e.target.matricula);
      });

      $("#btn-registrarAluno").click(function(){
        // $("#loading").show();
        if ($('#inadimplencia').is(':checked')) {
          var inadimplencia = true;
        }else{
          var inadimplencia = false;
        }
        var dataAluno = getFormValues();
        dataAluno['acao'] = "registrarAluno";
        // dataAluno = $(this).serialize() + "&" + $.param(dataAluno);
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/alunos/controle.php",
          data: dataAluno,
          success: function(data) {
            alert('worked');
            if(data.erro){
              var i = 0;
              console.log(data);
              var sizeInvalidFields = data.invalidFields.length;
              var invalidFields = data.invalidFields;
              $('input').addClass('is-valid');
              $('select').addClass('is-valid');
              $('textarea').addClass('is-valid');
              $('input').removeClass('is-invalid');
              for(i; i < sizeInvalidFields; i++){
                console.log(invalidFields[i]);
                $("#"+invalidFields[i]).removeClass("is-valid");
                $("#"+invalidFields[i]).addClass("is-invalid");
                $("#invalid-feedback-"+invalidFields[i]).show();
              }
            }else{
              $("#btn-matricularAluno").removeClass("btn disabled");
              $("#registrarAluno").modal('hide');
              $("#sucessoRegistro").modal('show');
              // Update the table
              listStudents();
            }
            console.log(data);
          },
          error: function(data) {
            console.log(data);
            alert('deu erro');
          }
        });

      });

      // list all the students inner the Table
      function listStudents(){
        showLoadingGif();
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/alunos/controle.php",
          data: {'acao': 'listStudents'},
          success: function(data) {
            if(data.erro){
              alert('Erro ao listar os alunos.');
            }else{
              var tBody = document.getElementById("tableContent");
              tBody.innerHTML = "";
              var i = 0;
              var amountStudents = data.students.length;
              for(i; i < amountStudents; i++){
                var student = data.students[i];
                var tr = new DOM_Element("tr");
                var avatar = new DOM_Element("td");
                var nome = new DOM_Element("td", false, false, false, student.nome);
                var matricula = new DOM_Element("td", false, false, false, student.matricula);
                var dataNasc = new DOM_Element("td", false, false, false, student.dataNasc);
                var ativo = new DOM_Element("td", false, false, false, student.ativo);
                var celular = new DOM_Element("td", false, false, false, student.celular);
                var email = new DOM_Element("td", false, false, false, student.email);
                var edit = new DOM_Element("td");
                var editButton = new DOM_Element("button", "btn transparent-button");
                var deleteButton = new DOM_Element("button", "btn transparent-button");
                var deleteIcon = new DOM_Element("img", false, false, [{name: 'src', value: 'assets/icons/open-iconic-master/png/trash-2x.png'}]);
                var editIcon = new DOM_Element("img", false, false, [{name: 'src', value: 'assets/icons/open-iconic-master/png/cog-2x.png'}]);

                editButton.element.data = student;
                deleteButton.element.matricula = student.matricula;

                editButton.click(function(e) {
                    e.preventDefault();
                    console.log(e);
                    document.getElementById("btn-editarAluno").matricula = e.currentTarget.matricula;
                    data = e.currentTarget.data;
                    avatarPath = data.avatar;
                    atualizaCampoResponsaveis(data.id);
                    console.log(avatarPath);
                    // Adiciona a matrícula do aluno como parâmetro no link
                    document.getElementById("btn-matricularAluno").href = "cadastrarContratos.php?aluno="+e.currentTarget.data.id+"&nome="+e.currentTarget.data.nome;
                    $("#btn-registrarAluno").hide();
                    $("#btn-editarAluno").show();
                    $("#nome").val(data.nome);
                    $("#rg").val(data.rg);
                    $("#cpf").val(data.cpf);
                    $("#dataNasc").val(data.dataNasc);
                    $("#estadoCivil").val(data.estadoCivil);
                    $("#sexo").val(data.sexo);
                    $("#profissao").val(data.profissao);
                    $("#escolaridade").val(data.escolaridade);
                    $("#midia").val(data.midia);
                    $("#cep").val(data.cep);
                    $("#logradouro").val(data.logradouro);
                    $("#numeroCasa").val(data.numeroCasa);
                    $("#complemento").val(data.complemento);
                    $("#cidade").val(data.cidade);
                    $("#bairro").val(data.bairro);
                    $("#email").val(data.email);
                    $("#telefone").val(data.telefone);
                    $("#celular").val(data.celular);
                    $("#banco").val(data.banco);
                    $("#agencia").val(data.agencia);
                    $("#conta").val(data.conta);
                    $("#codigoClienteBanco").val(data.codigoClienteBanco);
                    $("#bolsa").val(data.bolsa);
                    $("#inadimplencia").val(data.inadimplencia);
                    $("#nomeResponsavelUm").val(data.nomeResponsavelUm);
                    $("#telefoneResponsavelUm").val(data.telefoneResponsavelUm);
                    $("#celularResponsavelUm").val(data.celularResponsavelUm);
                    $("#nomeResponsavelDois").val(data.nomeResponsavelDois);
                    $("#telefoneResponsavelDois").val(data.telefoneResponsavelDois);
                    $("#celularResponsavelDois").val(data.celularResponsavelDois);
                    $("#observacoes").val(data.observacoes);
                    $("#matricula").val(data.matricula);
                    $("#imagePreview").css("background-image", "url('avatars/"+data.avatar+"')");
                    $("#registrarAlunoHeader").html("Editar Aluno - Matrícula <b>"+data.matricula+"</b>");
                    $("#btn-matricularAluno").removeClass("disabled");
                    $("#registrarAluno").modal('show');
                });
                deleteButton.click(function(e) {
                    e.preventDefault();
                    console.log(e);
                    alert(e.currentTarget.matricula);
                    // Show the modal for the user confirm the process of deleting
                    // If the user click in the button 'delete-student' it calls
                    // the function deleteStudent() passing the enrol as parameter
                    document.getElementById("delete-student").matricula = e.currentTarget.matricula;
                    $("#confirm-delete").modal('show');
                });

                if(student.avatar != null && student.avatar != ""){
                  var img = new DOM_Element("img", "avatar", false, [{name: "src", value: 'avatars/'+student.avatar}], false);
                  avatar.appendChild(img);
                }else{
                  var img = new DOM_Element("img", "avatar", false, [{name: "src", value: 'avatars/default.png'}], false);
                  avatar.appendChild(img);
                }
                if(student.ativo == true){
                  ativo.changeContent("Ativo");
                }else{
                  ativo.changeContent("Inativo");
                  tr.changeClass("inativo");
                }
                editButton.appendChild(editIcon);
                deleteButton.appendChild(deleteIcon);
                edit.appendChild(editButton);
                edit.appendChild(deleteButton);
                tr.appendChild(avatar);
                tr.appendChild(nome);
                tr.appendChild(matricula);
                tr.appendChild(ativo);
                tr.appendChild(dataNasc);
                tr.appendChild(celular);
                tr.appendChild(email);
                tr.appendChild(edit);
                tr.addToDOM(tBody);
              }
            }
            closeLoadingGif();
            console.log(data);
          },
          error: function(data) {
            console.log(data);
            alert('deu erro');
          }
        });
      }

      function editarAluno(matricula){
        var dataAluno = getFormValues();
        dataAluno['acao'] = 'editarAluno';
        dataAluno['matricula'] = $("#matricula").val();

        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/alunos/controle.php",
          data: dataAluno,
          success: function(data) {
            alert('worked');
            if(data.erro){
              var i = 0;
              console.log(data);
              var sizeInvalidFields = data.invalidFields.length;
              var invalidFields = data.invalidFields;
              $('input').addClass('is-valid');
              $('select').addClass('is-valid');
              $('textarea').addClass('is-valid');
              $('input').removeClass('is-invalid');
              for(i; i < sizeInvalidFields; i++){
                console.log(invalidFields[i]);
                $("#"+invalidFields[i]).removeClass("is-valid");
                $("#"+invalidFields[i]).addClass("is-invalid");
                $("#invalid-feedback-"+invalidFields[i]).show();
              }
            }else{

              $("#registrarAluno").modal('hide');
              $("#sucessoRegistro").modal('show');
              // Update the table
              listStudents();
            }
            console.log(data);
          },
          error: function(data) {
            console.log(data);
            alert('deu erro');
          }
        });
      }

      function atualizaCampoResponsaveis(id){
        data = {
          "acao":"getResponsaveis",
          "alunoId":id
        }
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/alunos/controle.php",
          data: data,
          success: function(data) {
            if(data.length > 0){
              $("#nomeResponsavelUm").val(data[0].nome);
              $("#telefoneResponsavelUm").val(data[0].telefone);
              $("#celularResponsavelUm").val(data[0].celular);
              $("#nomeResponsavelDois").val(data[1].nome);
              $("#telefoneResponsavelDois").val(data[1].telefone);
              $("#celularResponsavelDois").val(data[1].celular);
            }
          },
          error: function(data) {
            console.log(data);
          }
        });
      }

      function getFormValues(){
        var data = {
          "acao": "",
          "nome": $("#nome").val(),
          "rg": $("#rg").val(),
          "cpf": $("#cpf").val(),
          "dataNasc": $("#dataNasc").val(),
          "estadoCivil": $("#estadoCivil").val(),
          "profissao": $("#profissao").val(),
          "escolaridade": $("#escolaridade").val(),
          "midia": $("#midia").val(),
          "sexo": $("#sexo").val(),
          "cep": $("#cep").val(),
          "logradouro": $("#logradouro").val(),
          "numeroCasa": $("#numeroCasa").val(),
          "complemento": $("#complemento").val(),
          "cidade": $("#cidade").val(),
          "bairro": $("#bairro").val(),
          "email": $("#email").val(),
          "telefone": $("#telefone").val(),
          "celular": $("#celular").val(),
          "banco": $("#banco").val(),
          "agencia": $("#agencia").val(),
          "conta": $("#conta").val(),
          "codigoClienteBanco": $("#codigoClienteBanco").val(),
          "bolsa": $("#bolsas").val(),
          "inadimplencia": inadimplencia.checked,
          "nomeResponsavelUm": $("#nomeResponsavelUm").val(),
          "telefoneResponsavelUm": $("#telefoneResponsavelUm").val(),
          "celularResponsavelUm": $("#celularResponsavelUm").val(),
          "nomeResponsavelDois": $("#nomeResponsavelDois").val(),
          "telefoneResponsavelDois": $("#telefoneResponsavelDois").val(),
          "celularResponsavelDois": $("#celularResponsavelDois").val(),
          "observacoes": $("#observacaoText").val(),
          "avatar": avatarPath,
          "matricula": ""
        };
        return data;
      }

      function cleanForm(){
        $("#nome").val("");
        $("#rg").val("");
        $("#cpf").val("");
        $("#dataNasc").val("");
        $("#estadoCivil").val("");
        $("#sexo").val("");
        $("#profissao").val("");
        $("#escolaridade").val("");
        $("#midia").val("");
        $("#cep").val("");
        $("#logradouro").val("");
        $("#numeroCasa").val("");
        $("#complemento").val("");
        $("#cidade").val("");
        $("#bairro").val("");
        $("#email").val("");
        $("#telefone").val("");
        $("#celular").val("");
        $("#banco").val("");
        $("#agencia").val("");
        $("#conta").val("");
        $("#codigoClienteBanco").val("");
        $("#bolsa").val("");
        $("#inadimplencia").val("");
        $("#nomeResponsavelUm").val("");
        $("#telefoneResponsavelUm").val("");
        $("#celularResponsavelUm").val("");
        $("#nomeResponsavelDois").val("");
        $("#telefoneResponsavelDois").val("");
        $("#celularResponsavelDois").val("");
        $("#observacoes").val("");
        $("#matricula").val("");
        $("#imagePreview").css("background-image", "url('')");
        $("#registrarAlunoHeader").html("Registrar Aluno - RevolutionSchool - That's the Way !");
      }

      function showLoadingGif(){
        // if(document.getElementById("page-cover").style.display == "none"){
          $("#page-cover").css("opacity",0.6).fadeIn(10, function () {
            $('#loading-gif').css({'position':'absolute','z-index':9999, "display":"block"});
          });
        // }
      }
      function closeLoadingGif(){
        $("#page-cover").css("display","none");
        $("#loading-gif").css("display","none");
      }
    </script>
</html>
