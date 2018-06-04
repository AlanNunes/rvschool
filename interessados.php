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


  <!--TABLE FUNCIONÁRIOS-->


  <br>
  <div class="container-fluid">
  <div class="table-responsive">
  <table class="table table-hover" style="text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">NOME</th>
      <th scope="col">CELULAR</th>
      <th scope="col">EMAIL</th>
      <th scope="col">INTERESSE</th>
      <th scope="col">AÇÕES</th>
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
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color: #F3E1B9">Dados do Interessado</a>
              </li>

            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="form-row">

                    <div class="form-group col-md-3" >
                      <label for="nome"> <span style="color:red">*</span> Nome:</label>
                      <input type="text" class="form-control" id="nome" placeholder="Ex.: Joaquin Teixeira" required>
                      <div class="invalid-feedback" id="invalid-feedback-nome">
                        Preencha o nome do aluno.
                      </div>
                    </div>

                  <div class="form-group col-md-3" >
                      <label for="sexo"> <span style="color:red">*</span> Sexo:</label>
                      <select class="custom-select" id="sexo" required>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
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
                    </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="cep">CEP:</label>
                      <input type="text" class="form-control" id="cep" oninput="buscaCEP(this.value)" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="logradouro"> <span style="color:red">*</span> Logradouro:</label>
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
                      <label for="cidade"> <span style="color:red">*</span> Cidade:</label>
                      <input type="text" class="form-control" id="cidade" required>
                      <div class="invalid-feedback" id="invalid-feedback-cidade">
                        Informe a cidade.
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="bairro"> <span style="color:red">*</span> Bairro:</label>
                      <input type="text" class="form-control" id="bairro" required>
                      <div class="invalid-feedback" id="invalid-feedback-bairro">
                        Informe o bairro.
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="email"> <span style="color:red">*</span> E-mail:</label>
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
                      <label for="celular"> <span style="color:red">*</span> Celular:</label>
                      <input type="text" class="form-control" id="celular" required>
                      <div class="invalid-feedback" id="invalid-feedback-celular">
                        Número de celular inválido.
                      </div>
                    </div>
                  </div>


                  <!-- <form> -->
                  <label> <span style="color:red">*</span> Interesses:</label>
                  <textarea class="form-control" id="observacaoText" rows="6"></textarea>
                  <small id="observacaoHelp" class="form-text text-muted">Escreva o horário disponível do interessado e qual curso deseja.</small>

              <!-- END DADOS OBSERVAÇÕES -->
              <div class="form-row">
                <span style="font-size: 10px; color: red;"> Os itens com * são obrigatórios </span>
              </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
        deleteStudent(e.target.id);
      });

      $("#cep").mask("00000-000");
      $("#celular").mask("(00) 00000-0000");
      $("#telefone").mask("(00) 0000-0000");

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
      function deleteStudent(id){
        console.log("Deleting the user "+ id);
        $.post("php/interessados/controle.php", {'acao': 'deleteStudent', 'id':id}, function(data){
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
        alert('birl');
        var dataAluno = getFormValues();
        dataAluno['acao'] = "registrarAluno";
        // dataAluno = $(this).serialize() + "&" + $.param(dataAluno);
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/interessados/controle.php",
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
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/interessados/controle.php",
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
                var nome = new DOM_Element("td", false, false, false, student.nome);
                var celular = new DOM_Element("td", false, false, false, student.celular);
                var email = new DOM_Element("td", false, false, false, student.email);
                var observacoes = new DOM_Element("td", false, false, false, student.observacoes);
                var edit = new DOM_Element("td");
                var editButton = new DOM_Element("button", "btn transparent-button");
                var deleteButton = new DOM_Element("button", "btn transparent-button");
                var deleteIcon = new DOM_Element("img", false, false, [{name: 'src', value: 'assets/icons/open-iconic-master/png/trash-2x.png'}]);
                var editIcon = new DOM_Element("img", false, false, [{name: 'src', value: 'assets/icons/open-iconic-master/png/cog-2x.png'}]);

                editButton.element.data = student;
                deleteButton.element.id = student.id;

                editButton.click(function(e) {
                    e.preventDefault();
                    console.log(e);
                    alert(e.currentTarget.data);
                    document.getElementById("btn-editarAluno").matricula = e.currentTarget.matricula;
                    data = e.currentTarget.data;
                    avatarPath = data.avatar;
                    atualizaCampoResponsaveis(data.id);
                    console.log(avatarPath);
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
                    alert("id:"+e.currentTarget.id);
                    // Show the modal for the user confirm the process of deleting
                    // If the user click in the button 'delete-student' it calls
                    // the function deleteStudent() passing the enrol as parameter
                    document.getElementById("delete-student").id = e.currentTarget.id;
                    $("#confirm-delete").modal('show');
                });
                editButton.appendChild(editIcon);
                deleteButton.appendChild(deleteIcon);
                edit.appendChild(editButton);
                edit.appendChild(deleteButton);
                tr.appendChild(nome);
                tr.appendChild(celular);
                tr.appendChild(email);
                tr.appendChild(observacoes);
                tr.appendChild(edit);
                tr.addToDOM(tBody);
              }
            }
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
          url: "php/interessados/controle.php",
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
          url: "php/interessados/controle.php",
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
          "observacoes": $("#observacaoText").val(),
        };
        return data;
      }

      function cleanForm(){
        $("#nome").val("");
        $("#sexo").val("");
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
        $("#observacoes").val("");
        $("#registrarAlunoHeader").html("Registrar Aluno - RevolutionSchool - That's the Way !");
      }
    </script>
</html>
