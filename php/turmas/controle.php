<?php
header('Content-Type: application/json');
require_once('../database/DataBase.php');
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

function getTurma() {
    $db = new DataBase();
    $conn = $db->getConnection();
    $turmas = new Turmas($conn);
    $response = $turmas->getTurma($_POST["id"]);

    if($response["erro"]) {
        echo "404 Turma não encontrada.";
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

function createTurma(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $turmas = new Turmas($conn);
    $response = $turmas->createTurma($_POST["nome"], $_POST["desconto"], $_POST["descricao"], $_POST["fixa"], $_POST["dataInicio"], $_POST["dataTermino"]);

    if($response["erro"]){
        echo $response["responseText"];
    }else{
        echo $response["responseText"];
    }
}

function deleteTurma(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $turmas = new Turmas($conn);
    $response = $turmas->deleteTurma($_POST["id"]);
    if($response["erro"]){
        echo $reponse["responseText"];
    }else{
        echo $response["responseText"];
    }
}
?>