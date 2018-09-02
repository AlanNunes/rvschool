<!--
* @category   Layout Design
* @author     Gustavo Brandão <sm70plus2gmail.com>
* @copyright  2018 Dual Dev
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
			$(document).ready(function(){
        $(".identifier").slideDown("slow");
			});
</script>

<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  			<a class="navbar-brand" href="index.php"><img src="assets/imgs/logo/logo.png"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">

				<li class="dropdown">
        <a class="dropdown-toggle" id="dpd" data-toggle="dropdown" href="#">CADASTROS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li onclick="window.location='alunos.php'" id="dpdi" class="im">ALUNOS</li>
					<li onclick="window.location='funcionarios.php'" id="dpdi" class="im">FUNCIONÁRIOS</li>
					<li onclick="window.location='turmas.php'" id="dpdi" class="im">TURMAS</li>
					<li onclick="window.location='#'" id="dpdi" class="im">CURSOS</li>
        </ul>
      </li>

			<li class="dropdown">
				<a class="dropdown-toggle" id="dpd" data-toggle="dropdown" href="#">DIDÁTICO
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li onclick="window.location='diario_aulas.php'" id="dpdi" class="im">DIÁRIO DE AULAS</li>
					</ul>
				</li>

			<li class="dropdown">
			<a class="dropdown-toggle" id="dpd" data-toggle="dropdown" href="#">FINANCEIRO
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li onclick="window.location='mensalidades.php'" id="dpdi" class="im">MENSALIDADES</li>
			</ul>
		</li>


	<li class="dropdown">
	<a class="dropdown-toggle" id="dpd" data-toggle="dropdown" href="#">GERENCIAL
	<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li onclick="window.location='cadastrarContratos.php'" id="dpdi" class="im">CONTRATOS</li>
		<li onclick="window.location='#'" id="dpdi" class="im">ESTOQUE</li>
		<li onclick="window.location='parcerias.php'" id="dpdi" class="im">PARCERIAS</li>
	</ul>
	</li>


	<li class="dropdown">
		<a class="dropdown-toggle" id="dpd" data-toggle="dropdown" href="#">MÍDIAS
		<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li onclick="window.location='bolsas.php'" id="dpdi" class="im">BOLSAS</li>
				<li onclick="window.location='interessados.php'" id="dpdi" class="im">INTERESSADOS</li>
			</ul>
		</li>
			<div style="position: absolute; right:100px; bottom:20px;">
				<?php
					$image = $_SESSION['avatarPath'];
					echo "<img src='avatars/{$image}' style='border-radius: 100%; height: 60px; width: 60px;' />"
				 ?>
			</div>
			<div style="position: absolute; right:10px;">
				<li class="dropdown">
					<a class="dropdown-toggle" id="dpd" data-toggle="dropdown" href="#">PERFIL
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li onclick="window.location='logout.php'" id="dpdi" class="im">SAIR</li>
						<li onclick="window.location='perfil.php'" id="dpdi" class="im">VER PERFIL</li>
					</ul>
				</li>
			</div>
		    </ul>
		  </div>
		</nav>
	</header>

	<div class="identifier">
		<h1 style="font-size: 25px;"><?php echo $page_name ?></h1>
	</div>
