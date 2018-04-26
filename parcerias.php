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

  <!--TABLE FUNCIONÁRIOS-->


  <br>
  <div class="container-fluid">
  <div class="table-responsive">
  <table class="table table-hover" style="text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">NOME</th>
      <th scope="col">DESCONTO NA MENSALIDADE</th>
      <th scope="col">DESCONTO NA MATRÍCULA</th>
      <th scope="col">DESCRIÇÂO</th>
      <th scope="col">EDITAR</th>
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
  <a href="#" class="btn-expand-collapse" id="menu-toggle"><span class="oi oi-arrow-right"></span></a>
  <ul class="navbar-primary-menu">
    <li>
      <a href="#" id="openRegisterModal" data-toggle="modal" data-target="#registrarParceria"><span class="oi oi-plus"></span></span><span class="nav-label">   Incluir</span></a>
      <a href="#"><span class="oi oi-print"></span><span class="nav-label">   Relatório</span></a>
    </li>
  </ul>
</nav>

<!-- END CONTENT -->

<!-- MODAL REGISTRAR FUNCIONÁRIO -->

    <!-- Modal -->


    <div class="modal fade" id="registrarParceria" tabindex="-1" role="dialog" aria-labelledby="registrarParceria" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registrarParceriaTitle">Nome da Parceria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color: #F3E1B9;" >Dados da parceria</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">

              <!--DADOS DO  FUNCIONARIO-->
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nome">Nome:</label>
                      <input type="text" class="form-control" id="nome" placeholder="Ex.: Parceria loja do João">
                      <div class="invalid-feedback">
                        Por favor, digite o nome da parceria.
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="contentDescontoMatricula">Desconto na Matrícula:</label>
                      <div id="contentDescontoMatricula">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="semDescontoMatricula" name="radioDescontoMatricula" class="custom-control-input" value="0" onclick="hideDescontoMatriculaSecao()" checked>
                          <label class="custom-control-label" for="semDescontoMatricula">Sem Desconto</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="comDescontoMatricula" name="radioDescontoMatricula" class="custom-control-input" value="1" onclick="showDescontoMatriculaSecao()">
                          <label class="custom-control-label" for="comDescontoMatricula">Com Desconto</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-12" id="matriculaFormGroup" aria-hidden="true">
                      <label for="descontoMatricula">Desconto na Matrícula:</label>
                      <input type="number" class="form-control" id="descontoMatricula" placeholder="Ex.: 25">
                      <div class="invalid-feedback">
                        Por favor, digite o desconto de matrícula da parceria.
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="contentDescontoMensalidade">Desconto na Mesalidade:</label>
                      <div id="contentDescontoMensalidade">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="semDescontoMensalidade" name="radioDescontoMensalidade" class="custom-control-input" value="0" onclick="hideDescontoMensalidadeSecao()" checked>
                          <label class="custom-control-label" for="semDescontoMensalidade">Sem Desconto</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="comDescontoMensalidade" name="radioDescontoMensalidade" class="custom-control-input" value="1" onclick="showDescontoMensalidadeSecao()">
                          <label class="custom-control-label" for="comDescontoMensalidade">Com Desconto</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-12" id="mensalidadeFormGroup" aria-hidden="true">
                      <label for="descontoMensalidade">Desconto na Mensalidade:</label>
                      <input type="number" class="form-control" id="descontoMensalidade" placeholder="Ex.: 25">
                      <div class="invalid-feedback">
                        Por favor, digite o desconto de mensalidade da parceria.
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="descricao">Observações:</label>
                      <textarea class="form-control" rows="5" id="descricao"></textarea>
                    </div>
                  </div>
                </form>
              </div>
              <!--END DADOS DO FUNCIONÁRIO-->

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
                      O Funcionário foi registrado com sucesso.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Entendi</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- FIM MENSAGEM DE SUCESSO AO REGISTRAR UM ALUNO -->


            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="registrar">Registrar</button>
            <button type="button" class="btn btn-primary" id="editar">Editar</button>
          </div>
        </div>
      </div>
    </div>

<!-- END REGISTRAR FUNCIONÁRIO -->

<!-- DELETE MODAL FORM -->

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-delete-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Excluir</div>
      <div class="modal-body">Você tem certeza que deseja excluir este funcionário?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id="delete-parceria" type="button" class="btn btn-danger btn-ok">Excluir</button>
      </div>
    </div>
  </div>
</div>

<!-- END DELETE MODAL -->




<?php include('footer.php') ?>
<!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/dynamical-dom.js"></script>
    <script>

      $( document ).ready(function() {
          listParcerias();
          $("#vertical-nav-bar").toggleClass("collapsed");
          $("#rg").mask("99.999.999-9");
          $("#cpf").mask("999.999.999-99");
          $("#cep").mask("99999-999");
          $("#celular").mask("(00) 00000-0000");
          $("#telefone").mask("(00) 0000-0000");
      });

      $("#buttonHumburguer").click(function(){
          $("#vertical-nav-bar").toggle();
      });

      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#vertical-nav-bar").toggleClass("collapsed");
      });

      function hideDescontoMatriculaSecao(){
        $("#matriculaFormGroup").hide();
      }

      function showDescontoMatriculaSecao(){
        $("#matriculaFormGroup").show();
      }

      function hideDescontoMensalidadeSecao(){
          $("#mensalidadeFormGroup").hide();
      }

      function showDescontoMensalidadeSecao(){
          $("#mensalidadeFormGroup").show();
      }

      hideDescontoMatriculaSecao();
      hideDescontoMensalidadeSecao();

      $("#openRegisterModal").click(function(e) {
          $("#editar").hide();
          $("#registrar").show();
      });

      $("#editar").click(function(e) {
          updateParceria(e.target.parceria);
      });

      $("#delete-parceria").click(function(e) {
          e.preventDefault();
          deleteParceria(e.target.parceria);
      });

//       $("#anexo").on('submit',function(e) {
//           e.preventDefault();
//           console.log('submit');
//           $.ajax({
//               url: "php/anexo/upload.php", // Url to which the request is send
//               type: "POST",             // Type of request to be send, called as method
//               data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
//               dataType: 'json',
//               contentType: false,       // The content type used when sending data to the server.
//               cache: false,             // To unable request pages to be cached
//               processData: false,        // To send DOMDocument or non processed data file it is set to false
//               success: function (data)   // A function to be called if request succeeds
//               {
//                   if (data.erro) {
//                       alert(data);
// //                      $("#imagePreview").removeClass("avatar-preview");
// //                      $("#imagePreview").removeClass("avatar-previewSuccess");
// //                      $("#imagePreview").addClass("avatar-previewFailure");
//                       console.log(data);
//                   } else {
//                       console.log(data);
// //                      $("#imagePreview").removeClass("avatar-preview");
// //                      $("#imagePreview").removeClass("avatar-previewFailure");
// //                      $("#imagePreview").addClass("avatar-previewSuccess");
//                       var anexo = data.fileName;
//                       console.log(anexo);
//                       createFuncionario(anexo);
//                   }
//               },
//               error: function(data) {
//                   console.log(data);
//               }
//           });
//       });


      function buscaCEP(cep){
        if(cep.length === 9){
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

      function listParcerias(){
        var data = {
          "acao": "listParcerias"
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/parcerias/controle.php",
          data: data,
          success: function(data) {
              var tBody = document.getElementById("tableContent");
              tBody.innerHTML = "";
              for(var i = 0;i < data.length;i++) {
                  var parceria = data[i];
                  var tr = new DOM_Element("tr");
                  var nome = new DOM_Element("th", false, false, false, parceria.nome);
                  var descontoMatricula = new DOM_Element("td", false, false, false, parceria.descontoMatricula + "%");
                  var descontoMensalidade = new DOM_Element("td", false, false, false, parceria.descontoMensalidade + "%");
                  var descricao = new DOM_Element("td", false, false, false, parceria.descricao);
                  var edit = new DOM_Element("td");

                  if(!parceria.descricao) descricao.changeContent("Sem Descrição.");

                  var closeButton = new DOM_Element("button", "btn transparent-button", false, false);
                  var deleteIcon = new DOM_Element("img", false, false, [{name: "src", value: "assets/icons/open-iconic-master/png/trash-2x.png"}]);

                  var editButton = new DOM_Element("button", "btn transparent-button");
                  var editIcon = new DOM_Element("img", false, false, [{name: "src", value: "assets/icons/open-iconic-master/png/cog-2x.png"}]);

                  closeButton.element.parceria = parceria.id;
                  deleteIcon.element.parceria = parceria.id;
                  editButton.element.parceria = parceria;
                  editIcon.element.parceria = parceria;
                  editButton.click(function(e) {
                      console.log(e.target.funcionario);
                      var currentParceria = e.target.parceria;
                      document.getElementById("editar").parceria = currentParceria.id;
                      e.preventDefault();
                      $("#registrar").hide();
                      $("#editar").show();

                      setParceriasFieldsValues(currentParceria);

                      $("#registrarParceria").modal("show");
                  });

                  closeButton.click(function(e) {
                      e.preventDefault();
                      var deleteParceria = document.getElementById("delete-parceria");
                      deleteParceria.parceria = e.target.parceria;
                      $("#confirm-delete").modal("show");
                  });

                  closeButton.appendChild(deleteIcon);
                  editButton.appendChild(editIcon);
                  edit.appendChild(editButton);
                  edit.appendChild(closeButton);
                  tr.appendChild(nome);
                  tr.appendChild(descontoMatricula);
                  tr.appendChild(descontoMensalidade);
                  tr.appendChild(descricao);
                  tr.appendChild(edit);
                  tr.addToDOM(tBody);
              }

              var trCount = new DOM_Element("tr");
              var tdCount = new DOM_Element("td", "text-center", false, [{name: "colspan", value: 8}], data.length + " Parcerias");
              trCount.appendChild(tdCount);
              trCount.addToDOM(tBody);
            console.log(data);
          },
            error: function(data) {
              console.log(data);
            }
        });
      }

      $("#registrar").click(function(){
        $("#loading").show();

        createParceria();
      });

      function createParceria() {
          var data = getFormsVal();
          data.acao = "createParceria";

          $.ajax({
              type: "POST",
              dataType: "json",
              url: "php/parcerias/controle.php",
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
//                      $("#registrarFuncionario").modal("hide");
//                      $("#sucessoRegistro").modal("show");
                      setInvalidFields([]);
                      listParcerias();
                  }
              },
              error: function(data) {
                  console.log(data);
              }
          });
      }
      function updateParceria(parceriaId){
          $("#loading").show();
          var data = getFormsVal();
          data.acao = "updateParceria";
          data.id = parceriaId;

          $.ajax({
              type: "POST",
              dataType: "json",
              url: "php/parcerias/controle.php",
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
                      alert(data.Description);
                      setInvalidFields([]);
                      listParcerias();
                  }
                  console.log(data);
              },
              error: function(data) {
                  listParcerias();
                  console.log(data);
              }
          });
      }

      function deleteParceria(parceriaId) {
          var data = {
              acao: "deleteParceria",
              id: parceriaId
          };

          $.ajax({
              type: "POST",
              dataType: "json",
              url: "php/parcerias/controle.php",
              data: data,
              success: function(data) {
                  alert(data.Description);
                  listParcerias();
                  $("#confirm-delete").modal("hide");
              },
              error: function(data) {
                  console.log(data);
                  listParcerias();
                  $("#confirm-delete").modal("hide");
              }
          });
      }

      function setInvalidFields(invalidFields) {
          var requiredFields = getRequiredFields();
          for(var i = 0;i < requiredFields.length;i++){
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

      function setParceriasFieldsValues(parceria){
          $("#nome").val(parceria.nome);
          $("#descontoMatricula").val(parceria.descontoMatricula);
          $("#descontoMensalidade").val(parceria.descontoMensalidade);
          $("#descricao").val(parceria.descricao);
          if(Number(parceria.descontoMatricula)) {
              $("#comDescontoMatricula").prop("checked", true).click();
          }
          else{
              $("#semDescontoMatricula").prop("checked", true).click();
          }

          if(Number(parceria.descontoMensalidade)) {
              $("#comDescontoMensalidade").prop("checked", true).click();
          }
          else{
              $("#semDescontoMensalidade").prop("checked", true).click();
          }
      }

      function getRequiredFields() {
          return [
              "nome", "descontoMatricula", "descontoMensalidade"
          ];
      }

      function getFormsVal() {
          var nome = $("#nome").val();
          var descontoMatricula = $("#descontoMatricula").val();
          var descontoMensalidade = $("#descontoMensalidade").val();
          var descricao = $("#descricao").val();
          var radioDescontoMatricula = $('input[name=radioDescontoMatricula]:checked').val();
          var radioDescontoMensalidade = $('input[name=radioDescontoMensalidade]:checked').val();

          var data = {nome: nome, descricao: descricao};

          if(Number(radioDescontoMatricula)) {
              data.descontoMatricula = descontoMatricula;
          }
          else {
              data.descontoMatricula = "";
          }
          if(Number(radioDescontoMensalidade)) {
              data.descontoMensalidade = descontoMensalidade;
          }
          else {
              data.descontoMensalidade = "";
          }

          return data;
      }
    </script>




</html>
