<?php
header('Content-Type: application/json');
class Bolsas {
	private $id;
	private $nome;
	private $descricao;
	private $desconto;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function listBolsas() {
		$query = "SELECT id, nome, desconto, descricao FROM bolsas";
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

	public function getBolsa($id){
	    $query = "SELECT * FROM bolsas where id = " . $id;
	    $result = $this->conn->query($query);

	    if($result->num_rows > 0) {
	        $row = $result->fetch_assoc();
	    }
	    else {
	        return array("erro" => true);
	    }
	    return array("erro" => false, "response" => $row);
	}

	public function createBolsa($nome, $desconto, $descricao){
        $nome = filter_var(trim($nome), FILTER_SANITIZE_STRING);
        $desconto = filter_var($desconto, FILTER_SANITIZE_NUMBER_INT);
        $descricao = filter_var(trim($descricao), FILTER_SANITIZE_STRING);
        if(!$nome || empty($nome)){
            echo "Por favor, digite o nome da bolsa.";
        }
        else if(!$desconto || empty($desconto)){
            echo "Por favor, digite o desconto referente a bolsa.";
        }
        else if(!$descricao || empty($descricao)){
            echo "Por favor, digite a descrição da bolsa.";
        }
        else {
            $query = "INSERT INTO bolsas (nome, desconto, descricao) VALUES ('{$nome}', {$desconto}, '{$descricao}');";
            $result = $this->conn->query($query);

            if($result){
                return array("erro" => false, "responseText" => "Bolsa criada com sucesso.");
            }
            return array("erro" => true, "responseText" => "Falha ao criar bolsa.");
        }
	}
}
?>