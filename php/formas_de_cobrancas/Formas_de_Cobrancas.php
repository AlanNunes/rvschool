<?php
/**
 * It's the Class Formas_de_Cobrancas where all the datas relationed to the formas de cobranças
 * are manipulated.
 *
 * @category   Formas_de_Cobrancas
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
class Formas_de_Cobrancas {
	private $id;
	private $nome;
  private $contabancaria; // BOOLEAN
  private $operadoracartao; // BOOLEAN
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function getFormasCobranca() {
		$query = "SELECT * FROM formas_de_cobrancas ORDER BY nome ASC";
		$result = $this->conn->query($query);

		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$formasCobranca[] = $row;
			}
		}else{
			return 0;
		}
		return $formasCobranca;
	}
}
?>
