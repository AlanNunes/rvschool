<?php
/**
 *
 * @category   Contas Bancárias
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
class Contas_Bancarias {
	private $id;
	private $nome;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function getContasBancarias() {
		$query = "SELECT * FROM contas_bancarias ORDER BY nome ASC";
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
