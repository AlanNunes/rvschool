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
        case 'getBolsa':
            getBolsa();
            break;
        case 'createBolsa':
			createBolsa();
			break;
        case 'deleteBolsa':
            deleteBolsa();
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

function getBolsa() {
    $db = new DataBase();
    $conn = $db->getConnection();
    $bolsas = new Bolsas($conn);
    $response = $bolsas->getBolsa($_POST["id"]);

    if($response["erro"]) {
        echo "404 Bolsa não encontrada.";
    }
    else {
        header('Content-Type: application/json');
        foreach($response["response"] as $row) {
            $output = array();
            foreach($row as $key => $value){
                $output[$key] = $value;
            }
            echo json_encode($output);
        }
    }
}

function createBolsa(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $bolsas = new Bolsas($conn);
    $response = $bolsas->createBolsa($_POST["nome"], $_POST["desconto"], $_POST["descricao"]);

    if($response["erro"]){
        echo $response["responseText"];
    }else{
        echo $response["responseText"];
    }
}

function deleteBolsa(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $bolsas = new Bolsas($conn);
    $response = $bolsas->deleteBolsa($_POST["id"]);
    if($response["erro"]){
        echo $reponse["responseText"];
    }else{
        echo $response["responseText"];
    }
}
?>