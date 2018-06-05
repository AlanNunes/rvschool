<?php
require_once('php/database/DataBase.php');
require_once('php/bolsas/Bolsas.php');
require_once('php/parcelas/Parcelas_Categorias.php');
require_once('php/formas_de_cobrancas/Formas_de_Cobrancas.php');
require_once('php/contas_bancarias/Contas_Bancarias.php');
require_once('php/operadoras_de_cartao/operadoras_de_cartao.php');
// Cria uma instância do Banco de Dados e pega a conexão do mesmo
$db = new DataBase();
$conn = $db->getConnection();
// Cria uma instância de Bolsas
$bolsas = new Bolsas($conn);
// Cria uma instância de ParcelasCategorias
$categorias = new Parcelas_Categorias($conn);
// Cria uma instância de Formas de Cobranças
$formasCobrancas = new Formas_de_Cobrancas($conn);
// Cria uma instância de Formas de Cobranças
$contasBancarias = new Contas_Bancarias($conn);
// Cria uma instância de Operadoras de Cartões
$operadorasCartao = new Operadoras_de_Cartao($conn);
?>
<!-- This view is rendered in another view -->
<html lang="pt">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/fav.ico">
	<title> Mensalidades - Revolution School </title>

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php //include('header.php'); ?>

<!-- TELA DE MENSALIDADES -->
<div class="contratos">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="dados-plano-tab" data-toggle="tab" href="#dados-plano-section" role="tab" aria-controls="dados-plano-section" aria-selected="true" style="color: #F3E1B9;" >Dados do Plano</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="matricula-tab" data-toggle="tab" href="#matricula-section" role="tab" aria-controls="matricula" aria-selected="false" style="color: #F3E1B9;">Matrícula</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="outros-tab" data-toggle="tab" href="#outros-section" role="tab" aria-controls="outros" aria-selected="false" style="color: #F3E1B9;">Outros</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">

    <!--DADOS DO  PLANO-->
    <div class="tab-pane fade show active" id="dados-plano-section" role="tabpanel" aria-labelledby="dados-plano">
      <form id="form-dados-contrato">
        <div class="form-row">
          <div class="form-group col-6">
            <fieldset>
              <legend class="md-4">Sacado</legend>
              <label for="aluno">Nome do Aluno:</label>
              <input list="suggestions-alunos" data-id="" class="form-control" id="aluno" placeholder="Ex.: Eunice Maria" onkeyup="getAlunos(this.value)" oninput="verificarNome()">
              <datalist id="suggestions-alunos">
              </datalist>
              <div class="invalid-feedback">
                Por favor, selecione um aluno da lista.
              </div>
            </fieldset>
          </div>
          <div class="form-group col-6">
            <fieldset>
              <legend class="md-3">Bolsa/Desconto</legend>
              <!-- <label for="bolsa">Bolsa</label> -->
              <select class="form-control" id="bolsa">
                <option value="0">(Selecione)</option>
                <?php
                  $response = $bolsas->listBolsas();
                  if(!$response['erro']){
                    foreach($response['response'] as $bolsa){
                      $id = $bolsa['id'];
                      $nome = $bolsa['nome'];
                      $desconto = $bolsa['desconto'];
                      echo "<option value='{$id}'>{$nome} ({$desconto}%)</option>";
                    }
                  }
                ?>
              </select>
              <label for="desconto-manual">Desconto Manual</label>
              <div class="input-group">
                <input type="text" class="form-control" id="desconto-manual" />
                  <div class="input-group-append">
                    <span class="input-group-text">R$</span>
                  </div>
              </div>
            </fieldset>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-8">
            <fieldset>
              <legend class="md-4">Valores</legend>
              <div class="form-group col-3" style="float: left; width: 50%">
                <label for="parcelas-quantidade" class="control-label">Parcelas</label>
                <input type="number" id="parcelas-quantidade" class="form-control" min="0" />
              </div>
                <div class="input-group col-4" style="float: left; width: 50%">
                  <label for="valor-parcela" class="control-label">Valor Parcela</label>
                  <div class="input-group">
                    <input type="text" id="valor-parcela" class="form-control" placeholder="246,00" />
                    <div class="input-group-append">
                      <span class="input-group-text">R$</span>
                    </div>
                  </div>
                </div>
                <div class="input-group col-4" style="float: left; width: 50%">
                  <label for="valor-total" class="control-label">Valor Total</label>
                  <div class="input-group">
                    <input type="text" id="valor-total" class="form-control" />
                    <div class="input-group-append">
                      <span class="input-group-text">R$</span>
                    </div>
                  </div>
                </div>
            </fieldset>
          </div>
          <div class="form-group col-4">
            <fieldset>
              <legend class="md-2">Data de Vencimento</legend>
                <label for="data-vencimento" class="control-label">Data de Vencimento</label>
                <input type="date" id="data-vencimento" class="form-control" />
            </fieldset>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <fieldset>
              <legend class="md-4">Plano de Contas</legend>
              <div class="form-group col-md-6" style="float: left; width: 50%">
                <label for="categoria">Categoria</label>
                <select id="categoria" class="form-control">
                  <?php
                    $response = $categorias->getCategorias();
                    if($response){
                      foreach($response as $categoria){
                        $id = $categoria['id'];
                        $nome = $categoria['nome'];
                        echo "<option value='{$id}'>{$nome}</option>";
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-4" style="float: left; width: 50%">
                <label for="complemento">Complemento</label>
                <input type="text" id="complemento" class="form-control" />
              </div>
              <div class="form-group col-md-2" style="float: left; width: 50%">
                <label for="documento">Documento</label>
                <input type="text" id="documento" class="form-control" />
              </div>
            </fieldset>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <fieldset>
              <legend class="md-4">Cobrança</legend>
              <div class="form-group col-md-4" style="float: left; width: 50%">
                <label for="forma-cobranca">Forma de Cobrança</label>
                <select id="forma-cobranca" class="form-control" onchange="show_operadoras_cartao(this)">
                  <option value="0" data-cartao="1">(Selecione)</option>
                  <?php
                    $response = $formasCobrancas->getFormasCobranca();
                    if($response){
                      foreach($response as $formaCobranca){
                        $id = $formaCobranca['id'];
                        $nome = $formaCobranca['nome'];
                        $operadoracartao = $formaCobranca['operadoracartao'];
                        echo "<option value='{$id}' data-cartao='{$operadoracartao}'>{$nome}</option>";
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-4" style="float: left; width: 50%">
                <label for="conta-bancaria">Conta Bancária</label>
                <select id="conta-bancaria" class="form-control">
                  <!-- <option value="0">(Selecione)</option> -->
                  <?php
                    $response = $contasBancarias->getContasBancarias();
                    if($response){
                      foreach($response as $contaBancaria){
                        $id = $contaBancaria['id'];
                        $nome = $contaBancaria['nome'];
                        echo "<option value='{$id}'>{$nome}</option>";
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-4" style="float: left; width: 50%">
                <label for="operadora-de-cartao">Operadora de Cartão</label>
                <select id="operadora-de-cartao" class="form-control" disabled>
                  <option value="0" selected>(Selecione)</option>
                  <?php
                    $response = $operadorasCartao->getOperadoras();
                    if($response){
                      foreach($response as $operadora){
                        $id = $operadora['id'];
                        $nome = $operadora['nome'];
                        echo "<option value='{$id}'>{$nome}</option>";
                      }
                    }
                  ?>
                </select>
              </div>
            </fieldset>
          </div>
        </div>
        <div class="form-row">
          <div class="custom-control custom-checkbox" style="margin-left: 5px">
            <input type="checkbox" class="custom-control-input" id="quitar-primeira-parcela">
            <label class="custom-control-label" for="quitar-primeira-parcela">Quitar a 1ª parcela</label>
          </div>
        </div>
        <div class="btns-panel-acoes">
          <button type="button" class="btn btn-primary" onclick="cadastrarContrato()">Lanças Parcelas !</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
    <!-- FIM DADOS DO PLANO -->

  </div>
</div>
<!-- FIM TELA DE MENSALIDADES -->

<?php //include('footer.php') ?>
<!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    // Verifica se a forma de cobrança selecionada é relacionada à cartões
    // Se for relacionada à cartões, ele abilita o select de operadoras e seleciona a primeira operadora de cartão, caso contrário ele desabilita o mesmo
    function show_operadoras_cartao(forma_cobranca){
      operadora = document.getElementById("operadora-de-cartao");
      i = forma_cobranca.selectedIndex;
      if(parseInt(forma_cobranca[i].dataset.cartao)){
        operadora.disabled = false;
        operadora.selectedIndex = 1;
      }else{
        operadora.disabled = true;
        operadora.selectedIndex = 0;
      }
    }

    // Pega todos os dados de Dados do Contrato
    function getDadosPlanoForm(){
      data = [{
        'aluno':$("#aluno").val(),
        'bolsa':$("#bolsa").val(),
        'desconto-manual':$("#desconto-manual").val(),
        'parcelas-quantidade':$("#parcelas-quantidade").val(),
        'valor-parcela':$("#valor-parcela").val(),
        'valor-total':$("#valor-total").val(),
        'data-vencimento':$("#data-vencimento").val(),
        'categoria':$("#categoria").val(),
        'complemento':$("#complemento").val(),
        'documento':$("#documento").val(),
        'forma-cobranca':$("#forma-cobranca").val(),
        'conta-bancaria':$("#conta-bancaria").val(),
        'operadora-de-cartao':$("#operadora-de-cartao").val(),
        'quitar-primeira-parcela':$("#quitar-primeira-parcela").is(":checked")
      }];
      return data;
    }

    function registraPlano(data = getDadosPlanoForm()){
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/parcelas/controle.php",
        data: {'acao':'registrarPlano',data},
        success: function(data) {
          console.log(data);
          $('input').addClass('is-valid');
          $('select').addClass('is-valid');
          $('select').removeClass('is-invalid');
          $('input').removeClass('is-invalid');
          if(data.erro){
            try {
              if(data.invalidFields){
                size = data.invalidFields.length;
                for(i = 0; i < size; i++){
                  $("#"+data.invalidFields[i]).addClass('is-invalid');
                }
              }
            }
            catch (error){
              console.error(error);
            }
          }
          console.log(data);
        },
        error: function(error) {
          console.log(error);
        }
      });
    }
    </script>
</html>
