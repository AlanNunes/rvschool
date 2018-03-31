<?php
require_once('../database/DataBase.php');
// echo var_dump($_POST);
if(!empty($_POST["acao"]) && isset($_POST["acao"])){
	switch ($_POST["acao"]) {
		case 'createFuncionario':
			createFuncionario();
			break;
		
		default:
			# code...
			break;
	}
}

function createFuncionario(){
    # code...
}
?>