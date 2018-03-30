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
        case 'updateBolsa':
            updateBolsa();
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
		// echo "Cadastre uma bolsa.";
		echo json_encode(array());
	}else{
	    $output = array();
		foreach ($response["response"] as $row) {
		    $bolsa = array();
		    $timeZone = new DateTimeZone("America/Sao_Paulo");
		    $now = new DateTime("now", $timeZone);
		    $dateTimeInicio = new DateTime($row["dataInicio"], $timeZone);
		    $dateTimeTermino = new DateTime($row["dataTermino"], $timeZone);
		    foreach($row as $key => $value) {
		        $bolsa[$key] = $value;
		    }

		    if($now < $dateTimeInicio){
		        $bolsa["validade"] = "Em espera";
		        $bolsa["validadeClass"] = "itemWaiting";
		    }
		    else if($now > $dateTimeInicio && $now < $dateTimeTermino) {
		        $bolsa["validade"] = "Em vigor";
		        $bolsa["validadeClass"] = "itemActive";
		    }
		    else if($now > $dateTimeTermino) {
		        $bolsa["validade"] = "Expirada";
		        $bolsa["validadeClass"] = "itemExpired";
		    }
		    $output[] = $bolsa;
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
    $response = $bolsas->createBolsa($_POST["nome"], $_POST["desconto"], $_POST["descricao"], $_POST["fixa"], $_POST["dataInicio"], $_POST["dataTermino"]);

    if($response["erro"]){
        echo $response["responseText"];
    }else{
        echo $response["responseText"];
    }
}

function updateBolsa(){
    $db = new DataBase();
        $conn = $db->getConnection();
        $bolsas = new Bolsas($conn);
        $bolsa = $bolsas->getBolsa($_POST["id"]);
        $response = $bolsas->updateBolsa($_POST["id"], $_POST["nome"], $_POST["desconto"], $_POST["descricao"],
         $_POST["fixa"], $_POST["dataInicio"], $_POST["dataTermino"], $bolsa["response"]);

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