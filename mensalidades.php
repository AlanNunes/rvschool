<?php $page_name = "Mensalidades"; ?>

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
    <table class="table table-hover" style="text-align: center; max-width: 90%">
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
      <!-- <div class="modal-body" id="content-modal-parcelas"> -->
        <!-- <iframe src="" id="iframe-modal-parcelas" width="100%" height="100%"></iframe> -->
        <?php include('mensalidades_partialView.php'); ?>
      <!-- </div> -->
      <!-- <div class="modal-footer" id="footer-modal-parcelas">
        <button type="button" id="btn-imprimir-parcelas" class="form-control btn btn-primary">Imprimir</button>
        <button type="button" class="form-control btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div> -->
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

    // Abre o modal de quitar parcelas
    function showQuitarParcela(id)
    {
      document.getElementById('iframe_quitar').src = 'quitarParcelas.php?id='+id;
      $('#modal-parcelas').modal('hide');
      $('#modal-quitar').modal('show');
    }
    </script>
</html>
