<?php
Class Funcionarios {
	public $nome;
	public $RG;
	public $CPF;
	public $dataNasc;
	public $estadoCivil;
	public $sexo;
	public $cargo;
	public $cidadeNatal;
	public $CEP;
	public $logradouro;
	public $numeroRua;
	public $complemento;
	public $cidade;
	public $bairro;
	public $email;
	public $telefone;
	public $celular;
	public $tipoPagamento;
	public $carteiraProfissional;
	public $INSS;
	public $percentualINSS;
	public $CCM;
	public $percentualISS;
	public $dataAdimissao;
	public $dataDemissao;
	public $aulaInterna; // valor que ele ganha por aula interna
	public $aulaExterna; // iden externa
	public $salarioMensal; // caso o funcionário não ganhe por hora, é então assalariado
	public $banco;
	public $agencia;
	public $conta;
	public $codigoBanco;
	public $observacoes;
	public $anexo;
	public $avatarPath;
	private $conn;

	public function __construct($conn){
	    $this->conn = $conn;
	}

	//get all employees
	public function listFuncionario(){
	    $query = "SELECT * FROM funcionarios";
	    $result = $this->conn->query($query);

	    if($result->num_rows > 0) {
	        while($row = $result->fetch_assoc()){
	            $response[] = $row;
	        }
	    }
	    else {
	        return array("erro" => true);
	    }
	    return array("erro" => false, "response" => $response);
	}

	//function to register employee
	public function createFuncionario($data){
	    $this->nome = $data["nome"];
	    $this->rg = $data["rg"];
	    $this->cpf = $data["cpf"];
	    $this->dataNascimento = $data["dataNascimento"];
	    $this->estadoCivil = $data["estadoCivil"];
	    $this->sexo = $data["sexo"];
	    $this->cargo = $data["cargo"];
	    $this->cidadeNatal = $data["cidadeNatal"];
	    $this->cep = $data["cep"];
	    $this->logradouro = $data["logradouro"];
	    $this->numero = $data["numero"];
	    $this->complemento = $data["complemento"];
	    $this->cidade = $data["cidade"];
	    $this->bairro = $data["bairro"];
	    $this->email = $data["email"];
	    $this->telefone = $data["telefone"];
	    $this->celular = $data["celular"];
	    $this->tipoPagamento = $data["tipoPagamento"];
	    $this->carteiraProfissional = $data["carteiraProfissional"];
	    $this->inss = $data["inss"];
	    $this->percentualInss = $data["percentualInss"];
	    $this->dataAdmissao = $data["dataAdmissao"];
	    $this->ccm = $data["ccm"];
	    $this->percentualIss = $data["percentualIss"];
	    $this->dataDemissao = $data["dataDemissao"];
	    $this->aulaInterna = $data["aulaInterna"];
	    $this->aulaExterna = $data["aulaExterna"];
	    $this->salarioMensal = $data["salarioMensal"];
	    $this->banco = $data["banco"];
	    $this->agencia = $data["agencia"];
	    $this->conta = $data["conta"];
	    $this->codigoBanco = $data["codigoBanco"];
	    $this->observacoes = $data["observacoes"];
	    $this->anexo = $data["anexo"];
			$this->avatarPath = $data['avatarPath'];

	    $dataDemissaoString = $this->dataDemissao === "null" ? "null" : "'" . $this->dataDemissao . "'";

	    $query = "INSERT INTO funcionarios (nome, rg, cpf, dataNascimento, estadoCivil, sexo, cargo, cidadeNatal, cep,
	     logradouro, numero, complemento, cidade, bairro, email, telefone, celular, tipoPagamento, carteiraProfissional,
	     inss, percentualInss, dataAdmissao, ccm, percentualIss, dataDemissao, aulaInterna, aulaExterna, salarioMensal,
	     banco, agencia, conta, codigoBanco, observacoes, anexo, avatarPath) VALUES ('". $this->nome ."', '". $this->rg ."', '". $this->cpf ."',
	     '". $this->dataNascimento ."', '". $this->estadoCivil ."', '". $this->sexo ."', '". $this->cargo ."', '". $this->cidadeNatal ."',
	     '". $this->cep ."', '". $this->logradouro ."', ". $this->numero .", '". $this->complemento ."', '". $this->cidade ."',
	     '". $this->bairro ."', '". $this->email ."', '". $this->telefone ."', '". $this->celular ."', '". $this->tipoPagamento ."',
	     '". $this->carteiraProfissional ."', '". $this->inss ."', ". $this->percentualInss .", '". $this->dataAdmissao ."',
	     '". $this->ccm ."', ". $this->percentualIss .", ". $dataDemissaoString .", ". $this->aulaInterna .",
	     ". $this->aulaExterna .", ". $this->salarioMensal .", '". $this->banco ."', '". $this->agencia ."', '". $this->conta ."',
	     '". $this->codigoBanco ."', '" . $this->observacoes . "', '". $this->anexo ."', '{$this->avatarPath}')";

	     $response = $this->conn->query($query);
	     if($response){
				 // Generate a enrol number for the student
	       $year = date('Y');
	       $last_id = $this->conn->insert_id;
	       // Unite the current year with the identification of the user
	       $enrol = $year . '-' . $last_id;
	       $enrolSQL = "UPDATE funcionarios SET matricula = '{$enrol}' WHERE id = {$last_id} LIMIT 1";
	       // Set a enrol number to the student
	       if($this->conn->query($enrolSQL)){
	           return array("erro" => false, "Description" => "Funcionário registrado com sucesso.", "matricula" => $enrol);
	       }else{
					 return array("erro" => true, "Description" => "Funcionário registrado porém a matrícula não foi gerada.");
				 }
	       $this->conn->close();
	     }
	     return array("erro" => true, "Description" => $query);
	}

	//updates employees data
	public function updateFuncionario($data){
	    $this->id = $data["id"];
        $this->nome = $data["nome"];
        $this->rg = $data["rg"];
        $this->cpf = $data["cpf"];
        $this->dataNascimento = $data["dataNascimento"];
        $this->estadoCivil = $data["estadoCivil"];
        $this->sexo = $data["sexo"];
        $this->cargo = $data["cargo"];
        $this->cidadeNatal = $data["cidadeNatal"];
        $this->cep = $data["cep"];
        $this->logradouro = $data["logradouro"];
        $this->numero = $data["numero"];
        $this->complemento = $data["complemento"];
        $this->cidade = $data["cidade"];
        $this->bairro = $data["bairro"];
        $this->email = $data["email"];
        $this->telefone = $data["telefone"];
        $this->celular = $data["celular"];
        $this->tipoPagamento = $data["tipoPagamento"];
        $this->carteiraProfissional = $data["carteiraProfissional"];
        $this->inss = $data["inss"];
        $this->percentualInss = $data["percentualInss"];
        $this->dataAdmissao = $data["dataAdmissao"];
        $this->ccm = $data["ccm"];
        $this->percentualIss = $data["percentualIss"];
        $this->dataDemissao = $data["dataDemissao"];
        $this->aulaInterna = $data["aulaInterna"];
        $this->aulaExterna = $data["aulaExterna"];
        $this->salarioMensal = $data["salarioMensal"];
        $this->banco = $data["banco"];
        $this->agencia = $data["agencia"];
        $this->conta = $data["conta"];
        $this->codigoBanco = $data["codigoBanco"];
        $this->observacoes = $data["observacoes"];
        $this->anexo = $data["anexo"];
				$this->avatarPath = $data["avatarPath"];

        $dataDemissaoString = $this->dataDemissao === "null" ? "null" : "'" . $this->dataDemissao . "'";

        $query = "UPDATE funcionarios SET nome = '{$this->nome}', rg = '{$this->rg}', cpf = '{$this->cpf}',
         dataNascimento = '{$this->dataNascimento}', estadoCivil = '{$this->estadoCivil}', sexo = '{$this->sexo}',
          cargo = '{$this->cargo}', cidadeNatal = '{$this->cidadeNatal}', cep = '{$this->cep}', logradouro = '{$this->logradouro}',
           numero = {$this->numero}, complemento = '{$this->complemento}', cidade = '{$this->cidade}', bairro = '{$this->bairro}',
            email = '{$this->email}', telefone = '{$this->telefone}', celular = '{$this->celular}', tipoPagamento = '{$this->tipoPagamento}',
             carteiraProfissional = '{$this->carteiraProfissional}', inss = '{$this->inss}', percentualInss = {$this->percentualInss},
              dataAdmissao = '{$this->dataAdmissao}', ccm = '{$this->ccm}', percentualIss = {$this->percentualIss},
               dataDemissao = {$dataDemissaoString}, aulaInterna = {$this->aulaInterna}, aulaExterna = {$this->aulaExterna},
                salarioMensal = {$this->salarioMensal}, banco = '{$this->banco}', agencia = '{$this->agencia}',
                 conta = '{$this->conta}', codigoBanco = '{$this->codigoBanco}', observacoes = '{$this->observacoes}',
                  anexo = '{$this->anexo}', avatarPath = '{$this->avatarPath}' WHERE id = {$this->id}";

         $response = $this->conn->query($query);
         if($response){
            return array("erro" => false, "Description" => "Funcionário atualizado com sucesso.");
         }
         return array("erro" => true, "Description" => "Falha ao atualizar funcionário.");
    }

    public function deleteFuncionario($id){
		$query = "DELETE FROM funcionarios WHERE id=" . $id . ";";
        $result = $this->conn->query($query);

        if($result){
            return array("erro" =>false, "Description" => "Funcionário excluido com sucesso.");
        }
        return array("erro" => true, "Description" => "Falha ao exluir funcionário.");
    }

		public function getProfessores(){
			$sql = "SELECT f.id as id, f.nome as nome FROM funcionarios f INNER JOIN cargos c ON c.cargoId = f.cargo AND c.cargoNome = 'Professor'";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function getFuncionarios(){
			$sql = "SELECT id, nome FROM funcionarios";
			$result = $this->conn->query($sql);
			return $result;
		}

	public function getFuncionarioMatriculaById($id)
	{
		$sql = "SELECT matricula FROM funcionarios WHERE id = {$id}";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			$matricula = $result->fetch_assoc();
			return $matricula["matricula"];
		}else{
			return 0;
		}
	}
	public function GetFuncionarioByMatricula($m)
	{
		$sql = "SELECT f.id as 'Código de Identificação', f.matricula
		as 'Matrícula', f.nome as 'Nome', f.rg as 'RG', f.cpf as 'CPF',
		f.dataNascimento as 'Data de Nascimento', f.estadoCivil as 'Estado Civil',
		f.sexo as 'Sexo', r.roleNome as 'Cargo', f.cidadeNatal as 'Cidade Natal',
		f.cep as 'CEP', f.logradouro as 'Logradouro', f.numero as 'Número',
		f.complemento as 'Complemento', f.cidade as 'Cidade', f.bairro as 'Bairro',
		f.email as 'Email', f.telefone as 'Telefone', f.celular as 'Celular',
		f.tipoPagamento as 'Tipo de Pagamento', f.carteiraProfissional
		as 'Carteira Profissional', f.inss as 'INSS', f.percentualInss
		as 'Percentual INSS', f.dataAdmissao as 'Data de Admissão',
		f.aulaExterna as 'Aula Externa(R$)', f.aulaInterna as 'Aula Interna(R$)',
		f.salarioMensal as 'Salário', f.banco as 'Banco', f.agencia as 'Agência',
		f.conta as 'Conta', f.codigoBanco as 'Código Banco', f.observacoes
		as 'Observações'
		FROM funcionarios f
		INNER JOIN roles r ON f.cargo = r.roleId
		WHERE f.matricula = '{$m}'";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			return $result->fetch_assoc();
		}else{
			return 0;
		}
	}
}
?>
