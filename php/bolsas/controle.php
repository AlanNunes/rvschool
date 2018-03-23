<?php
header('Content-Type: application/json');
require_once('../database/DataBase.php');
require_once('Bolsas.php');
// echo var_dump($_POST);
if(!empty($_POST["acao"]) && isset($_POST["acao"])){
	switch ($_POST["acao"]) {
		case 'listBolsas':
			listBolsas();
			break;
        case 'createBolsas':
			createBolsas();
			break;
		
		default:
			# code...
			break;
	}
}

// Functions

function listBolsas(){
	$db = new DataBase();
	$conn = $db->getConnection();
	$bolsas = new Bolsas($conn);
	$response = $bolsas->listBolsas();

	if($response["erro"]){
		echo "Cadastre uma bolsa.";
	}else{
	    $output = array();
		foreach ($response["response"] as $row) {
		    $output[] = array("id" => $row["id"], "nome" => $row["nome"], "desconto" => $row["desconto"], "descricao" => $row["descricao"]);
		}
		header('Content-Type: application/json');
        echo json_encode($output);
	}
}

function createBolsas(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $bolsas = new Bolsas($conn);
    $response = $bolsas->createBolsas($_POST["nome"], $_POST["desconto"], $_POST["descricao"]);

    if($response["erro"]){
        echo $response["responseText"];
    }else{
        # code...
        echo $response["responseText"];
    }
}
?>