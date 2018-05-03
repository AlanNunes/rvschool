<?php
/**
 * Manipulate data relationed to 'Estágios'
 *
 * @category   Estágios
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

Class Estagios {
	private $id;
	private $nome;
	private $descricao;
	private $desconto;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

  // Return all the 'estágios' in an array
  public function getEstagios(){
    $sql = "SELECT * FROM estagios";
    $result = $this->conn->query($sql);
    return $result;
  }
}
?>
