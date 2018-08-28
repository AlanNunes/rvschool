<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<link rel="shortcut icon" type="image/x-icon" href="assets/imgs/logo/fav.ico">
	<title> Home Page - Revolution School </title>

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <!--Pulling Awesome Font -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="back">


<div class="div-center">


  <div class="content">


    <h3>Login</h3>
    <hr />
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Matrícula</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <span class="group-btn">
        <a href="#" class="btnlogin" onclick="logar()">Acessar <i class="fa fa-sign-in"></i></a>
      </span>
      <hr />
      <span class="group-btn">
        <a href="#" class="btnlogin">Esqueci minha Senha <i class="fa fa-sign-in"></i></a>
      </span>
    </form>

  </div>


  </span>
</div>
</body>
<?php include('footer.php') ?>
<!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    function logar(){
        var login = $("#login").val();
        var senha = $("#senha").val();
    }
    </script>
</html>
