<?php
/**
 * This file is the controller of the Class Bolsas.
 *
 * Data are received in this file from the view bolsas.html and validated here.
 * It's data is sent to the Class Bolsas and then catch the response of the request and return it to the view.
 *
 * @category   CategoryName
 * @author     Luan Nunes da Silva <lunanunesrpg@gmail.com>
 * @copyright  2018 Dual Dev
 */
header('Content-Type: application/json');
require_once('../database/DataBase.php');
include_once('../validation/Validation.php');
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
    $data = getBolsaData();
    $dataSize = sizeof($data);
    $requiredFields = array(
        "nome",
        "descricao",
        "desconto"
    );

    $requiredAmount = sizeof($requiredFields);
    $i = 0;
    $invalidFields = array();

    for($i;$i < $requiredAmount;$i++) {
        $index = $requiredFields[$i];
        if(empty($data[$index]) || !isset($data[$index])) {
            array_push($invalidFields, $index);
        }
    }

    if(!(int)$data["fixa"] && (empty($data["dataInicio"]) || !isset($data["dataInicio"]))){
        array_push($invalidFields, "dataInicio");
    }

    if(!(int)$data["fixa"] && (empty($data["dataTermino"]) || !isset($data["dataTermino"]))){
            array_push($invalidFields, "dataTermino");
        }

    $erro = (empty($invalidFields)) ? false : true;

    if($erro) {
        $response = array("erro" => $erro, "invalidFields" => $invalidFields);
        echo json_encode($response);
    }
    else {
        $db = new DataBase();
        $conn = $db->getConnection();
        $bolsa = new Bolsas($conn);
        $response = $bolsa->createBolsa($data);

        echo json_encode($response);
    }
}

function updateBolsa(){
    $data = getBolsaData();
    $data["id"] = safe_data($_POST["id"]);
    $dataSize = sizeof($data);
    $requiredFields = array(
        "nome",
        "descricao",
        "desconto"
    );

    $requiredAmount = sizeof($requiredFields);
    $i = 0;
    $invalidFields = array();

    for($i;$i < $requiredAmount;$i++) {
        $index = $requiredFields[$i];
        if(empty($data[$index]) || !isset($data[$index])) {
            array_push($invalidFields, $index);
        }
    }

    if(!(int)$data["fixa"] && (empty($data["dataInicio"]) || !isset($data["dataInicio"]))){
        array_push($invalidFields, "dataInicio");
    }

    if(!(int)$data["fixa"] && (empty($data["dataTermino"]) || !isset($data["dataTermino"]))){
        array_push($invalidFields, "dataTermino");
    }

    $erro = (empty($invalidFields)) ? false : true;

    if($erro) {
        $response = array("erro" => $erro, "invalidFields" => $invalidFields);
        echo json_encode($response);
    }
    else {
        $db = new DataBase();
        $conn = $db->getConnection();
        $bolsa = new Bolsas($conn);
        $response = $bolsa->updateBolsa($data);

        echo json_encode($response);
    }
}

function deleteBolsa(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $bolsas = new Bolsas($conn);
    $response = $bolsas->deleteBolsa($_POST["id"]);
    echo json_encode($response);
}

function getBolsaData(){
    return array(
        "nome" => safe_data($_POST["nome"]),
        "descricao" => safe_data($_POST["descricao"]),
        "desconto" => safe_data($_POST["desconto"]),
        "fixa" => safe_data($_POST["fixa"]),
        "dataInicio" => safe_data($_POST["dataInicio"]),
        "dataTermino" => safe_data($_POST["dataTermino"])
    );
}
?>
