<?php
/**
 * Created on ??/03/2018
 *
 * @category   CategoryName
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
// header('Content-Type: application/json');
class Cargos {
	private $id;
	private $nome;
	private $roleId;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function listCargos() {
		$query = "SELECT cargoId, cargoNome FROM cargos";
		$result = $this->conn->query($query);

		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
		}else{
			return array("erro" => true);
		}
		return array("erro" => false, "response" => $response);
	}
}
?>
