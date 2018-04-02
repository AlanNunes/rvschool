<?php
class Funcionarios {
	private $nome;
	private $RG;
	private $CPF;
	private $dataNasc;
	private $estadoCivil;
	private $sexo;
	private $cargo;
	private $cidadeNatal;
	private $CEP;
	private $logradouro;
	private $numeroRua;
	private $complemento;
	private $cidade;
	private $bairro;
	private $email;
	private $telefone;
	private $celular;
	private $tipoPagamento;
	private $carteiraProfissional;
	private $INSS;
	private $percentualINSS;
	private $CCM;
	private $percentualISS;
	private $dataAdimissao;
	private $dataDemissao;
	private $aulaInterna; // valor que ele ganha por aula interna
	private $aulaExterna; // iden externa
	private $salarioMensal; // caso o funcionário não ganhe por hora, é então assalariado
	private $banco;
	private $agencia;
	private $conta;
	private $codigoBanco;
	private $observacoes;
	private $anexo;

	public function __construct($conn){
	    $this->conn = $conn;
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
	    $this->cmm = $data["cmm"];
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

	    $query = "INSERT INTO funcionarios (nome, rg, cpf, dataNascimento, estadoCivil, sexo, cargo, cidadeNatal, cep,
	     logradouro, numero, complemento, cidade, bairro, email, telefone, celular, tipoPagamento, carteiraProfissional,
	     inss, percentualInss, dataAdmissao, cmm, percentualIss, dataDemissao, aulaInterna, aulaExterna, salarioMensal,
	     banco, agencia, conta, codigoBanco, observacoes, anexo) VALUES ('{$this->nome}', '{$this->rg}', '{$this->cpf}',
	     '{$this->dataNascimento}', '{$this->estadoCivil}', '{$this->sexo}', '{$this->cargo}', '{$this->cidadeNatal}',
	     '{$this->cep}', '{$this->logradouro}', '{$this->numero}', '{$this->complemento}', '{$this->cidade}',
	     '{$this->bairro}', '{$this->email}', '{$this->telefone}', '{$this->celular}', '{$this->tipoPagamento}',
	     '{$this->carteiraProfissional}', '{$this->inss}', '{$this->percentualInss}', '{$this->dataAdmissao}',
	     '{$this->cmm}', '{$this->percentualIss}', '{$this->dataDemissao}', '{$this->aulaInterna}',
	     '{$this->aulaExterna}', '{$this->salarioMensal}', '{$this->banco}', '{$this->agencia}', '{$this->conta}',
	     '{$this->codigoBanco}', '{$this->observacoes}', '{$this->anexo}')";

	     $response = $this->conn->query($query);
	     if($response){
	        return array("erro" => false, "Description" => "Funcionário registrado com sucesso.");
	     }
	     return array("erro" => true, "Description" => "Falha ao registrar funcionário.");
	}
}
?>