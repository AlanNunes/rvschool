<?php
$page_name = "Mensalidades";

include('php/database/database.php');
include('php/situacoes_parcelas/SituacoesParcelas.php');
?>

<html lang="pt">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/fav.ico">
  <link rel="stylesheet" href="css/vertical-bar.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="assets/icons/open-iconic-master/font/css/open-iconic-bootstrap.css">
	<title> Mensalidades - Revolution School </title>

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<?php include('header.php'); ?>

<!--TABLE DE PARCELAS-->
<br>
<div class="container-fluid">
  <div class="table-responsive">
    <table class="table table-sm table-hover" id="tabela_parcelas" style="text-align: center; max-width: 80%">
      <thead class="thead-dark">
        <tr>
          <th scope="col">N° PARCELA</th>
          <th scope="col">SACADO</th>
          <th scope="col">DATA DE VENCIMENTO</th>
          <th scope="col">VALOR</th>
          <th scope="col">VLR. LÍQUIDO</th>
          <th scope="col">CATEGORIA</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody id="tableContent">

      </tbody>
    </table>

  </div>
</div>
<!--END TABLE DE PARCELAS-->
<!-- DIV DE LOADING -->
<div id="page-cover">
  <img src="assets/gifs/loading-icon6.gif" id="loading-gif" />
</div>
<!-- FIM DIV DE LOADING -->
<!-- MENU VERTICAL -->
<nav class="navbar-primary" id="vertical-nav-bar">
  <a href="#" class="btn-expand-collapse" id="menu-toggle"><span class="oi oi-arrow-left"></span></a>
  <ul class="navbar-primary-menu">
    <li>
      <a href="#" data-toggle="modal" data-target="#modal-parcelas" id="menu-incluir"><span class="oi oi-plus"></span></span><span class="nav-label">   Incluir</span></a>
      <a href="#"><span class="oi oi-print"></span><span class="nav-label">   Relatório</span></a>
    </li>
    <form style="padding: 5px;">
      <li><a href="#"><h5>Filtros:</h5></a></li>
      <div class="form-row">
        <div class="form-group col-sm">
          <label for="data_recebimento">Sacado:</label>
          <input type="text" id="sacado_filtro" class="form-control form-control-sm" />
        </div>
      </div>
    <div class="form-row">
      <div class="form-group col-sm">
        <label for="data_recebimento">Vencimento:</label>
        <select id="vencimento_filtro" class="form-control form-control-sm">
          <option value='1'>Janeiro</option>
          <option value='2'>Fevereiro</option>
          <option value='3'>Março</option>
          <option value='4'>Abril</option>
          <option value='5'>Maio</option>
          <option value='6'>Junho</option>
          <option value='7'>Julho</option>
          <option value='8'>Agosto</option>
          <option value='9'>Setembro</option>
          <option value='10'>Outubro</option>
          <option value='11'>Novembro</option>
          <option value='12'>Dezembro</option>
        </select>
      </div>
      <div class="form-group col-sm">
        <label for="situacoes">Situação:</label>
          <div id="situacoes">
            <?php
              $db = new DataBase();
              $conn = $db->getConnection();
              $situacao = new SituacoesParcelas($conn);
              $response = $situacao->getSituacoes();
              foreach ($response as $sit)
              {
                $id = $sit['id'];
                $nome = $sit['nome'];
                echo "<div class='form-group col-sm'>";
                echo  "<div class='custom-control custom-checkbox'>";
                echo    "<input type='checkbox' class='custom-control-input' id='{$nome}' />";
                echo    "<label class='custom-control-label' for='{$nome}'>{$nome}</label>";
                echo  "</div>";
                echo "</div>";
              }
             ?>
           </div>
      </div>
    </div>
    <button type="button" class="btn btn-primary btn-block btn-sm" style="float: right;" onclick="listParcelasByFilter()">Filtrar</button>
    </form>
  </ul>
</nav>
<!-- FIM DE MENU VERTICAL -->

<!-- MODAL DE PARCELAS -->
<div class="modal fade modal fade bd-example-modal-lg" id="modal-parcelas" tabindex="-1" role="dialog" aria-labelledby="modal-documentoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="margin-left:15%; margin-right:15%">
    <div class="modal-content" style="width:110%!important;">
      <div class="modal-header">
        <h5 class="modal-title" id="title-modal-parcelas">Revolution School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php include('mensalidades_partialView.php'); ?>
    </div>
  </div>
</div>
<!--  FIM MODAL DE PARCELAS -->

<!-- MODAL DE QUITAR PARCELAS -->
<div class="modal fade modal fade bd-example-modal-lg" id="modal-quitar" tabindex="-1" role="dialog" aria-labelledby="modal-documentoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="margin-left:15%; margin-right:15%">
    <div class="modal-content" style="width:110%!important;">
      <div class="modal-header">
        <h5 class="modal-title" id="title-modal-quitar">Revolution School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <iframe src="" id="iframe_quitar" width="800px" height="350px" style="border: 0px"></iframe>
    </div>
  </div>
</div>
<!--  FIM MODAL DE QUITAR PARCELAS -->
<?php include('footer.php'); ?>
<!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $("#buttonHumburguer").click(function(){
        $("#vertical-nav-bar").toggle();
    });
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#vertical-nav-bar").toggleClass("collapsed");
    });

    // Ao carregar a página, ativa o checkbox de Pendente
    document.getElementById('Pendente').checked = true;

    // Seleciona o mês atual, no filtro
    var d = new Date();
    var m = d.getMonth();
    document.getElementById('vencimento_filtro')[m].selected = true;
    //

    // Abre o modal de quitar parcelas
    function showQuitarParcela(id)
    {
      document.getElementById('iframe_quitar').src = 'quitarParcelas.php?id='+id;
      $('#modal-parcelas').modal('hide');
      $('#modal-quitar').modal('show');
    }

    function getSituacoes()
    {
      situacoes = [];
      if (document.getElementById('Quitada').checked)
      {
        situacoes[0] = 'Quitada';
      }
      else
      {
        situacoes[0] = '';
      }
      if (document.getElementById('Pendente').checked)
      {
        situacoes[1] = 'Pendente';
      }
      else
      {
        situacoes[1] = '';
      }
      if (document.getElementById('Cancelada').checked)
      {
        situacoes[2] = 'Cancelada';
      }
      else
      {
        situacoes[2] = '';
      }
      return situacoes;
    }

    /**
    * Lista as parcelas, utilizando filtros
    * @paremeters
    * @var from int Ponto inicial a começar a listar as parcelas
    * @var max int Máximo de itens a serem selecionados
    */
    function listParcelasByFilter()
    {
      if ($('#sacado_filtro').val() == '')
      {
        alunoNome = "";
      }
      else
      {
        alunoNome = $('#sacado_filtro').val();
      }
      var data = {
        'aluno':alunoNome,
        'mes':$('#vencimento_filtro').val(),
        'situacoes':getSituacoes()
      };
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/parcelas/controle.php",
        data: {'acao':'listParcelasByFilter', 'data':data},
        beforeSend: function () {
          showLoadingGif();
        },
        success: function(data) {
          console.log(data);
          var table = document.getElementById('tableContent');
          table.innerHTML = '';
          for(i = 0; i < data.length; i++)
          {
            var tr = document.createElement('tr');
            var numero = document.createElement('td');
            var nome = document.createElement('td');
            var dataVencimento = document.createElement('td');
            var valor = document.createElement('td');
            var valorLiquido = document.createElement('td');
            var categoria = document.createElement('td');
            numero.innerHTML = data[i].numero;
            nome.innerHTML = data[i].nome;
            dataVencimento.innerHTML = data[i].dataVencimento;
            valor.innerHTML = data[i].valor;
            valorLiquido.innerHTML = data[i].valor;
            categoria.innerHTML = data[i].categoria;
            tr.appendChild(numero);
            tr.appendChild(nome);
            tr.appendChild(dataVencimento);
            tr.appendChild(valor);
            tr.appendChild(valorLiquido);
            tr.appendChild(categoria);
            table.appendChild(tr);
          }
        },
        error: function(e)  {
          console.error(e);
        }
      });
      closeLoadingGif();
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
