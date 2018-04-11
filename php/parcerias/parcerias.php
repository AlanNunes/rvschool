<?php
/**
 * It's the Class Parcerias where all the datas relationed to the partnerships
 * are manipulated.
 *
 * @category   CategoryName
 * @author     Luan Nunes da Silva <lunanunesrpg@gmail.com>
 * @copyright  2018 Dual Dev
 */
header('Content-Type: application/json');
class Parcerias {
	private $id;
	private $nome;
	private $descontoMatricula;
	private $descontoMensalidade;
	private $descricao;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function listParcerias() {
		$query = "SELECT * FROM parcerias";
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

	public function getParcerias($id){
	    $query = "SELECT * FROM parcerias where id = " . $id;
	    $result = $this->conn->query($query);

	    if($result->num_rows > 0) {
	        $row = $result->fetch_assoc();
	    }
	    else {
	        return array("erro" => true);
	    }
	    return array("erro" => false, "response" => $row);
	}

	public function createParceria($data){
        $nome = $data["nome"];
        $descontoMatricula = $data["descontoMatricula"];
        $descontoMatricula = (int)$descontoMatricula;
        $descontoMensalidade = $data["descontoMensalidade"];
        $descontoMensalidade = (int)$descontoMensalidade;
        $descricao = $data["descricao"];

        $query = "INSERT INTO parcerias(nome, descontoMatricula, descontoMensalidade, descricao) VALUES ('{$nome}',
          {$descontoMatricula}, {$descontoMensalidade}, '{$descricao}');";
        $result = $this->conn->query($query);

        if($result){
            return array("erro" => false, "Description" => "Parceria criada com sucesso.");
        }
        return array("erro" => true, "Description" => "Falha ao criar parceria.");
	}

	public function updateParceria($data){
	    $id = $data["id"];
        $nome = $data["nome"];
        $descontoMatricula = $data["descontoMatricula"];
        $descontoMatricula = (int)$descontoMatricula;
        $descontoMensalidade = $data["descontoMensalidade"];
        $descontoMensalidade = (int)$descontoMensalidade;
        $descricao = $data["descricao"];

        $query = "UPDATE parcerias SET nome = '{$nome}', descontoMatricula = {$descontoMatricula},
         descontoMensalidade = '{$descontoMensalidade}', descricao = '{$descricao}' WHERE id = {$id}";
           $result = $this->conn->query($query);

        if($result){
            return array("erro" => false, "Description" => "Parceria atualizada com sucesso.");
        }
        return array("erro" => true, "Description" => "Falha ao atualizar parceria.");
    }

	public function deleteParceria($id){
	    $query = "DELETE FROM parcerias WHERE id=" . $id;
	    $result = $this->conn->query($query);

	    if($result){
	        return array("erro" =>false, "responseText" => "Parceria excluida com sucesso.");
	    }
	    return array("erro" => true, "responseText" => "Falha ao exluír parceria.");
	}
}
?>