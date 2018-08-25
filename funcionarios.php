<?php
require_once('php/database/DataBase.php');
require_once('php/cargos/Cargos.php');
$db = new DataBase();
$conn = $db->getConnection();

$cargos = new Cargos($conn);

$page_name = "Funcionários";
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

  <!--TABLE FUNCIONÁRIOS-->


  <br>
  <div class="container-fluid">
  <div class="table-responsive">
  <table class="table table-hover" style="text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">NOME</th>
      <th scope="col">E-MAIL</th>
      <th scope="col">CARGO</th>
      <th scope="col">CPF</th>
      <th scope="col">RG</th>
      <th scope="col">SEXO</th>
      <th scope="col" id="telefoneColumn">TELEFONE</th>
      <th scope="col">EDITAR</th>
      <!--<th scope="col" id="celularColumn" hidden>CELULAR</th>-->
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
      <a href="#" id="openRegisterModal" data-toggle="modal" data-target="#registrarFuncionario"><span class="oi oi-plus"></span></span><span class="nav-label">   Incluir</span></a>
      <a href="#"><span class="oi oi-print"></span><span class="nav-label">   Relatório</span></a>
    </li>
  </ul>
</nav>

<!-- END CONTENT -->

<!-- MODAL REGISTRAR FUNCIONÁRIO -->

    <!-- Modal -->


    <div class="modal fade" id="registrarFuncionario" tabindex="-1" role="dialog" aria-labelledby="registrarFuncionario" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registrarFuncionarioTitle">Nome do Funcionário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color: #F3E1B9;" >Dados do Funcionário</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="endereco-tab" data-toggle="tab" href="#endereco" role="tab" aria-controls="endereco" aria-selected="false" style="color: #F3E1B9;">Endereço/Comunicação</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="dadosProfissionais-tab" data-toggle="tab" href="#dadosProfissionais" role="tab" aria-controls="dadosProfissionais" aria-selected="false" style="color: #F3E1B9;">Dados Profissionais</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="financeiro-tab" data-toggle="tab" href="#financeiro" role="tab" aria-controls="financeiro" aria-selected="false" style="color: #F3E1B9;">Financeiro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="anexos-tab" data-toggle="tab" href="#anexos" role="tab" aria-controls="anexos" aria-selected="false" style="color: #F3E1B9;">Anexos</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">

              <!--DADOS DO  FUNCIONARIO-->
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="nome"> <span style="color:red">*</span> Nome:</label>
                      <input type="text" class="form-control" id="nome" placeholder="Ex.: Joaquin Teixeira">
                      <div class="invalid-feedback">
                        Por favor, digite o nome do funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="rg"> <span style="color:red">*</span> RG:</label>
                      <input type="text" class="form-control" id="rg" placeholder="Ex.: 171.251.54-26">
                      <div class="invalid-feedback">
                        Por favor, digite um rg válido.
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="cpf"> <span style="color:red">*</span> CPF:</label>
                      <input type="text" class="form-control" id="cpf" placeholder="Ex.: 171.251.54-26">
                      <div class="invalid-feedback">
                        Por favor, digite um cpf válido.
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="dataNascimento"> <span style="color:red">*</span> Data de Nasc.:</label>
                      <input type="date" class="form-control" id="dataNascimento">
                      <div class="invalid-feedback">
                        Por favor, digite uma data de nascimento válida.
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="estadoCivil">Estado Civil:</label>
                      <select class="custom-select" id="estadoCivil">
                        <option value="solteiro">Solteiro</option>
                        <option value="casado">Casado</option>
                      </select>
                      <div class="invalid-feedback">
                        Por favor, selecione o estado civil do funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="sexo">Sexo:</label>
                      <select class="custom-select" id="sexo">
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                      </select>
                      <div class="invalid-feedback">
                        Por favor, selecione o sexo do funcionário.
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="cargo">Cargo:</label>
                      <select class="custom-select" id="cargo">
                        <option value="null">(Selecione)</option>
                        <?php
                          $row = $cargos->listCargos();
                          foreach($row["response"] as $cargo){
                            $id = $cargo["cargoId"];
                            $nome = $cargo["cargoNome"];
                            echo "<option value='{$id}'>{$nome}</option>";
                          }
                          var_dump($row);
                        ?>
                      </select>
                      <div class="invalid-feedback">
                        Por favor, selecione o cargo do funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="cidadeNatal"> <span style="color:red">*</span> Cidade Natal:</label>
                      <input type="text" class="form-control" id="cidadeNatal">
                      <div class="invalid-feedback">
                        Por favor, digite a cidade natal do funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="matricula"> Matrícula:</label>
                      <input type="text" class="form-control" id="matricula" disabled>
                    </div>
                  </div>

                  <div class="form-row">
                    <span style="font-size: 10px; color: red;"> Os itens com * são obrigatórios </span>
                  </div>

                </form>
              </div>
              <!--END DADOS DO FUNCIONÁRIO-->

              <!--ENDEREÇO/COMUNICAÇÃO-->
              <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="endereco-tab">
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="cep"> <span style="color:red">*</span> CEP:</label>
                      <input type="text" class="form-control" id="cep" oninput="buscaCEP(this.value)" placeholder="">
                      <div class="invalid-feedback">
                        Por favor, digite o cep do funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="logradouro"> <span style="color:red">*</span> Logradouro:</label>
                      <input type="text" class="form-control" id="logradouro" placeholder="Ex.: Avenida 1">
                      <div class="invalid-feedback">
                        Por favor, digite o logradouro onde mora o funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="numero"> <span style="color:red">*</span> Número:</label>
                      <input type="number" class="form-control" id="numero" placeholder="Ex.: 77">
                      <div class="invalid-feedback">
                        Por favor, digite o numero da residência do funcionário.
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="complemento">Complemento:</label>
                      <input type="text" class="form-control" id="complemento">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="cidade"> <span style="color:red">*</span> Cidade:</label>
                      <input type="text" class="form-control" id="cidade">
                      <div class="invalid-feedback">
                        Por favor, digite a cidade onde mora o funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="bairro"> <span style="color:red">*</span> Bairro:</label>
                      <input type="text" class="form-control" id="bairro">
                      <div class="invalid-feedback">
                        Por favor, digite o bairro onde mora o funcionário.
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="email"> <span style="color:red">*</span> Email:</label>
                      <input type="email" class="form-control" id="email">
                      <div class="invalid-feedback">
                        Por favor, digite um email válido.
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="telefone"> <span style="color:red">*</span> Telefone:</label>
                      <input type="text" class="form-control" id="telefone">
                      <div class="invalid-feedback">
                        Por favor, digite um telefone válido.
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="celular">Celular:</label>
                      <input type="text" class="form-control" id="celular">
                      <div class="invalid-feedback">
                        Por favor, digite um celular válido.
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <span style="font-size: 10px; color: red;"> Os itens com * são obrigatórios </span>
                  </div>

                </form>
              </div>
              <!--END ENDEREÇO/COMUNICAÇÃO-->

              <!--DADOS PROFISSIONAIS-->
              <div class="tab-pane fade" id="dadosProfissionais" role="tabpanel" aria-labelledby="dadosProfissionais-tab">
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="contentTipoPagamento">Tipo de Pagamento:</label>
                      <div id="contentTipoPagamento">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="horista" name="tipoPagamento" class="custom-control-input" value="horista" onclick="showHoristasSecao()" checked>
                          <label class="custom-control-label" for="horista">Horista</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="mensalista" name="tipoPagamento" class="custom-control-input" value="mensalista" onclick="showMensalistasSecao()">
                          <label class="custom-control-label" for="mensalista">Mensalista</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4 offset-md-4">
                      <label for="carteiraProfissional"> <span style="color:red">*</span> Carteira Profissional:</label>
                      <input type="text" class="form-control" id="carteiraProfissional">
                      <div class="invalid-feedback">
                        Por favor, digite a carteira profissional do funcionário.
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <!-- <div class="form-group col-md-4">
                      <label for="carteiraProfissional">Carteira Profissional:</label>
                      <input type="text" class="form-control" id="carteiraProfissional">
                    </div> -->
                    <div class="form-group col-md-2">
                      <label for="inss"> <span style="color:red">*</span> INSS:</label>
                      <input type="text" class="form-control" id="inss">
                      <div class="invalid-feedback">
                        Por favor, digite o inss do funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="percentualInss"> <span style="color:red">*</span> Percentual INSS:</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="percentualInss" aria-describedby="inputGroupInssPercentual" min="0" max="100" required>
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupInssPercentual">%</span>
                        </div>
                        <div class="invalid-feedback">
                          Por favor, digite a porcentagem do INSS.
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-4 offset-md-4">
                      <label for="dataAdmissao"> <span style="color:red">*</span> Data de Admissão:</label>
                      <input type="date" class="form-control" id="dataAdmissao">
                      <div class="invalid-feedback">
                        Por favor, digite uma data de admissão válida.
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="ccm"> <span style="color:red">*</span> CCM:</label>
                      <input type="text" class="form-control" id="ccm">
                      <div class="invalid-feedback">
                        Por favor, digite o ccm do funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="percentualIss"> <span style="color:red">*</span> Percentual ISS:</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="percentualIss" aria-describedby="inputGroupInssPercentual" min="0" max="100" required>
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupIssPercentual">%</span>
                        </div>
                        <div class="invalid-feedback">
                          Por favor, digite o percentual do ISS.
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4 offset-md-4">
                      <label for="dataDemissao">Data de Demissão:</label>
                      <input type="date" class="form-control" id="dataDemissao" disabled="true">
                      <div class="invalid-feedback">
                        Por favor, digite uma data de demissão válida.
                      </div>
                    </div>
                  </div>
                  <div class="form-row" id="horistasSecao">
                    <div class="form-group col">
                      <fieldset>
                        <legend>Pagamento para Professores horistas</legend>
                        <div class="table-responsive">
                          <table class="table table-striped table-light">
                            <thead>
                              <tr>
                                <th scope="col">Tipo de Pagamento</th>
                                <th scope="col">Valor</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td> <span style="color:red">*</span> Aula Interna</td>
                                <td>
                                  <div class="form-group col-md-4">
                                    <div class="input-group">
                                      <input type="number" class="form-control" id="aulaInterna" aria-describedby="inputGroupAulaInterna" required>
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupAulaInterna">R$</span>
                                      </div>
                                      <div class="invalid-feedback">
                                        Por favor, digite o valor do pagamento para aulas internas.
                                      </div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td> <span style="color:red">*</span> Aula Externa</td>
                                <td>
                                  <div class="form-group col-md-4">
                                    <div class="input-group">
                                      <input type="number" class="form-control" id="aulaExterna" aria-describedby="inputGroupAulaExterna" required>
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupAulaExterna">R$</span>
                                      </div>
                                      <div class="invalid-feedback">
                                        Por favor, digite o valor do pagamento para aulas externas.
                                      </div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </fieldset>
                    </div>
                  </div>
                  <div class="form-row" id="mensalistasSecao" style="display: none">
                    <div class="form-group col">
                      <fieldset>
                        <legend>Pagamento para Professores Mensalistas</legend>
                        <div class="table-responsive">
                          <table class="table table-striped table-light">
                            <thead>
                              <tr>
                                <th scope="col">Tipo de Pagamento</th>
                                <th scope="col">Valor</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Salário Mensal</td>
                                <td>
                                  <div class="form-group col-md-4">
                                    <div class="input-group">
                                      <input type="number" class="form-control" id="salarioMensal" aria-describedby="inputGroupSalarioMensal" required>
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupSalarioMensal">R$</span>
                                      </div>
                                      <div class="invalid-feedback">
                                        Por favor, digite o valor do salário mensal do funcionário.
                                      </div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </fieldset>
                    </div>
                  </div>

                  <div class="form-row">
                    <span style="font-size: 10px; color: red;"> Os itens com * são obrigatórios </span>
                  </div>

                </form>
              </div>
              <!--END DADOS PROFISSIONAIS-->

              <!--FINANCEIRO-->
              <div class="tab-pane fade" id="financeiro" role="tabpanel" aria-labelledby="financeiro-tab">
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="banco">Banco:</label>
                      <select id="banco" class="custom-select">
                        <option selected>Banco do Brasil</option>
                        <option value="1">Santander</option>
                        <option value="2">Bradesco</option>
                        <option value="3">Itaú</option>
                      </select>
                      <div class="invalid-feedback">
                        Por favor, selecione o banco do funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="agencia"> <span style="color:red">*</span> Agência:</label>
                      <input type="text" class="form-control" id="agencia" placeholder="Ex.: 0012-3">
                      <div class="invalid-feedback">
                        Por favor, digite a agência do banco do funcionário.
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="conta"> <span style="color:red">*</span> Conta:</label>
                      <input type="text" class="form-control" id="conta" placeholder="Ex.: 0123456-7">
                      <div class="invalid-feedback">
                        Por favor, digite a conta do funcionário.
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="codigoBanco"> <span style="color:red">*</span> Código do Cliente no Banco:</label>
                      <input type="text" class="form-control" id="codigoBanco">
                      <div class="invalid-feedback">
                        Por favor, digite o código do cliente no banco do funcionário.
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <span style="font-size: 10px; color: red;"> Os itens com * são obrigatórios </span>
                  </div>

                </form>
              </div>
              <!--END FINANCEIRO-->

              <!--ANEXOS-->
              <div class="tab-pane fade" id="anexos" role="tabpanel" aria-labelledby="anexos-tab">
                <form>
                  <div class="form-group">
                    <label for="comment">Observações:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                  </div>
                </form>
                <form id="anexo" name="anexo">
                  <div class="form-group">
                    <label for="inputFile">Enviar Arquivos</label>
                    <input type="file" class="form-control-file" id="inputFile" name="inputFile" aria-describedby="fileHelp" multiple>
                    <!-- <button type="submit" id="submitFile" hidden>submit</button> -->
                  </div>
                </form>
              </div>
              <!--END ANEXOS-->

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
        <button id="delete-funcionario" type="button" class="btn btn-danger btn-ok">Excluir</button>
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
          listFuncionarios();
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

      function showHoristasSecao(){
        $("#mensalistasSecao").hide();
        $("#horistasSecao").show();
      }

      function showMensalistasSecao(){
        $("#horistasSecao").hide();
        $("#mensalistasSecao").show();
      }

      $("#openRegisterModal").click(function(e) {
          $(':input').val('');
          $("#editar").hide();
          $("#registrar").show();
          $("#dataDemissao").prop("disabled", true).val("");
      });

      $("#editar").click(function(e) {
          updateFuncionario(e.target.funcionario);
      });

      $("#delete-funcionario").click(function(e) {
          e.preventDefault();
          deleteFuncionario(e.target.funcionario);
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
          $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(data, status){
            if(!data.erro){
              $("#logradouro").val(data.logradouro);
              $("#complemento").val(data.complemento);
              $("#bairro").val(data.bairro);
              $("#cidade").val(data.localidade);
            }else{
              alert('falha ao buscar o CEP');
            }
          });
        }
      }

      function listFuncionarios(){
        var data = {
          "acao": "listFuncionarios"
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "php/funcionarios/controle.php",
          data: data,
          success: function(data) {
              var tBody = document.getElementById("tableContent");
              tBody.innerHTML = "";
              for(var i = 0;i < data.length;i++) {
                  var funcionario = data[i];
                  var tr = new DOM_Element("tr");
                  var nome = new DOM_Element("th", false, false, false, funcionario.nome);
                  var email = new DOM_Element("td", false, false, false, funcionario.email);
                  var cargo = new DOM_Element("td", false, false, false, funcionario.cargo);
                  var cpf = new DOM_Element("td", false, false, false, funcionario.cpf);
                  var rg = new DOM_Element("td", false, false, false, funcionario.rg);
                  var sexo = new DOM_Element("td", false, false, false, funcionario.sexo);
                  var telefoneORCelular = new DOM_Element("td", false, false, false, funcionario.telefone);
                  var edit = new DOM_Element("td");

                  var closeButton = new DOM_Element("button", "btn transparent-button", false, false);
                  var deleteIcon = new DOM_Element("img", false, false, [{name: "src", value: "assets/icons/open-iconic-master/png/trash-2x.png"}]);

                  var editButton = new DOM_Element("button", "btn transparent-button");
                  var editIcon = new DOM_Element("img", false, false, [{name: "src", value: "assets/icons/open-iconic-master/png/cog-2x.png"}]);

                  closeButton.element.funcionario = funcionario.id;
                  deleteIcon.element.funcionario = funcionario.id;
                  editButton.element.funcionario = funcionario;
                  editIcon.element.funcionario = funcionario;
                  editButton.click(function(e) {
                      console.log(e.target.funcionario);
                      var currentFuncionario = e.target.funcionario;
                      document.getElementById("editar").funcionario = currentFuncionario.id;
                      e.preventDefault();
                      $("#registrar").hide();
                      $("#editar").show();
                      $("#dataDemissao").prop("disabled", false);

                      setFuncionariosFieldsValues(currentFuncionario);

                      $("#registrarFuncionario").modal("show");
                  });

                  closeButton.click(function(e) {
                      e.preventDefault();
                      var deleteFuncionario = document.getElementById("delete-funcionario");
                      deleteFuncionario.funcionario = e.target.funcionario;
                      $("#confirm-delete").modal("show");
                  });

                  if(funcionario.celular && funcionario.celular !== "null") {
                      telefoneORCelular.changeContent(funcionario.celular);
                  }

                  closeButton.appendChild(deleteIcon);
                  editButton.appendChild(editIcon);
                  edit.appendChild(editButton);
                  edit.appendChild(closeButton);
                  tr.appendChild(nome);
                  tr.appendChild(email);
                  tr.appendChild(cargo);
                  tr.appendChild(cpf);
                  tr.appendChild(rg);
                  tr.appendChild(sexo);
                  tr.appendChild(telefoneORCelular);
                  tr.appendChild(edit);
                  tr.addToDOM(tBody);
              }

              var trCount = new DOM_Element("tr");
              var tdCount = new DOM_Element("td", "text-center", false, [{name: "colspan", value: 8}], data.length + " Funcionários");
              trCount.appendChild(tdCount);
              trCount.addToDOM(tBody);
            console.log(data);
          }
        });
      }

      $("#registrar").click(function(){
        $("#loading").show();

        createFuncionario();
      });

      function createFuncionario() {
          var data = getFormsVal();
          data.acao = "createFuncionario";
          $.ajax({
              type: "POST",
              dataType: "json",
              url: "php/funcionarios/controle.php",
              data: data,
              success: function(data) {
                  if(data.erro) {
                      if(data.Description) {
                          // alert(data.Description);
                      }
                      else {
                          // alert("Arrume os campos em vermelho.");
                         setInvalidFields(data.invalidFields);
                      }
                  }
                  else {
//                      $("#registrarFuncionario").modal("hide");
//                      $("#sucessoRegistro").modal("show");
                      setInvalidFields([]);
                      listFuncionarios();
                  }
              },
              error: function(data) {
                  console.log(data);
              }
          });
      }
      function updateFuncionario(funcionarioId){
          $("#loading").show();
          var data = getFormsVal();
          data.acao = "updateFuncionario";
          data.id = funcionarioId;

          $.ajax({
              type: "POST",
              dataType: "json",
              url: "php/funcionarios/controle.php",
              data: data,
              success: function(data) {
                  if(data.erro) {
                      if(data.Description) {
                          // alert(data.Description);
                      }
                      else {
                          // alert("Arrume os campos em vermelho.");
                          setInvalidFields(data.invalidFields);
                      }
                  }
                  else {
                      alert(data.Description);
                      setInvalidFields([]);
                      listFuncionarios();
                  }
                  console.log(data);
              },
              error: function(data) {
                  alert(data.Description);
                  listFuncionarios();
                  console.log(data);
              }
          });
      }

      function deleteFuncionario(funcionarioId) {
          var data = {
              acao: "deleteFuncionario",
              id: funcionarioId
          };

          $.ajax({
              type: "POST",
              dataType: "json",
              url: "php/funcionarios/controle.php",
              data: data,
              success: function(data) {
                  // alert(data.Description);
                  listFuncionarios();
                  $("#confirm-delete").modal("hide");
              },
              error: function(data) {
                  console.log(data);
                  listFuncionarios();
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

      function setFuncionariosFieldsValues(funcionario){
          $("#nome").val(funcionario.nome);
          $("#matricula").val(funcionario.matricula);
          $("#rg").val(funcionario.rg);
          $("#cpf").val(funcionario.cpf);
          $("#dataNascimento").val(funcionario.dataNascimento);
          $("#estadoCivil").val(funcionario.estadoCivil);
          $("#sexo").val(funcionario.sexo);
          $("#cargo").val(funcionario.cargo);
          $("#cidadeNatal").val(funcionario.cidadeNatal);
          $("#cep").val(funcionario.cep);
          $("#logradouro").val(funcionario.logradouro);
          $("#numero").val(funcionario.numero);
          $("#complemento").val(funcionario.complemento);
          $("#cidade").val(funcionario.cidade);
          $("#bairro").val(funcionario.bairro);
          $("#email").val(funcionario.email);
          $("#telefone").val(funcionario.telefone);
          $("#celular").val(funcionario.celular);
          $("#" + funcionario.tipoPagamento).prop("checked", true).click();
          $("#carteiraProfissional").val(funcionario.carteiraProfissional);
          $("#inss").val(funcionario.inss);
          $("#percentualInss").val(funcionario.percentualInss);
          $("#dataAdmissao").val(funcionario.dataAdmissao);
          $("#ccm").val(funcionario.ccm);
          $("#percentualIss").val(funcionario.percentualIss);
          $("#dataDemissao").val(funcionario.dataDemissao);
          $("#aulaInterna").val(funcionario.aulaInterna);
          $("#aulaExterna").val(funcionario.aulaExterna);
          $("#salarioMensal").val(funcionario.salarioMensal);
          $("#banco").val(funcionario.banco);
          $("#agencia").val(funcionario.agencia);
          $("#conta").val(funcionario.conta);
          $("#codigoBanco").val(funcionario.codigoBanco);
          $("#observacoes").val(funcionario.observacoes);
          $("#anexo").val(funcionario.anexo);
      }

      function getRequiredFields() {
          return [
              "nome", "rg", "cpf", "dataNascimento", "estadoCivil", "sexo", "cargo", "cidadeNatal", "cep", "logradouro",
              "numero", "complemento", "cidade", "bairro", "email", "telefone", "tipoPagamento", "carteiraProfissional",
              "inss", "percentualInss", "dataAdmissao", "ccm", "percentualIss", "banco", "agencia", "conta",
              "codigoBanco", "aulaInterna", "aulaExterna", "salarioMensal", "celular"
          ];
      }

      function getFormsVal() {
          var nome = $("#nome").val();
          var rg = $("#rg").val();
          var cpf = $("#cpf").val();
          var dataNascimento = $("#dataNascimento").val();
          var estadoCivil = $("#estadoCivil").val();
          var sexo = $("#sexo").val();
          var cargo = $("#cargo").val();
          var cidadeNatal = $("#cidadeNatal").val();
          var cep = $("#cep").val();
          var logradouro = $("#logradouro").val();
          var numero = $("#numero").val();
          var complemento = $("#complemento").val();
          var cidade = $("#cidade").val();
          var bairro = $("#bairro").val();
          var email = $("#email").val();
          var telefone = $("#telefone").val();
          var celular = $("#celular").val();
          var tipoPagamento = $('input[name=tipoPagamento]:checked').val();
          var carteiraProfissional = $("#carteiraProfissional").val();
          var inss = $("#inss").val();
          var percentualInss = $("#percentualInss").val();
          var dataAdmissao = $("#dataAdmissao").val();
          var ccm = $("#ccm").val();
          var percentualIss = $("#percentualIss").val();
          var dataDemissao = $("#dataDemissao").val();
          var aulaInterna = $("#aulaInterna").val();
          var aulaExterna = $("#aulaExterna").val();
          var salarioMensal = $("#salarioMensal").val();
          var banco = $("#banco").val();
          var agencia = $("#agencia").val();
          var conta = $("#conta").val();
          var codigoBanco = $("#codigoBanco").val();
          var observacoes = $("#comment").val();
          var anexo = $("#inputFile").val();

          return {
              nome: nome,
              rg: rg,
              cpf: cpf,
              dataNascimento: dataNascimento,
              estadoCivil: estadoCivil,
              sexo: sexo,
              cargo: cargo,
              cidadeNatal: cidadeNatal,
              cep: cep,
              logradouro: logradouro,
              numero: numero,
              complemento: complemento,
              cidade: cidade,
              bairro: bairro,
              email: email,
              telefone: telefone,
              celular: celular,
              tipoPagamento: tipoPagamento,
              carteiraProfissional: carteiraProfissional,
              inss: inss,
              percentualInss: percentualInss,
              dataAdmissao: dataAdmissao,
              ccm: ccm,
              percentualIss: percentualIss,
              dataDemissao: dataDemissao,
              aulaInterna: aulaInterna,
              aulaExterna: aulaExterna,
              salarioMensal: salarioMensal,
              banco: banco,
              agencia: agencia,
              conta: conta,
              codigoBanco: codigoBanco,
              observacoes: observacoes,
              anexo: anexo
          }
      }
    </script>




</html>
