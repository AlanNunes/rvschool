<?php
include_once('../validation/Validation.php');
include_once('Funcionarios.php');
include_once('../database/DataBase.php');

// echo var_dump($_POST);
if(!empty($_POST["acao"]) && isset($_POST["acao"])){
	switch ($_POST["acao"]) {
	    case 'listFuncionarios':
	        listFuncionarios();
	        break;
		case 'createFuncionario':
			createFuncionario();
			break;
		
		default:
			# code...
			break;
	}
}

function listFuncionarios(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $funcionario = new Funcionarios($conn);
    $response = $funcionario->listFuncionario();

    if($response["erro"]){
        // echo "Cadastre uma turma.";
        echo json_encode(array());
    }else{
        $output = array();
        foreach ($response["response"] as $row) {
            $funcionario = array();
            if(is_array($row) || is_object($row)){
                foreach($row as $key => $value) {
                    $funcionario[$key] = $value;
                }
                $output[] = $funcionario;
            }
        }
        header('Content-Type: application/json');
        echo json_encode($output);
    }
}

function createFuncionario(){
    $data = array(
        "nome" => $_POST["nome"],
        "rg" => $_POST["rg"],
        "cpf" => $_POST["cpf"],
        "dataNascimento" => $_POST["dataNascimento"],
        "estadoCivil" => $_POST["estadoCivil"],
        "sexo" => $_POST["sexo"],
        "cargo" => $_POST["cargo"],
        "cidadeNatal" => $_POST["cidadeNatal"],
        "cep" => $_POST["cep"],
        "logradouro" => $_POST["logradouro"],
        "numero" => $_POST["numero"],
        "complemento" => $_POST["complemento"],
        "cidade" => $_POST["cidade"],
        "bairro" => $_POST["bairro"],
        "email" => $_POST["email"],
        "telefone" => $_POST["telefone"],
        "celular" => $_POST["celular"],
        "tipoPagamento" => $_POST["tipoPagamento"],
        "carteiraProfissional" => $_POST["carteiraProfissional"],
        "inss" => $_POST["inss"],
        "percentualInss" => $_POST["percentualInss"],
        "dataAdmissao" => $_POST["dataAdmissao"],
        "ccm" => $_POST["ccm"],
        "percentualIss" => $_POST["percentualIss"],
        "dataDemissao" => $_POST["dataDemissao"],
        "aulaInterna" => $_POST["aulaInterna"],
        "aulaExterna" => $_POST["aulaExterna"],
        "salarioMensal" => $_POST["salarioMensal"],
        "banco" => $_POST["banco"],
        "agencia" => $_POST["agencia"],
        "conta" => $_POST["conta"],
        "codigoBanco" => $_POST["codigoBanco"],
        "observacoes" => $_POST["observacoes"],
        "anexo" => $_POST["anexo"]
    );

    $dataSize = sizeof($data);
    $requiredFields = array(
        "nome",
        "rg",
        "cpf",
        "dataNascimento",
        "estadoCivil",
        "sexo",
        "cargo",
        "cidadeNatal",
        "cep",
        "logradouro",
        "numero",
        "cidade",
        "bairro",
        "email",
        "tipoPagamento",
        "carteiraProfissional",
        "inss",
        "percentualInss",
        "dataAdmissao",
        "ccm",
        "percentualIss",
        "banco",
        "agencia",
        "conta",
        "codigoBanco"
    );
    $canBeNullFields = array(
        "complemento",
        "telefone",
        "celular",
        "dataDemissao",
        "aulaInterna",
        "aulaExterna",
        "salarioMensal",
        "observacoes",
        "anexo"
    );

    if(!empty($data["celular"]) && isset($data["celular"])) {
        array_push($requiredFields, "celular");
    }
    else {
        array_push($requiredFields, "telefone");
    }

    if($data["tipoPagamento"] == "horista") {
        array_push($requiredFields, "aulaInterna");
        array_push($requiredFields, "aulaExterna");
        $data["salarioMensal"] = "null";
    }
    else if($data["tipoPagamento"]){
        array_push($requiredFields, "salarioMensal");
        $data["aulaInterna"] = "null";
        $data["aulaExterna"] = "null";
    }

    $requiredAmount = sizeof($requiredFields);
    $i = 0;
    $invalidFields = array();
    for($i;$i < $requiredAmount;$i++){
        $index = $requiredFields[$i];
        if(empty($data[$index])|| !isset($data[$index])){
            array_push($invalidFields, $index);
        }
    }

    if(validate_cpf($data["cpf"])){
        array_push($invalidFields, "cpf");
    }
    //if(validate_data($data["dataNascimento"])){
    //    array_push($invalidFields, "dataNascimento");
    //}
    if(validate_cep($data["cep"])){
        array_push($invalidFields, "cep");
    }
    if(validate_email($data["email"])){
        array_push($invalidFields, "email");
    }
    if(validate_telefone($data["telefone"]) && $data['telefone'] != ""){
        array_push($invalidFields, "telefone");
    }
    if(validate_celular($data["celular"]) && $data['celular'] != ""){
        array_push($invalidFields, "celular");
    }
    //if(validate_data($data["dataAdmissao"])){
    //    array_push($invalidFields, "dataAdmissao");
    //}
    //if(validate_data($data["dataDemissao"]) && $data["dataDemissao"] != ""){
    //    array_push($invalidFields, "dataDemissao");
    //}

    $i = 0;
    for($i;$i < sizeof($canBeNullFields);$i++){
        $index = $canBeNullFields[$i];
        if(empty($data[$index]) || !isset($data[$index])) {
            $data[$index] = "null";
        }
    }

    $erro = (empty($invalidFields)) ? false : true;

    if($erro){
        $response = array("erro" => $erro, "invalidFields" => $invalidFields);
        echo json_encode($response);
    }
    else {
        $db = new DataBase();
        $conn = $db->getConnection();
        $funcionario = new Funcionarios($conn);
        $response = $funcionario->createFuncionario($data);
        echo json_encode($response);
    }

}
?>