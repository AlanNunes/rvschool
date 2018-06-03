<?php
/**
 * It's the Class Parcelas_Categorias where all the datas relationed to the categorias de parcelas
 * are manipulated.
 *
 * @category   Parcelas
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
class Parcelas_Categorias {
	private $id;
	private $nome;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function getCategorias() {
		$query = "SELECT id, nome FROM parcelas_categorias ORDER BY nome ASC";
		$result = $this->conn->query($query);

		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$categorias[] = $row;
			}
		}else{
			return 0;
		}
		return $categorias;
	}
}
?>
