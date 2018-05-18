<?php
/**
 * This the Class Alunos where all the datas relationed to the students
 * are manipulated.
 * Created on 31/03/2018
 *
 * @category   Interessados
 * @author     Gustavo Brandão <sm70plus2gmail.com>
 * @copyright  2018 Dual Dev
 */
Class Interessados {
  private $id;
  private $nome;
  private $sexo;
  private $midia;
  private $cep;
  private $logradouro;
  private $numeroCasa;
  private $complemento;
  private $cidade;
  private $bairro;
  private $email;
  private $telefone;
  private $celular;
  private $observacoes;
  private $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }

  // This function has the only responsability to register a students
  // and set a enrol number to him
  public function registerStudent($data){
    $this->nome = $data["nome"];
    $this->sexo = $data["sexo"];
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
    $this->observacoes = $data["observacoes"];


    $sql = "INSERT INTO `interessados` (`nome`,`sexo`, `midia`, `cep`, `logradouro`, `numeroCasa`, `complemento`, `cidade`, `bairro`,
            `email`, `telefone`, `celular`,`observacoes`)
            VALUES ('{$this->nome}', '{$this->sexo}', '{$this->midia}', '{$this->cep}',
            '{$this->logradouro}', {$this->numeroCasa}, '{$this->complemento}', '{$this->cidade}', '{$this->bairro}', '{$this->email}',
            '{$this->telefone}', '{$this->celular}', '{$this->observacoes}')";
    // Register the student
    if($this->conn->query($sql)){
      // Generate a enrol number for the student
      $year = date('Y');
      $last_id = $this->conn->insert_id;
      // Unite the current year with the identification of the user
      $enrol = $year . '-' . $last_id;
      $enrolSQL = "UPDATE interessados SET matricula = '{$enrol}' WHERE id = {$last_id} LIMIT 1";
      // Set a enrol number to the student
      if($this->conn->query($enrolSQL)){
        $responseResponsaveis = $this->registerResponsavelAluno($last_id, $responsaveis);
        if(!$responseResponsaveis){
          $this->conn->close();
          return array('erro' => false, 'Description' => 'Aluno registrado com sucesso.');
        }
      }
      $this->conn->close();
      return array('erro' => false, 'Description' => 'Aluno registrado porém a matrícula não foi gerada com sucesso.');
    }else{
      $this->conn->close();
      return array('erro' => true, 'Description' => $sql);
    }
  }


  // This function has the only responsability to edit a student
  public function editStudent($data){
    $this->nome = $data["nome"];
    $this->sexo = $data["sexo"];
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
    $this->observacoes = $data["observacoes"];
    $this->id = $data["id"];

    $sql = "UPDATE interessados SET nome='{$this->nome}', rg='{$this->rg}', cpf='{$this->cpf}', dataNasc='{$this->dataNasc}',
        estadoCivil='{$this->estadoCivil}', sexo='{$this->sexo}', profissao='{$this->profissao}',
        escolaridade='{$this->escolaridade}', midia='{$this->midia}', cep='{$this->cep}',
        logradouro='{$this->logradouro}', numeroCasa={$this->numeroCasa}, complemento='{$this->complemento}',
        cidade='{$this->cidade}', bairro='{$this->bairro}', email='{$this->email}',
        telefone='{$this->telefone}', celular='{$this->celular}', banco='{$this->banco}', agencia='{$this->agencia}',
        conta='{$this->conta}', codigoClienteBanco='{$this->codigoClienteBanco}',
        bolsa={$this->bolsa}, inadimplencia={$this->inadimplencia}, observacoes='{$this->observacoes}', avatar='{$this->avatar}'
        WHERE id='{$this->id}'";
    // Register the student
    if($this->conn->query($sql)){
      return array('erro' => false, 'Description' => 'Editado com sucesso.');
    }else{
      $this->conn->close();
      return array('erro' => true, 'Description' => $sql);
    }
  }

  // This function has the only responsability to list all
  // the students from the table Alunos, and just it
  public function listStudents(){
    $sql = "SELECT * FROM interessados";
    $response = $this->conn->query($sql);
    if($response->num_rows > 0){
      $students;
      while($row = $response->fetch_assoc()){
        $students[] = $row;
      }
      return array("erro" => false, "students" => $students);
    }
    return array("erro" => false, "students" => NULL);
  }

  // This function has the only responsability to delete a student, and just it
  public function deleteStudent($id){
    $sql = "DELETE FROM interessados WHERE id = '{$id}'";
    if($this->conn->query($sql)){
      return array("erro" => false, "description" => 'Aluno excluído com sucesso');
    }
    return array("erro" => true, "description" => 'O Aluno não foi excluído.');
  }

  // Return all the students(alunos) with the name like the one reported
  public function getAlunosByName($nome){
    $sql = "SELECT id, nome FROM interessados WHERE nome LIKE '%{$nome}%'";
    $result = $this->conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $alunos[] = $row;
      }
      return $alunos;
    }
    return "Nenhum aluno encontrado";
  }


}
 ?>
