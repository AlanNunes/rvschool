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
      <table class="table table-hover">
        <thead class="thead-dark">
        <tr style="text-align: center;">
          <th scope="col">Nome</th>
          <th scope="col">Desconto</th>
          <th scope="col">Tipo</th>
          <th scope="col">Início</th>
          <th scope="col">Término</th>
          <th scope="col">Descrição</th>
          <th scope="col">Validade</th>
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
      <a href="#" id="openRegisterModal" data-toggle="modal" data-target="#registrarBolsa"><span class="oi oi-plus"></span><span class="nav-label">   Incluir</span></a>
      <a href="#"><span class="oi oi-print"></span><span class="nav-label">   Relatório</span></a>
    </li>
  </ul>
</nav>

  <button id="confirm-trigger" data-toggle="modal" data-target="#confirm-delete" hidden>
  </button>

<!-- END CONTENT -->

<!-- MODAL FORM -->

    <!-- Modal -->
    <div class="modal fade" id="registrarBolsa" tabindex="-1" role="dialog" aria-labelledby="registrarBolsa" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registrarBolsaTitle">Registrar Nova Bolsa</h5>
            <h5 class="modal-title" id="editarBolsaTitle" aria-hidden="true">Editar Nova Bolsa</h5>
          </div>
          <div class="modal-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Registrar Bolsa</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form>
                  <div class="form-row">
                    <div class="col-md-6">
                      <label for="nome">Nome:</label>
                      <input type="text" class="form-control" id="nome" placeholder="Ex.: Bolsa Gold">
                      <div class="invalid-feedback">
                        Por favor, digite o nome da bolsa.
                      </div>
                    </div>
                    <div class="col-md-4 offset-md-2">
                      <label for="desconto">Desconto:</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="desconto" min="0" max="100" required>
                        <div class="input-group-prepend">
                          <span class="input-group-text">%</span>
                        </div>
                        <div class="invalid-feedback">
                          Por favor, digite o desconto da bolsa.
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="dateRadio" id="fixDateRadio" value="1" checked>
                    <label class="form-check-label" for="fixDateRadio">Fixa</label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="dateRadio" id="tempDateRadio" value="0">
                    <label class="form-check-label" for="tempDateRadio">Temporária</label>
                    <div class="invalid-feedback">
                      Por favor, selecione pelo menos uma opção.
                    </div>
                  </div>

                  <div class="form-row" id="dateSection" style="display: none">
                    <div class="form-group col-md-6">
                      <label for="dataInicio">Data de início da Bolsa</label>
                      <div class="input-group">
                        <input type="date" class="form-control" id="dataInicio">
                      </div>
                      <div class="invalid-feedback">
                        Por favor, digite uma data de início para a bolsa.
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="dataTermino">Data de Término da Bolsa</label>
                      <div class="input-group">
                        <input type="date" class="form-control" id="dataTermino">
                      </div>
                      <div class="invalid-feedback">
                        Por favor, digite uma data de término para a bolsa.
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="descricao">Descrição:</label>
                    <textarea class="form-control" id="descricao" rows="5" placeholder="Ex.: Bolsa de 50% para o curso de inglês"></textarea>
                    <div class="invalid-feedback">
                      Por favor, digite a descrição da bolsa.
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
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
        <div class="modal-body">Você tem certeza que deseja excluir esta bolsa?</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button id="delete-bolsa" type="button" class="btn btn-danger btn-ok">Excluir</button>
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
          listBolsas();
          $("#vertical-nav-bar").toggleClass("collapsed");
      });

      $("#buttonHumburguer").click(function(){
          $("#vertical-nav-bar").toggle();
      });

      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#vertical-nav-bar").toggleClass("collapsed");
      });

      $("#delete-bolsa").click(function(e) {
          e.preventDefault();
          deleteBolsa(e.target.bolsa);
      });

      $("#fixDateRadio").click(function() {
          $("#dateSection").hide();
      });

      $("#tempDateRadio").click(function() {
          $("#dateSection").show();
      });

      $("#openRegisterModal").click(function() {
          $("#editar").hide();
          $("#editarBolsaTitle").hide();
          $("#registrar").show();
          $("#registrarBolsaTitle").show();
      });

      $("#editar").click(function(e) {
          updateBolsa(e.target.bolsa);
      });

      function listBolsas(){
        var data = {
          "acao": "listBolsas"
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/bolsas/controle.php",
          data: data,
          success: function(data) {
              var tBody = document.getElementById("tableContent");
              tBody.innerHTML = "";
            for(var i = 0;i < data.length;i++) {
                var bolsa = data[i];
                var tr = new DOM_Element("tr");
                var name = new DOM_Element("td", false, false, false, bolsa.nome);
                var desconto = new DOM_Element("td", false, false, false, bolsa.desconto + "%");
                var descricao = new DOM_Element("td", false, false, false, bolsa.descricao);
                var fixa = new DOM_Element("td");
                var dataInicio = new DOM_Element("td");
                var dataTermino = new DOM_Element("td");
                var validity = new DOM_Element("td");
                var edit = new DOM_Element("td");

                if(Number(bolsa.fixa)) {
                    fixa.changeContent("fixa");
                    dataInicio.changeContent("fixa");
                    dataTermino.changeContent("fixa");
                    validity.changeContent("Em vigor");
                    validity.changeClass("itemActive");
                }
                else {
                    var initDate = bolsa.dataInicio.split("-");
                    var endDate = bolsa.dataTermino.split("-");
                    var initDateDayString = initDate[2].length < 2 ? "0" + initDate[2] : initDate[2];
                    var initDateMonthString = initDate[1].length < 2 ? "0" + initDate[1] : initDate[1];
                    var endDateDayString = endDate[2].length < 2 ? "0" + endDate[2] : endDate[2];
                    var endDateMonthString = endDate[1].length < 2 ? "0" + endDate[1] : endDate[1];
                    var initDateString = initDateDayString + "/" + initDateMonthString + "/" + initDate[0];
                    var endDateString = endDateDayString + "/" + endDateMonthString + "/" + endDate[0];

                    fixa.changeContent("Temporária");
                    dataInicio.changeContent(initDateString);
                    dataTermino.changeContent(endDateString);
                    validity.changeContent(bolsa.validade);
                    validity.changeClass(bolsa.validadeClass);
                }

                var closeButton = new DOM_Element("button", "btn transparent-button", false, [
                    {name: "type", value: "button"},
                    {name: "aria-label", value: "Close"},
                    {name: "data-toggle", value: "modal"},
                    {name: "data-target", value: "confirm-delete"}]);
                var deleteIcon = new DOM_Element("img", false, false, [{name: "src", value: "assets/icons/open-iconic-master/png/trash-2x.png"}]);

                closeButton.element.bolsa = bolsa.id;
                deleteIcon.element.bolsa = bolsa.id;
                closeButton.click(function(e) {
                    e.preventDefault();
                    var deleteBolsa = document.getElementById("delete-bolsa");
                    deleteBolsa.bolsa = e.target.bolsa;
                    $("#confirm-delete").modal("show");
                });

                var editButton = new DOM_Element("button", "btn transparent-button");
                var editIcon = new DOM_Element("img", false, false, [{name: "src", value: "assets/icons/open-iconic-master/png/cog-2x.png"}]);

                editButton.element.bolsa = bolsa;
                editIcon.element.bolsa = bolsa;
                editButton.click(function(e) {
                    var currentBolsa = e.target.bolsa;
                    document.getElementById("editar").bolsa = currentBolsa.id;
                    e.preventDefault();
                    $("#registrar").hide();
                    $("#registrarBolsaTitle").hide();
                    $("#editar").show();
                    $("#editarBolsaTitle").show();

                    $("#nome").val(currentBolsa.nome);
                    $("#desconto").val(currentBolsa.desconto);
                    $("#dataInicio").val(currentBolsa.dataInicio);
                    $("#dataTermino").val(currentBolsa.dataTermino);
                    $("#descricao").val(currentBolsa.descricao);

                    if(Number(currentBolsa.fixa)) {
                        $("#tempDateRadio").prop("checked", false);
                        $("#fixDateRadio").prop("checked", true).click();
                    }
                    else {
                        $("#fixDateRadio").prop("checked", false);
                        $("#tempDateRadio").prop("checked", true).click();
                    }

                    $("#registrarBolsa").modal("show");
                });

                closeButton.appendChild(deleteIcon);
                editButton.appendChild(editIcon);
                edit.appendChild(editButton);
                edit.appendChild(closeButton);
                tr.appendChild(name);
                tr.appendChild(desconto);
                tr.appendChild(fixa);
                tr.appendChild(dataInicio);
                tr.appendChild(dataTermino);
                tr.appendChild(descricao);
                tr.appendChild(validity);
                tr.appendChild(edit);
                tr.addToDOM(tBody);
            }

            //Contagem de Bolsas
            var trCount = new DOM_Element("tr");
            var tdCount = new DOM_Element("td", "text-center", false, [{name: "colspan", value: 8}], data.length + " Bolsas");
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

        var data = getFormsVal();
        data.acao = "createBolsa";

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "php/bolsas/controle.php",
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
                    listBolsas();
                }
            },
            error: function(data) {
                listBolsas();
                console.log(data);
            }
        });
      });

      function updateBolsa(bolsaId) {
          $("#loading").show();
          var data = getFormsVal();
          data.acao = "updateBolsa";
          data.id = bolsaId;

          $.ajax({
              type: "POST",
              dataType: "json",
              url: "php/bolsas/controle.php",
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
                      listBolsas();
                  }
              },
              error: function(data) {
                  listBolsas();
                  console.log(data);
              }
          });
      }

      function deleteBolsa(bolsaId) {
          var data = {
              acao: "deleteBolsa",
              id: bolsaId
          };

          $.ajax({
              type: "POST",
              dataType: "json",
              url: "php/bolsas/controle.php",
              data: data,
              success: function(data) {
                  alert(data.Description);
                  listBolsas();
                  $("#confirm-delete").modal("hide");
              },
              error: function(data) {
                  console.log(data);
                  listBolsas();
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

      function getRequiredFields() {
          return [
              "nome", "descricao", "desconto", "fixa", "dataInicio", "dataTermino"
          ];
      }

      function getFormsVal() {
          var nome = $("#nome").val();
          var desconto = $("#desconto").val();
          var descricao = $("#descricao").val();
          var initDate = $("#dataInicio").val();
          var endDate =  $("#dataTermino").val();
          var fixed = 1;
          var dateForms = document.getElementsByName("dateRadio");
          for(var i = 0;i < dateForms.length;i++) {
              if(dateForms[i].checked) {
                  fixed = Number(dateForms[i].value);
                  break;
              }
          }

          return {
              nome: nome,
              desconto: desconto,
              descricao: descricao,
              fixa: fixed,
              dataInicio: initDate,
              dataTermino: endDate
          };
      }
    </script>
</html>
