<?php
require_once('php/database/DataBase.php');
require_once('php/bolsas/Bolsas.php');
require_once('php/parcelas/Parcelas_Categorias.php');
require_once('php/formas_de_cobrancas/Formas_de_Cobrancas.php');
require_once('php/contas_bancarias/Contas_Bancarias.php');
require_once('php/operadoras_de_cartao/Operadoras_de_Cartao.php');
session_start();
if($_SESSION['roleId'] != 1 && $_SESSION['roleId'] != 2 && $_SESSION['roleId'] != 3)
{
  header("Location: index.php");
}
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

<div id="page-cover">
  <img src="assets/gifs/loading-icon6.gif" id="loading-gif" />
</div>

<!-- TELA DE MENSALIDADES -->
<div class="contratos">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="dados-plano-tab" data-toggle="tab" href="#dados-plano-section" role="tab" aria-controls="dados-plano-section" aria-selected="true" style="color: #F3E1B9;" >Dados do Plano</a>
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
              <label for="aluno"><span style="color:red">*</span> Nome:</label>
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
                <label for="parcelas-quantidade" class="control-label">
                  <span style="color:red">*</span> Parcelas
                </label>
                <input type="number" id="parcelas-quantidade" class="form-control" min="0" onchange="calculaValorTotal()" />
              </div>
                <div class="input-group col-4" style="float: left; width: 50%">
                  <label for="valor-parcela" class="control-label">
                    <span style="color:red">*</span> Valor Parcela
                  </label>
                  <div class="input-group">
                    <input type="text" id="valor-parcela" class="form-control" placeholder="246,00" onchange="calculaValorTotal()" />
                    <div class="input-group-append">
                      <span class="input-group-text">R$</span>
                    </div>
                  </div>
                </div>
                <div class="input-group col-4" style="float: left; width: 50%">
                  <label for="valor-total" class="control-label">Valor Total</label>
                  <div class="input-group">
                    <input type="text" id="valor-total" class="form-control" disabled />
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
                <label for="data-vencimento" class="control-label">
                  <span style="color:red">*</span> Data de Vencimento
                </label>
                <input type="date" id="data-vencimento" class="form-control" />
            </fieldset>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <fieldset>
              <legend class="md-4">Plano de Contas</legend>
              <div class="form-group col-md-6" style="float: left; width: 50%">
                <label for="categoria">
                  <span style="color:red">*</span> Categoria
                </label>
                <select id="categoria" class="form-control">
                  <option value="0">(Selecione)</option>
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
          <div class="custom-control custom-checkbox" style="margin-left: 5px">
            <input type="checkbox" class="custom-control-input" id="quitar-primeira-parcela">
            <label class="custom-control-label" for="quitar-primeira-parcela">Quitar a 1ª parcela</label>
          </div>
        </div>
        <div class="form-row">
          <span style="font-size: 10px; color: red;"> Os itens com * são obrigatórios </span>
        </div>
        <div class="btns-panel-acoes">
          <button type="button" class="btn btn-primary" onclick="registraPlano()">Criar Plano</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
    <!-- FIM DADOS DO PLANO -->
  </div>
</div>
<!-- FIM TELA DE MENSALIDADES -->
    <script>
    $(document).on('show.bs.modal', '.modal', function () {
    var zIndex = 1040 + (10 * $('.modal:visible').length);
    $(this).css('z-index', zIndex);
    setTimeout(function() {
        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
    }, 0);
});
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

    // Calcula o valor total a ser pago, exemplo: parcelas*valor
    function calculaValorTotal(){
      parcelas = document.getElementById("parcelas-quantidade").value;
      valor = document.getElementById("valor-parcela").value;
      valor = valor.replace(',', '.');
      total = parcelas*valor;
      total = parseFloat(Math.round(total * 100) / 100).toFixed(2);
      total = total.replace('.', ',');
      document.getElementById("valor-total").value = total;
    }

    // Pega todos os dados de Dados do Contrato
    function getDadosPlanoForm(){
      data = [{
        'aluno':document.getElementById('aluno').dataset.id,
        'bolsa':$("#bolsa").val(),
        'desconto-manual':$("#desconto-manual").val(),
        'parcelas-quantidade':$("#parcelas-quantidade").val(),
        'valor-parcela':$("#valor-parcela").val(),
        'valor-total':$("#valor-total").val(),
        'data-vencimento':$("#data-vencimento").val(),
        'categoria':$("#categoria").val(),
        'complemento':$("#complemento").val(),
        'documento':$("#documento").val(),
        'quitar-primeira-parcela':$("#quitar-primeira-parcela").is(":checked"),
        'observacoes':''
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
          if (data.erro)
          {
            try
            {
              if(data.invalidFields)
              {
                size = data.invalidFields.length;
                for(i = 0; i < size; i++)
                {
                  $("#"+data.invalidFields[i]).addClass('is-invalid');
                }
              }
            }
            catch (error)
            {
              console.error(error);
            }
          }
          else
          {
            // O usuário escolheu quitar a primeira parcela
            if (data.quitar)
            {
              // Abre o modal de quitar parcelas
              showQuitarParcela(data.insert_id);
            }
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    }
    // Função responsável por pegar o id do aluno
    function verificarNome(){
      var aluno = document.getElementById("aluno");
      var val = aluno.value;
      if(val.length >= 4){
        indexSlice = val.indexOf('(');
        var id = val.slice(indexSlice+1, (val.length)-1);
        var opts = document.getElementById('suggestions-alunos').childNodes;
        for (var i = 0; i < opts.length; i++) {
          console.log(opts[i].dataset.id);
          console.log("id: "+id);
          if (opts[i].dataset.id === id) {
            alunoId = opts[i].dataset.id;
            aluno.dataset.id = alunoId;
            // document.getElementById("aluno").value = val.slice(0, indexSlice-1);
            break;
          }
        }
      }
    }

    // Função responsável por buscar os alunos e responsáveis, de acordo com o que foi digitado no campo input
    function getAlunos(text){
      indexSlice = text.indexOf('(');
      text = (indexSlice >= 0)? text.slice(0, indexSlice-1): text;
      console.log("bla: "+text);
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
            console.log(size);
            for(i; i < size; i++){
              $("#suggestions-alunos").append("<option data-id='"+data[i].id+"' value='"+data[i].nome+" ("+data[i].id+")' />");
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
    </script>
</html>
