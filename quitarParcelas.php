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
// Cria uma instância de Formas de Cobranças
$formasCobrancas = new Formas_de_Cobrancas($conn);
// Cria uma instância de Formas de Cobranças
$contasBancarias = new Contas_Bancarias($conn);
// Cria uma instância de Operadoras de Cartões
$operadorasCartao = new Operadoras_de_Cartao($conn);
?>
<!-- This view is rendered in another view -->

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

<div id="page-cover">
  <img src="assets/gifs/loading-icon6.gif" id="loading-gif" />
</div>
<div class="painel">
      <form>
        <div class="form-row">
          <div class="form-group col-md">
            <label for="forma_de_cobranca">Forma de Cobrança:</label>
            <select id="forma_de_cobranca" class="form-control" onchange="show_operadoras_cartao(this);">
              <option value='' data-cartao=''>(Selecione)</option>
              <?php
                $response = $formasCobrancas->getFormasCobranca();
                foreach ($response as $item)
                {
                  $id = $item['id'];
                  // Nome do tipo de cobrança
                  $nome = $item['nome'];
                  // boolean
                  $cartao = $item['operadoracartao'];
                  echo "<option value='{$id}' data-cartao='{$cartao}'>{$nome}</option>";
                }
               ?>
            </select>
            <div class="invalid-feedback">
              Você esqueceu de selecionar aqui ;)
            </div>
          </div>
          <div class="form-group col-md">
            <label for="operadoras_cartao">Bandeira:</label>
            <select id="operadora_cartao" class="form-control" disabled>
              <option value=''>(Selecione)</option>
              <?php
                $response = $operadorasCartao->getOperadoras();
                foreach ($response as $item)
                {
                  $id = $item['id'];
                  $nome = $item['nome'];
                  echo "<option value='{$id}'>{$nome}</option>";
                }
               ?>
            </select>
            <div class="invalid-feedback">
              Qual a bandeira ?
            </div>
          </div>
          <div class="form-group col-md">
            <label for="conta_bancaria">Conta Bancária:</label>
            <select id="conta_bancaria" class="form-control">
              <option value=''>(Selecione)</option>
              <?php
                $response = $contasBancarias->getContasBancarias();
                foreach ($response as $item)
                {
                  $id = $item['id'];
                  $nome = $item['nome'];
                  echo "<option value='{$id}'>{$nome}</option>";
                }
               ?>
            </select>
            <div class="invalid-feedback">
              Não se esqueça de escolher a conta bancária .-.
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md">
              <label for="valor_a_receber">Valor a Receber:</label>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">R$</span>
                </div>
                <input type="text" id="valor_a_receber" class="form-control" disabled />
              </div>
              <div class="invalid-feedback">
                Este campo está faltando informações
              </div>
          </div>
          <div class="form-group col-md">
            <label for="valor_recebido">Valor Recebido:</label>
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text">R$</span>
              </div>
              <input type="text" id="valor_recebido" class="form-control" onchange="validateValorRecebido(this.value)" />
              <div class="invalid-feedback">
                Tens certeza que a quantia está certa ? :o
              </div>
            </div>
          </div>
          <div class="form-group col-md">
            <label for="troco">Troco:</label>
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text">R$</span>
              </div>
              <input type="text" id="troco" class="form-control" />
              <div class="invalid-feedback">
                Confira se o troco está certinho antes de quitar a parcela ;)
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md">
            <label for="desconto">Desconto:</label>
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text">R$</span>
              </div>
              <input type="text" id="desconto" class="form-control" onchange="calculaDesconto(this.value)" />
            </div>
          </div>
          <div class="form-group col-md">
            <label for="desconto_percentual">Desconto %:</label>
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text">R$</span>
              </div>
              <input type="text" id="desconto_percentual" class="form-control" onchange="calculaDescontoPercentual(this.value)" />
            </div>
          </div>
          <div class="form-group col-md">
            <label for="data_recebimento">Data de Recebimento:</label>
            <input type="date" id="data_recebimento" class="form-control" />
            <div class="invalid-feedback">
              Pleasee, diga-me quando a parcela foi quitada
            </div>
          </div>
        </div>
      </form>
      <div class="form-row">
        <button class="btn btn-primary" onclick="quitar()">Quitar</button>
      </div>
  </div>

  <!-- MODAL DE FEEDBACK -->
  <div class="modal fade" id="modal-feedback" tabindex="-1" role="dialog" aria-labelledby="modal-feedbackLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="title-modal-feedback">Revolution School</h5>
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
  <!-- FIM MODAL DE FEEDBACK -->

<!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
       var today = new Date();
       var dd = today.getDate();
       var mm = today.getMonth()+1; //January is 0!
       var yyyy = today.getFullYear();
       if(dd<10){dd='0'+dd}
       if(mm<10){mm='0'+mm}
       var today = yyyy + '-' + mm + '-' + dd;
       document.getElementById("data_recebimento").value = today;

       getParcela();
    });

    // Busca a parcela de acordo com o id passado na url e retorna a mesma
    // já com os descontos aplicados
    function getParcela()
    {
      console.log(getUrlParameter('id'));
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/parcelas/controle.php",
        data: {'acao':'getParcelaByIdAplicandoDescontos', 'id':getUrlParameter('id')},
        success: function(data) {
          if(data)
          {
            console.log(data);
            window.valor_original = data.mensalidade;
            $("#valor_a_receber").val(data.mensalidade);
          }
        },
        error: function(error) {
          console.warn(error);
        }
      });
    }

    // Verifica se a forma de cobrança selecionada é relacionada à cartões
    // Se for relacionada à cartões, ele abilita o select de operadoras e seleciona a primeira operadora de cartão, caso contrário ele desabilita o mesmo
    function show_operadoras_cartao(forma_cobranca)
    {
      operadora = document.getElementById("operadora_cartao");
      i = forma_cobranca.selectedIndex;
      if (parseInt(forma_cobranca[i].dataset.cartao))
      {
        operadora.disabled = false;
        operadora.selectedIndex = 0;
      }
      else
      {
        operadora.disabled = true;
        operadora.selectedIndex = 0;
      }
    }

    // Function que mostra Modal com resposta
    function showFeedbackModal(titulo, conteudo, botaoConteudo, botaoClass, botaoAtributos)
    {
      alert('birl');
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

    // Quita a parcela
    function quitar()
    {
      showLoadingGif();
      data = getFormData();
      console.log(data);
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/parcelas/controle.php",
        data: {'acao':'quitarParcela', 'data':data},
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
          else
          {
            showFeedbackModal('Sucesso', 'A parcela foi quitada com sucesso!', 'Beleza!', 'btn btn-primary', [{name: 'data-dismiss', value: 'modal'}]);
            $('#modal-quitar').modal('hide');
          }
        },
        error: function(error) {
          console.warn(error);
        }
      });
      closeLoadingGif();
    }

    // Pega todos os dados dos fields do form
    function getFormData()
    {
      forma_cobranca = document.getElementById("forma_de_cobranca");
      i = forma_cobranca.selectedIndex;
      data = {
        'forma_de_cobranca' : $("#forma_de_cobranca").val(),
        'operadora_cartao' : $("#operadora_cartao").val(),
        'conta_bancaria' : $("#conta_bancaria").val(),
        'valor_a_receber' : $("#valor_a_receber").val(),
        'valor_recebido' : $("#valor_recebido").val(),
        'troco' : $("#troco").val(),
        'desconto' : $("#desconto").val(),
        'desconto_percentual' : $("#desconto_percentual").val(),
        'data_recebimento' : $("#data_recebimento").val(),
        // Para saber se a forma de cobrança é em cartão ou não
        'cartao' : forma_cobranca[i].dataset.cartao,
        'id' : getUrlParameter('id')
      };

      return data;
    }

    // Pega parâmetros da Url
    // Exemplo: getUrlParameter('id');
    function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
        return '';
    }

    // Valida o troco e o valor recebido
    // Muda os inputs de cor de acordo com a situação do cálculo
    function validateValorRecebido(valor)
    {
      valor_a_receber = $("#valor_a_receber").val();
      valor_a_receber = valor_a_receber.replace(',', '.');
      valor = valor.replace(',', '.');
      if (Number(valor) < Number(valor_a_receber))
      {
        $("#valor_recebido").removeClass('is-valid');
        $("#valor_recebido").removeClass('is-invalid');
        $("#valor_recebido").addClass('is-invalid');
        console.log('invalid');
      }
      else
      {
        $("#valor_recebido").removeClass('is-valid');
        $("#valor_recebido").removeClass('is-invalid');
        $("#valor_recebido").addClass('is-valid');
        console.log('valid');
      }
      calculaTroco();
    }

    // Calcula desconto
    function calculaDesconto(desconto)
    {
      desconto = desconto.replace(',', '.');
      $("#valor_a_receber").val(Number(valor_original) - Number(desconto));

      // Calcula o desconto em percentual para mostrar no input de desc. percent.
      descontoPercentual = ((Number(desconto)*100) / window.valor_original).toFixed(2);

      $("#desconto_percentual").val(descontoPercentual);
    }

    // Calcula desconto em percentual
    function calculaDescontoPercentual(desconto)
    {
      desconto = desconto.replace(',', '.');
      desconto = (valor_original * desconto) / 100;
      $("#valor_a_receber").val(Number(valor_original) - Number(desconto));

      // Calcula o desconto sem ser percentual para mostrar no input de desc.
      $("#desconto").val(Number(desconto));
    }

    // Calcula o troco a ser recebido
    function calculaTroco()
    {
      // Valor a receber
      valor_a_receber = $("#valor_a_receber").val();
      valor_a_receber = valor_a_receber.replace(',', '.');
      // Valor recebido
      valor_recebido = $("#valor_recebido").val();
      valor_recebido = valor_recebido.replace(',', '.');
      // Troco
      troco = Number(valor_recebido) - Number(valor_a_receber);

      // Seta o troco no input
      $("#troco").val(troco.toFixed(2));
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
