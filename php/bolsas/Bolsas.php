<?php
/**
 * It's the Class Bolsas where all the datas relationed to the bolsas
 * are manipulated.
 *
 * @category   CategoryName
 * @author     Luan Nunes da Silva <lunanunesrpg@gmail.com>
 * @copyright  2018 Dual Dev
 */
// header('Content-Type: application/json');
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
		$query = "SELECT id, nome, desconto, descricao, fixa, dataInicio, dataTermino FROM bolsas ORDER BY  desconto, nome ASC";
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

	public function createBolsa($data){
        $nome = $data["nome"];
        $desconto = $data["desconto"];
        $descricao = $data["descricao"];
        $fixa = $data["fixa"];
        $dataInicio = $data["dataInicio"];
        $dataTermino = $data["dataTermino"];
        $fixa = (int)$fixa;

        if($fixa != 0 && $fixa != 1){
            $fixa = 1;
        }

        if($fixa == 0){
            $query = "INSERT INTO bolsas (nome, desconto, descricao, fixa, dataInicio, dataTermino) VALUES ('{$nome}', '{$desconto}', '{$descricao}', '{$fixa}', '{$dataInicio}', '{$dataTermino}');";
        }
        else {
            $query = "INSERT INTO bolsas (nome, desconto, descricao, fixa) VALUES ('{$nome}', '{$desconto}', '{$descricao}', '{$fixa}');";
        }
        $result = $this->conn->query($query);

        if($result){
            return array("erro" => false, "Description" => "Bolsa criada com sucesso.");
        }
        return array("erro" => true, "Description" => "Falha ao criar bolsa.");
	}

	public function updateBolsa($data) {
	    $id = $data["id"];
	    $nome = $data["nome"];
        $desconto = $data["desconto"];
        $descricao = $data["descricao"];
        $fixa = $data["fixa"];
        $dataInicio = $data["dataInicio"];
        $dataTermino = $data["dataTermino"];
        $fixa = (int)$fixa;

        if($fixa != 0 && $fixa != 1){
            $fixa = 1;
        }

        if($fixa == 0){
            $query = "UPDATE bolsas SET nome = '{$nome}', desconto = {$desconto}, fixa = {$fixa},
             dataInicio = '{$dataInicio}', dataTermino = '{$dataTermino}', descricao = '{$descricao}' WHERE
              id = {$id}";
        }
        else {
            $query = "UPDATE bolsas SET nome = '{$nome}', desconto = {$desconto}, fixa = {$fixa},
             descricao = '{$descricao}' WHERE id = {$id}";
        }
        $result = $this->conn->query($query);

        if($result){
            return array("erro" => false, "Description" => "Bolsa atualizada com sucesso.");
        }
        return array("erro" => true, "Description" => "Falha ao atualizar bolsa.");
	}

	public function deleteBolsa($id){
	    $query = "DELETE FROM bolsas WHERE id=" . $id;
	    $result = $this->conn->query($query);

	    if($result){
	        return array("erro" =>false, "Description" => "Bolsa excluida com sucesso.");
	    }
	    return array("erro" => true, "Description" => "Falha ao exluir bolsa");
	}
}
?>
