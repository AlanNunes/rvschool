<?php
/**
 * This the Class Alunos where all the datas relationed to the students
 * are manipulated.
 * Created on 31/03/2018
 *
 * @category   CategoryName
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 * @copyright  2018 Dual Dev
 */
Class Alunos {
  private $nome;
  private $rg;
  private $cpf;
  private $dataNasc;
  private $estadoCivil;
  private $sexo;
  private $escola;
  private $escolaridade;
  private $serie;
  private $cep;
  private $logradouro;
  private $numeroCasa;
  private $complemento;
  private $cidade;
  private $bairro;
  private $email;
  private $telefone;
  private $celular;
  private $banco;
  private $agencia;
  private $conta;
  private $codigoClienteBanco;
  private $bolsa;
  private $inadimplencia;
  private $nomeResponsavelUm;
  private $telefoneResponsavelUm;
  private $celularResponsavelUm;
  private $nomeResponsavelDois;
  private $telefoneResponsavelDois;
  private $celularResponsavelDois;
  private $observacoes;
  private $avatar;
  private $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }

  // This function has the only responsability to register a students
  // and set a enrol number to him
  public function registerStudent($data){
    $this->nome = $data["nome"];
    $this->rg = $data["rg"];
    $this->cpf = $data["cpf"];
    $this->dataNasc = $data["dataNasc"];
    $this->estadoCivil = $data["estadoCivil"];
    $this->sexo = $data["sexo"];
    $this->escola = $data["escola"];
    $this->escolaridade = $data["escolaridade"];
    $this->serie = $data["serie"];
    $this->cep = $data["cep"];
    $this->logradouro = $data["logradouro"];
    $this->numeroCasa = $data["numeroCasa"];
    $this->complemento = $data["complemento"];
    $this->cidade = $data["cidade"];
    $this->bairro = $data["bairro"];
    $this->email = $data["email"];
    $this->telefone = $data["telefone"];
    $this->celular = $data["celular"];
    $this->banco = $data["banco"];
    $this->agencia = $data["agencia"];
    $this->conta = $data["conta"];
    $this->codigoClienteBanco = $data["codigoClienteBanco"];
    $this->bolsa = $data["bolsa"];
    $this->inadimplencia = $data["inadimplencia"];
    $this->nomeResponsavelUm = $data["nomeResponsavelUm"];
    $this->telefoneResponsavelUm = $data["telefoneResponsavelUm"];
    $this->celularResponsavelUm = $data["celularResponsavelUm"];
    $this->nomeResponsavelDois = $data["nomeResponsavelDois"];
    $this->telefoneResponsavelDois = $data["telefoneResponsavelDois"];
    $this->celularResponsavelDois = $data["celularResponsavelDois"];
    $this->observacoes = $data["observacoes"];
    $this->avatar = $data["avatar"];

    $sql = "INSERT INTO `alunos` (`nome`, `rg`, `cpf`, `dataNasc`, `estadoCivil`,
      `sexo`, `escola`, `escolaridade`, `serie`, `cep`, `logradouro`, `numeroCasa`, `complemento`, `cidade`, `bairro`,
      `email`, `telefone`, `celular`, `banco`, `agencia`, `conta`, `codigoClienteBanco`, `bolsa`, `inadimplencia`,
      `nomeResponsavelUm`, `telefoneResponsavelUm`, `celularResponsavelUm`, `nomeResponsavelDois`, `telefoneResponsavelDois`,
      `celularResponsavelDois`, `observacoes`, `avatar`) VALUES ('{$this->nome}', '{$this->rg}', '{$this->cpf}', '{$this->dataNasc}',
        '{$this->estadoCivil}', '{$this->sexo}', '{$this->escola}', '{$this->escolaridade}', '{$this->serie}', '{$this->cep}',
        '{$this->logradouro}', {$this->numeroCasa}, '{$this->complemento}', '{$this->cidade}', '{$this->bairro}', '{$this->email}',
        '{$this->telefone}', '{$this->celular}', '{$this->banco}', '{$this->agencia}', '{$this->conta}', '{$this->codigoClienteBanco}',
        {$this->bolsa}, {$this->inadimplencia}, '{$this->nomeResponsavelUm}', '{$this->telefoneResponsavelUm}', '{$this->celularResponsavelUm}',
        '{$this->nomeResponsavelDois}', '{$this->telefoneResponsavelDois}', '{$this->celularResponsavelDois}', '{$this->observacoes}', '{$this->avatar}')";
    // Register the student
    if($this->conn->query($sql)){
      // Generate a enrol number for the student
      $year = date('Y');
      $last_id = $this->conn->insert_id;
      // Unite the current year with the identification of the user
      $enrol = $year . '-' . $last_id;
      $enrolSQL = "UPDATE alunos SET matricula = '{$enrol}' WHERE id = {$last_id} LIMIT 1";
      // Set a enrol number to the student
      if($this->conn->query($enrolSQL)){
          $this->conn->close();
          return array('erro' => false, 'Description' => 'Aluno registrado com sucesso.');
      }
      $this->conn->close();
      return array('erro' => false, 'Description' => 'Aluno registrado porém a matrícula não foi gerada com sucesso.');
    }else{
      $this->conn->close();
      return array('erro' => true, 'Description' => 'Aluno não registrado.');
    }
  }

  // This function has the only responsability to list all
  // the students from the table Alunos, and just it
  public function listStudents(){
    $sql = "SELECT * FROM alunos";
    $response = $this->conn->query($sql);
    if($response->num_rows > 0){
      $students;
      while($row = $response->fetch_assoc()){
        $students[] = $row;
      }
      return array("erro" => false, "students" => $students);
    }
    return array("erro" => true, "students" => NULL);
  }
}
 ?>
