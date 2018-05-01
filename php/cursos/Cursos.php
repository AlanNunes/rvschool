<?php
class Cursos {
	private $id;
	private $nome;
	private $conn;

  public function __construct($conn){
	    $this->conn = $conn;
	}

  public function getCursos(){
    $sql = "SELECT * FROM cursos";
    $result = $this->conn->query($sql);
    return $result;
  }
}
?>
