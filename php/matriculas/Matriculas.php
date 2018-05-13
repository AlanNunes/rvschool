<?php
/**
 * Matricula aluno, edita e exclui matrículas
 * Created on 13/05/2018
 *
 * @category   Matrículas
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
Class Matriculas {
  private $id;
  private $aluno;
  private $turma;
  private $dataMatricula;
  private $dataInicioAtividades;
  private $numero;
  private $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }

  // Matricula o aluno e retorna o id da matrícula. Se o procedimento falhar retorna a matrícula como nulo
  public function matriculaAluno($aluno, $turma, $dataMatricula, $dataInicioAtividades){
    $sql = "INSERT INTO matriculas (aluno, turma, dataMatricula, dataInicioAtividades)
            VALUES ('{$aluno}', {$turma}, '{$dataMatricula}', '{$dataInicioAtividades}')";
    if($this->conn->query($sql)){
      // O aluno foi matriculado com sucesso
      $matriculaId = $this->conn->insert_id;
      $numeroMatricula = date('Y') . '-' . $matriculaId;
      $sql = "UPDATE matriculas SET numero = '{$numeroMatricula}' WHERE id = {$matriculaId}";
      if($this->conn->query($sql)){
        return array("erro" => false, "description" => "Aluno matriculado com sucesso.", "matriculaId" => $matriculaId);
      }else{
        return array("erro" => true, "description" => "Aluno matriculado porém o número da matrícula não foi gerado.", "matriculaId" => null);
      }
    }else{
      return array("erro" => true, "description" => "Aluno não matriculado.", "matriculaId" => $sql);
    }
  }
}
 ?>
