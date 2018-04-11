<?php
/**
 * This file is the controller of the Class Parcerias.
 *
 * Data are received in this file from the view parcerias.html and validated here.
 * It's data is sent to the Class Parcerias and then catch the response of the request and return it to the view.
 *
 * @category   CategoryName
 * @author     Luan Nunes da Silva <lunanunesrpg@gmail.com>
 * @copyright  2018 Dual Dev
 */
header('Content-Type: application/json');
require_once('../database/DataBase.php');
include_once('../validation/Validation.php');
require_once('parcerias.php');
// echo var_dump($_POST);
if(!empty($_POST["acao"]) && isset($_POST["acao"])){
	switch ($_POST["acao"]) {
		case 'listParcerias':
			listParcerias();
			break;
        case 'getParceria':
            getParceria();
            break;
        case 'createParceria':
			createParceria();
			break;
        case 'deleteParceria':
            deleteParceria();
            break;
        case 'updateParceria':
            updateParceria();
            break;
		
		default:
			# code...
			break;
	}
}

// Functions

function listParcerias(){
	$db = new DataBase();
	$conn = $db->getConnection();
	$parceria = new Parcerias($conn);
	$response = $parceria->listParcerias();

	if($response["erro"]){
		// echo "Cadastre uma parceria.";
		echo json_encode(array());
	}else{
	    $output = array();
		foreach ($response["response"] as $row) {
		    $parceria = array();
		    foreach($row as $key => $value) {
		        $parceria[$key] = $value;
		    }
		    $output[] = $parceria;
		}
		header('Content-Type: application/json');
        echo json_encode($output);
	}
}

function getParceria() {
    $db = new DataBase();
    $conn = $db->getConnection();
    $parceria = new Parcerias($conn);
    $response = $parceria->getParceria($_POST["id"]);

    if($response["erro"]) {
        echo "404 Parceria não encontrada.";
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

function createParceria(){
    $data = getParceriasData();
    $dataSize = sizeof($data);
    $requiredFields = array(
        "nome"
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

    $erro = (empty($invalidFields)) ? false : true;

    if($erro) {
        $response = array("erro" => $erro, "invalidFields" => $invalidFields);
        echo json_encode($response);
    }
    else {
        $db = new DataBase();
        $conn = $db->getConnection();
        $parceria = new Parcerias($conn);
        $response = $parceria->createParceria($data);

        echo json_encode($response);
    }
}

function deleteParceria(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $parceria = new Parcerias($conn);
    $response = $parceria->deleteParceria($_POST["id"]);
    echo json_encode($response);
}

function updateParceria(){
    $data = getParceriasData();
    $data["id"] = safe_data($_POST["id"]);
    $dataSize = sizeof($data);
    $requiredFields = array(
        "nome"
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

    $erro = (empty($invalidFields)) ? false : true;

    if($erro) {
        $response = array("erro" => $erro, "invalidFields" => $invalidFields);
        echo json_encode($response);
    }
    else {
        $db = new DataBase();
        $conn = $db->getConnection();
        $parceria = new Parcerias($conn);
        $response = $parceria->updateParceria($data);

        echo json_encode($response);
    }
}

function getParceriasData(){
    return array(
        "nome" => safe_data($_POST["nome"]),
        "descontoMatricula" => safe_data($_POST["descontoMatricula"]),
        "descontoMensalidade" => safe_data($_POST["descontoMensalidade"]),
        "descricao" => safe_data($_POST["descricao"])
    );
}
?>