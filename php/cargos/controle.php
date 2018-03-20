<?php
header('Content-Type: application/json');
require_once('../database/DataBase.php');
require_once('Cargos.php');
// echo var_dump($_POST);
if(!empty($_POST["acao"]) && isset($_POST["acao"])){
	switch ($_POST["acao"]) {
		case 'listCargos':
			listCargos();
			break;
		
		default:
			# code...
			break;
	}
}

// Functions

function listCargos(){
	$db = new DataBase();
	$conn = $db->getConnection();
	$cargos = new Cargos($conn);
	$response = $cargos->listCargos();

	if($response["erro"]){
		echo "Cadastre um cargo.";
	}else{
		foreach ($response["response"] as $row) {
			$id = $row["cargoId"];
			$nome = $row["cargoNome"];
			echo "<option value='".$id."'>".$nome."</option>";
		}
	}
}
?>