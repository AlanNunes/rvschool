<?php
/**
 *
 * Created on 09/05/2018
 *
 * @category   Contratos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
Class Responsaveis {
  protected $id;
  protected $nome;
  protected $telefone;
  protected $celular;
  protected $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }

  // Pega todos os responsáveis de um aluno
  public function getResponsaveisByAlunoId($idAluno){
    $sql = "SELECT * FROM responsaveis WHERE aluno = {$idAluno}";
    $result = $this->conn->query($sql);
    $responsaveis = null;
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $responsaveis[] = $row;
      }
    }
    return $responsaveis;
  }

  // Pega um responsável referente ao id
  public function getResponsavelById($id){
    $sql = "SELECT * FROM responsaveis WHERE id = {$id}";
    $result = $this->conn->query($sql);
    if($result->num_rows > 0){
      $responsavel = $result->fetch_assoc();
    }else{
      return 0;
    }
  }
}
 ?>
