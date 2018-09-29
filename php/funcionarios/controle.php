<?php
include_once('../validation/Validation.php');
include_once('../login/Usuarios.php');
include_once('../roles/RoleUsuarios.php');
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
        case 'updateFuncionario':
            updateFuncionario();
            break;
        case 'deleteFuncionario':
            deleteFuncionario();
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
    $data = getFuncionariosData();

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
        "dataDemissao",
        "aulaInterna",
        "aulaExterna",
        "salarioMensal",
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
        if(!$response['erro']){
            $usuario = new Usuarios($conn);
						$senhaStr = str_replace('.', '', $data['cpf']);
						$senhaStr = str_replace('-', '', $data['cpf']);
            $senha = hash('sha256', $senhaStr);
            $usuarioId = $usuario->registerUser($response['matricula'], $senha, 'f');
            if($usuarioId){
								$RolesUsuarios = new RoleUsuarios($conn);
								$RolesUsuarios->UsuarioId = $usuarioId;
								$RolesUsuarios->RoleId = $data['cargo'];
								if($RolesUsuarios->Add()){
									echo json_encode(array('erro' => false, 'Description' =>
									"Funcionário registrado com sucesso."));
								}else {
									echo json_encode(array('erro' => true, 'Description' =>
	            "O funcionário foi registrado porém os acessos dele aos módulos
							falhou."));
								}
            }else{
                echo json_encode(array('erro' => true, 'Description' =>
            "O login do funcionário não foi gerado."));
            }
        }else{
            echo json_encode(array('erro' => true, 'Description' =>
            "Funcionário não registrado."));
        }
    }
}

function updateFuncionario(){
    $data = getFuncionariosData();
    $data["id"] = safe_data($_POST["id"]);

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
        "dataDemissao",
        "aulaInterna",
        "aulaExterna",
        "salarioMensal",
				"avatarPath"
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
				$RolesUsuarios = new RoleUsuarios($conn);
				$Usuarios = new Usuarios($conn);
				if($data['avatarPath'] == "null" || $data['avatarPath'] == null){
					$data['avatarPath'] = 'default.png';
				}
        $response = $funcionario->updateFuncionario($data);
				if($response['erro'] == false)
				{
					$matricula = $funcionario->getFuncionarioMatriculaById($data['id']);
					$usuarioId = $Usuarios->GetUsuarioIdByMatricula($matricula);
					if($RolesUsuarios->DeleteAllByUsuarioId($usuarioId))
					{
						$RolesUsuarios->UsuarioId = $usuarioId;
						// cargo = roleId
						$RolesUsuarios->RoleId = $data['cargo'];
						if($RolesUsuarios->Add()){
							echo json_encode(array('erro' => false, 'description' => 'Funcionário atualizado com sucesso'));
						}else{
							echo json_encode(array('erro' => true, 'description' => 'Não foi possível atribuir papéis a este usuário.'));
						}
					}else{
						echo json_encode(array('erro' => true, 'description' => 'Não foi possível atualizar os acessos a este usuário.'));
					}
				}
				else
				{
					echo json_encode(array('erro' => true, 'description' => $response['description']));
				}
    }
}

function deleteFuncionario(){
    $db = new DataBase();
    $conn = $db->getConnection();
    $funcionario = new Funcionarios($conn);
    $usuario = new Usuarios($conn);
    $matricula = $funcionario->getFuncionarioMatriculaById($_POST["id"]);
    $response = $funcionario->deleteFuncionario($_POST["id"]);
    $usuario->deleteByMatricula($matricula);
    if($response["erro"]){
        echo json_encode($response);
    }else{
        echo json_encode($response);
    }
}

function getFuncionariosData() {
    return array(
       "nome" => safe_data($_POST["nome"]),
       "rg" => safe_data($_POST["rg"]),
       "cpf" => safe_data($_POST["cpf"]),
       "dataNascimento" => safe_data($_POST["dataNascimento"]),
       "estadoCivil" => safe_data($_POST["estadoCivil"]),
       "sexo" => safe_data($_POST["sexo"]),
       "cargo" => safe_data($_POST["cargo"]),
       "cidadeNatal" => safe_data($_POST["cidadeNatal"]),
       "cep" => safe_data($_POST["cep"]),
       "logradouro" => safe_data($_POST["logradouro"]),
       "numero" => safe_data($_POST["numero"]),
       "complemento" => safe_data($_POST["complemento"]),
       "cidade" => safe_data($_POST["cidade"]),
       "bairro" => safe_data($_POST["bairro"]),
       "email" => safe_data($_POST["email"]),
       "telefone" => safe_data($_POST["telefone"]),
       "celular" => safe_data($_POST["celular"]),
       "tipoPagamento" => safe_data($_POST["tipoPagamento"]),
       "carteiraProfissional" => safe_data($_POST["carteiraProfissional"]),
       "inss" => safe_data($_POST["inss"]),
       "percentualInss" => safe_data($_POST["percentualInss"]),
       "dataAdmissao" => safe_data($_POST["dataAdmissao"]),
       "ccm" => safe_data($_POST["ccm"]),
       "percentualIss" => safe_data($_POST["percentualIss"]),
       "dataDemissao" => safe_data($_POST["dataDemissao"]),
       "aulaInterna" => safe_data($_POST["aulaInterna"]),
       "aulaExterna" => safe_data($_POST["aulaExterna"]),
       "salarioMensal" => safe_data($_POST["salarioMensal"]),
       "banco" => safe_data($_POST["banco"]),
       "agencia" => safe_data($_POST["agencia"]),
       "conta" => safe_data($_POST["conta"]),
       "codigoBanco" => safe_data($_POST["codigoBanco"]),
       "observacoes" => safe_data($_POST["observacoes"]),
       "anexo" => safe_data($_POST["anexo"]),
			 "avatarPath" => safe_data($_POST["avatarPath"])
   );
}
?>
