<?php
/**
 * This file is the controller of the Class Turmas.
 *
 * Data are received in this file from the view turmas.html and validated here.
 * It's data is sent to the Class Turmas and then catch the response of the request and return it to the view.
 *
 * @category   CategoryName
 * @author     Luan Nunes da Silva <lunanunesrpg@gmail.com>
 * @copyright  2018 Dual Dev
 */
header('Content-Type: application/json');
require_once('../database/DataBase.php');
include_once('../validation/Validation.php');
require_once('Turmas.php');
// echo var_dump($_POST);
if(!empty($_POST["acao"]) && isset($_POST["acao"])){
	switch ($_POST["acao"]) {
		case 'listTurmas':
			listTurmas();
			break;
        case 'getTurma':
            getTurma();
            break;
        case 'createTurma':
			createTurma();
			break;
        case 'deleteTurma':
            deleteTurma();
            break;
        case 'updateTurma':
            updateTurma();
            break;

		default:
			# code...
			break;
	}
}

// Functions

function listTurmas(){
	$db = new DataBase();
	$conn = $db->getConnection();
	$turmas = new Turmas($conn);
	$response = $turmas->listTurmas();

	if($response["erro"]){
		// echo "Cadastre uma turma.";
		echo json_encode(array());
	}else{
	    $output = array();
		foreach ($response["response"] as $row) {
		    $turma = array();
		    $timeZone = new DateTimeZone("America/Sao_Paulo");
		    $now = new DateTime("now", $timeZone);
		    $dateTimeInicio = new DateTime($row["dataInicio"], $timeZone);
		    $dateTimeTermino = new DateTime($row["dataTermino"], $timeZone);
		    foreach($row as $key => $value) {
		        $turma[$key] = $value;
		    }

		    if($now < $dateTimeInicio){
		        $turma["validade"] = "Em espera";
		        $turma["validadeClass"] = "itemWaiting";
		    }
		    else if($now > $dateTimeInicio && $now < $dateTimeTermino) {
		        $turma["validade"] = "Em vigor";
		        $turma["validadeClass"] = "itemActive";
		    }
		    else if($now > $dateTimeTermino) {
		        $turma["validade"] = "Expirada";
		        $turma["validadeClass"] = "itemExpired";
		    }
		    $output[] = $turma;
		}
		header('Content-Type: application/json');
        echo json_encode($output);
	}
}
// There was an error in this method
// function getTurma() {
//     $db = new DataBase();
//     $conn = $db->getConnection();
//     $turmas = new Turmas($conn);
//     $response = $turmas->getTurma($_POST["id"]);
//
//     if($response["erro"]) {
//         echo "404 Turma não encontrada.";
//     }
//     else {
//         header('Content-Type: application/json');
//         foreach($response["response"] as $row) {
//             $output = array();
//             foreach($row as $key => $value){
//                 $output[$key] = $value;
//             }
//             echo json_encode($output);
//         }
//     }
// }

function getTurma() {
    $db = new DataBase();
    $conn = $db->getConnection();
    $turmas = new Turmas($conn);
    $response = $turmas->getTurma($_POST["id"]);

    if($response["erro"]) {
        echo "404 Turma não encontrada.";
    }
    else {
        // header('Content-Type: application/json');
				echo json_encode($response["response"]);
    }
}

function createTurma(){
    $data = getTurmasData();
    $dataSize = sizeof($data);
    $requiredFields = array(
        "nome",
        "sala",
        "duracaoAula",
        "horario",
        "minimoAlunos",
        "dataInicio",
        "dataTermino",
        "estagio",
        "curso"
    );
    /*$timeZone = new DateTimeZone("America/Sao_Paulo");
    $now = new DateTime("now", $timeZone);
    $dateTimeInicio = new DateTime($dataInicio, $timeZone);
    $dateTimeTermino = new DateTime($dataTermino, $timeZone);*/

    $requiredAmount = sizeof($requiredFields);
    $i = 0;
    $invalidFields = array();

    for($i;$i < $requiredAmount;$i++) {
        $index = $requiredFields[$i];
        if(empty($data[$index]) || !isset($data[$index])) {
            array_push($invalidFields, $index);
        }
    }

    if(!isset($data["situacao"]) && is_nan((int)$data["situacao"])) {
        array_push($invalidFields, "situacao");
    }

    $erro = (empty($invalidFields)) ? false : true;

    if($erro) {
        $response = array("erro" => $erro, "invalidFields" => $invalidFields);
        echo json_encode($response);
    }
    else {
        $db = new DataBase();
        $conn = $db->getConnection();
        $turmas = new Turmas($conn);
        $response = $turmas->createTurma($data);

        echo json_encode($response);
    }
}

function deleteTurma(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $turmas = new Turmas($conn);
    $response = $turmas->deleteTurma($_POST["id"]);
    echo json_encode($response);
}

function updateTurma(){
    $data = getTurmasData();
    $data["id"] = safe_data($_POST["id"]);
    $dataSize = sizeof($data);
    $requiredFields = array(
        "nome",
        "sala",
        "duracaoAula",
        "horario",
        "minimoAlunos",
        "dataInicio",
        "dataTermino",
        "estagio",
        "curso"
    );
    /*$timeZone = new DateTimeZone("America/Sao_Paulo");
    $now = new DateTime("now", $timeZone);
    $dateTimeInicio = new DateTime($dataInicio, $timeZone);
    $dateTimeTermino = new DateTime($dataTermino, $timeZone);*/

    $requiredAmount = sizeof($requiredFields);
    $i = 0;
    $invalidFields = array();

    for($i;$i < $requiredAmount;$i++) {
        $index = $requiredFields[$i];
        if(empty($data[$index]) || !isset($data[$index])) {
            array_push($invalidFields, $index);
        }
    }

    if(!isset($data["situacao"]) && is_nan((int)$data["situacao"])) {
        array_push($invalidFields, "situacao");
    }

    $erro = (empty($invalidFields)) ? false : true;

    if($erro) {
        $response = array("erro" => $erro, "invalidFields" => $invalidFields);
        echo json_encode($response);
    }
    else {
        $db = new DataBase();
        $conn = $db->getConnection();
        $turmas = new Turmas($conn);
        $response = $turmas->updateTurma($data);

        echo json_encode($response);
    }
}

function getTurmasData(){
    return array(
        "nome" => safe_data($_POST["nome"]),
        "situacao" => safe_data($_POST["situacao"]),
        "professor" => safe_data($_POST["professor"]),
        "estagio" => safe_data($_POST["estagio"]),
        "curso" => safe_data($_POST["curso"]),
        "horario" => safe_data($_POST["horario"]),
        "minimoAlunos" => safe_data($_POST["minimoAlunos"]),
        "sala" => safe_data($_POST["sala"]),
        "duracaoAula" => safe_data($_POST["duracaoAula"]),
        "dataInicio" => safe_data($_POST["dataInicio"]),
        "dataTermino" => safe_data($_POST["dataTermino"])
    );
}
?>
