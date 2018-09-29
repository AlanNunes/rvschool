<?php
/**
 * This the Class Alunos where all the datas relationed to the students
 * are manipulated.
 * Created on 31/03/2018
 *
 * @category   Alunos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
Class Alunos {
  public $nome;
  public $rg;
  public $cpf;
  public $dataNasc;
  public $estadoCivil;
  public $sexo;
  public $profissao;
  public $escolaridade;
  public $midia;
  public $cep;
  public $logradouro;
  public $numeroCasa;
  public $complemento;
  public $cidade;
  public $bairro;
  public $email;
  public $telefone;
  public $celular;
  public $banco;
  public $agencia;
  public $conta;
  public $codigoClienteBanco;
  public $bolsa;
  public $inadimplencia;
  public $nomeResponsavelUm;
  public $telefoneResponsavelUm;
  public $celularResponsavelUm;
  public $nomeResponsavelDois;
  public $telefoneResponsavelDois;
  public $celularResponsavelDois;
  public $observacoes;
  public $avatar;
  public $matricula;
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
    $this->profissao = $data["profissao"];
    $this->escolaridade = $data["escolaridade"];
    $this->midia = $data["midia"];
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

    $responsaveis[0] = array("nome" => $this->nomeResponsavelUm, "telefone" => $this->telefoneResponsavelUm, "celular" => $this->celularResponsavelUm);
    $responsaveis[1] = array("nome" => $this->nomeResponsavelDois, "telefone" => $this->telefoneResponsavelDois, "celular" => $this->celularResponsavelDois);

    $sql = "INSERT INTO `alunos` (`nome`, `rg`, `cpf`, `dataNasc`, `estadoCivil`,
      `sexo`, `profissao`, `escolaridade`, `midia`, `cep`, `logradouro`, `numeroCasa`, `complemento`, `cidade`, `bairro`,
      `email`, `telefone`, `celular`, `banco`, `agencia`, `conta`, `codigoClienteBanco`, `bolsa`, `inadimplencia`,
      `observacoes`, `avatar`) VALUES ('{$this->nome}', '{$this->rg}', '{$this->cpf}', '{$this->dataNasc}',
        '{$this->estadoCivil}', '{$this->sexo}', '{$this->profissao}', '{$this->escolaridade}', '{$this->midia}', '{$this->cep}',
        '{$this->logradouro}', {$this->numeroCasa}, '{$this->complemento}', '{$this->cidade}', '{$this->bairro}', '{$this->email}',
        '{$this->telefone}', '{$this->celular}', '{$this->banco}', '{$this->agencia}', '{$this->conta}', '{$this->codigoClienteBanco}',
        {$this->bolsa}, {$this->inadimplencia}, '{$this->observacoes}', '{$this->avatar}')";
    // Register the student
    if($this->conn->query($sql)){
      // Generate a enrol number for the student
      $year = date('Y');
      $last_id = $this->conn->insert_id;
      // Unite the current year with the identification of the user
      $enrol = $year . '-0' . $last_id;
      $enrolSQL = "UPDATE alunos SET matricula = '{$enrol}' WHERE id = {$last_id} LIMIT 1";
      // Set a enrol number to the student
      if($this->conn->query($enrolSQL)){
        $responseResponsaveis = $this->registerResponsavelAluno($last_id, $responsaveis);
        if(!$responseResponsaveis){
          return array('erro' => false, 'Description' => 'Aluno registrado com sucesso.', 'matricula' => $enrol);
        }
      }
      return array('erro' => false, 'Description' => 'Aluno registrado porém a matrícula não foi gerada.');
    }else{
      return array('erro' => true, 'Description' => $sql);
    }
  }

  // Register the guardian of the student - registra o responsável do aluno
  public function registerResponsavelAluno($aluno, $responsaveis){
    $erro = false;
    foreach($responsaveis as $responsavel){
      $nome = $responsavel["nome"];
      $telefone = $responsavel["telefone"];
      $celular = $responsavel["celular"];
      $sql = "INSERT INTO responsaveis (nome, telefone, celular, aluno) VALUES ('{$nome}', '{$telefone}', '{$celular}', {$aluno})";
      if(!$this->conn->query($sql)){
        $erro = true;
      }
    }
    return $erro;
  }

  // This function has the only responsability to edit a student
  public function editStudent($data){
    $this->nome = $data["nome"];
    $this->rg = $data["rg"];
    $this->cpf = $data["cpf"];
    $this->dataNasc = $data["dataNasc"];
    $this->estadoCivil = $data["estadoCivil"];
    $this->sexo = $data["sexo"];
    $this->profissao = $data["profissao"];
    $this->escolaridade = $data["escolaridade"];
    $this->midia = $data["midia"];
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
    $this->matricula = $data["matricula"];

    $sql = "UPDATE alunos SET nome='{$this->nome}', rg='{$this->rg}', cpf='{$this->cpf}', dataNasc='{$this->dataNasc}',
        estadoCivil='{$this->estadoCivil}', sexo='{$this->sexo}', profissao='{$this->profissao}',
        escolaridade='{$this->escolaridade}', midia='{$this->midia}', cep='{$this->cep}',
        logradouro='{$this->logradouro}', numeroCasa={$this->numeroCasa}, complemento='{$this->complemento}',
        cidade='{$this->cidade}', bairro='{$this->bairro}', email='{$this->email}',
        telefone='{$this->telefone}', celular='{$this->celular}', banco='{$this->banco}', agencia='{$this->agencia}',
        conta='{$this->conta}', codigoClienteBanco='{$this->codigoClienteBanco}',
        bolsa={$this->bolsa}, inadimplencia={$this->inadimplencia}, observacoes='{$this->observacoes}', avatar='{$this->avatar}'
        WHERE matricula='{$this->matricula}'";
    // Register the student
    if($this->conn->query($sql)){
      return array('erro' => false, 'Description' => 'Aluno editado com sucesso.');
    }else{
      $this->conn->close();
      return array('erro' => true, 'Description' => $sql);
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

  // This function has the only responsability to delete a student, and just it
  public function deleteStudent($matricula){
    $sql = "DELETE FROM alunos WHERE matricula = '{$matricula}'";
    if($this->conn->query($sql)){
      return array("erro" => false, "description" => 'Aluno excluído com sucesso');
    }
    return array("erro" => true, "description" => 'O Aluno não foi excluído.');
  }

  // Return all the students(alunos) with the name like the one reported
  public function getAlunosByName($nome){
    $sql = "SELECT id, nome FROM alunos WHERE nome LIKE '%{$nome}%'";
    $result = $this->conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $alunos[] = $row;
      }
      return $alunos;
    }
    return "Nenhum aluno encontrado";
  }

  // Return all the guardians of the student
  public function getResponsaveis($id){
    $sql = "SELECT * FROM responsaveis WHERE aluno = {$id}";
    $result = $this->conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $responsaveis[] = $row;
      }
      return $responsaveis;
    }else{
      return array();
    }
  }

  // Pega o aluno pelo id
  public function getAlunoById($id){
    $sql = "SELECT * FROM alunos WHERE id = {$id}";
    $result = $this->conn->query($sql);
    if($result->num_rows > 0){
      $aluno = $result->fetch_assoc();
      return $aluno;
    }else{
      return 0;
    }
  }

  public function GetAlunoByMatricula($m)
  {
    $sql = "SELECT DISTINCT a.id as 'Código de Identificação',
    a.matricula as 'Matrícula', a.nome as 'Nome',
    a.rg as 'RG', a.cpf as 'CPF', a.dataNasc
    as 'Data de Nascimento', a.estadoCivil as 'Estado Civil',
    a.sexo as 'Sexo', a.profissao as 'Profissão', a.escolaridade
    as 'Escolaridade', a.cep as 'CEP', a.logradouro as 'Logradouro',
    a.numeroCasa as 'Número', a.complemento as 'Complemento', a.cidade
    as 'Cidade', a.bairro as 'Bairro', a.email as 'Email', a.telefone
    as 'Telefone', a.celular as 'Celular', a.banco as 'Banco',
    a.agencia as 'Agência', a.conta as 'Conta', a.codigoClienteBanco
    as 'Código Banco',
    if(now() between b.dataInicio and b.dataTermino, b.desconto, null)
    as 'Bolsa', if(a.inadimplencia = 0, 'Não', 'Sim') as 'Inadimplência',
    a.observacoes as 'Observações', a.ativo as 'Ativo'
    FROM alunos a
    INNER JOIN responsaveis r ON a.id = r.aluno
    LEFT JOIN bolsas b ON a.bolsa = b.id
    WHERE a.matricula = '{$m}'";
    $result = $this->conn->query($sql);
    if($result->num_rows > 0){
      return $result->fetch_assoc();
    }else{
      return $sql;
    }
  }
}
 ?>
