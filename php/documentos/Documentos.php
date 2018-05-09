<?php
/**
 *
 * Created on 09/05/2018
 *
 * @category   Contratos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

interface iDocumentos {
  
}
Class Documentos {
  protected $id;
  protected $nome;
  protected $telefone;
  protected $celular;
  protected $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }

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
}
 ?>
