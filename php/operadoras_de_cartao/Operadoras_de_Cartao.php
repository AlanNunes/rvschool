<?php
/**
 *
 * @category   Operadoras de Cartão
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
class Operadoras_de_Cartao {
	private $id;
	private $nome;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function getOperadoras() {
		$query = "SELECT * FROM operadoras_de_cartao ORDER BY nome ASC";
		$result = $this->conn->query($query);

		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$contasBancarias[] = $row;
			}
		}else{
			return 0;
		}
		return $contasBancarias;
	}
}
?>
