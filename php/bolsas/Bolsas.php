<?php
/**
 * It's the Class Bolsas where all the datas relationed to the bolsas
 * are manipulated.
 *
 * @category   CategoryName
 * @author     Luan Nunes da Silva <lunanunesrpg@gmail.com>
 * @copyright  2018 Dual Dev
 */
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
		$query = "SELECT id, nome, desconto, descricao, fixa, dataInicio, dataTermino FROM bolsas";
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

	public function createBolsa($nome, $desconto, $descricao, $fixa, $dataInicio, $dataTermino){
        $nome = filter_var(trim($nome), FILTER_SANITIZE_STRING);
        $desconto = filter_var($desconto, FILTER_SANITIZE_NUMBER_INT);
        $descricao = filter_var(trim($descricao), FILTER_SANITIZE_STRING);
        $fixa = filter_var($fixa, FILTER_SANITIZE_NUMBER_INT);
        $dataInicio = filter_var($dataInicio, FILTER_SANITIZE_STRING);
        $dataTermino = filter_var($dataTermino, FILTER_SANITIZE_STRING);
        $fixa = (int)$fixa;
        $timeZone = new DateTimeZone("America/Sao_Paulo");
        $now = new DateTime("now", $timeZone);
        $dateTimeInicio = new DateTime($dataInicio, $timeZone);
        $dateTimeTermino = new DateTime($dataTermino, $timeZone);

        if($fixa != 0 && $fixa != 1){
            $fixa = 1;
        }

        if(!$nome || empty($nome)){
            echo "Por favor, digite o nome da bolsa.";
        }
        else if(!$desconto || empty($desconto)){
            echo "Por favor, digite o desconto referente a bolsa.";
        }
        else if(!$fixa && !$dataInicio){
            echo "Por favor, selecione uma data de início para a bolsa";
        }
        else if(!$fixa && !$dataTermino){
            echo "Por favor, selecione uma data de término para a bolsa";
        }
        else if(!$fixa && $dateTimeInicio < $now){
            echo "Por favor, selecione uma data de início que não esteja no passado.";
        }
        else if(!$fixa && $dateTimeTermino < $dateTimeInicio){
            echo "Por favor, selecione uma data de término após a data de início.";
        }
        else if(!$fixa && $dateTimeInicio == $dateTimeTermino){
            echo "Por favor, selecione datas distintas.";
        }
        else if(!$fixa && !$descricao || empty($descricao)){
            echo "Por favor, digite a descrição da bolsa.";
        }
        else {
            if($fixa == 0){
                $query = "INSERT INTO bolsas (nome, desconto, descricao, fixa, dataInicio, dataTermino) VALUES ('{$nome}', '{$desconto}', '{$descricao}', '{$fixa}', '{$dataInicio}', '{$dataTermino}');";
            }
            else {
                $query = "INSERT INTO bolsas (nome, desconto, descricao, fixa) VALUES ('{$nome}', '{$desconto}', '{$descricao}', '{$fixa}');";
            }
            $result = $this->conn->query($query);

            if($result){
                return array("erro" => false, "responseText" => "Bolsa criada com sucesso.");
            }
            return array("erro" => true, "responseText" => "Falha ao criar bolsa.");
        }
	}

	public function updateBolsa($id, $nome, $desconto, $descricao, $fixa, $dataInicio, $dataTermino, $oldBolsa) {
	    $nome = filter_var(trim($nome), FILTER_SANITIZE_STRING);
        $desconto = filter_var($desconto, FILTER_SANITIZE_NUMBER_INT);
        $descricao = filter_var(trim($descricao), FILTER_SANITIZE_STRING);
        $fixa = filter_var($fixa, FILTER_SANITIZE_NUMBER_INT);
        $dataInicio = filter_var($dataInicio, FILTER_SANITIZE_STRING);
        $dataTermino = filter_var($dataTermino, FILTER_SANITIZE_STRING);
        $fixa = (int)$fixa;
        $oldFixa = (int)$oldBolsa["fixa"];
        $timeZone = new DateTimeZone("America/Sao_Paulo");
        $now = new DateTime("now", $timeZone);
        $dateTimeInicio = new DateTime($dataInicio, $timeZone);
        $dateTimeTermino = new DateTime($dataTermino, $timeZone);
        $oldDateTimeInicio = new DateTime($oldBolsa["dataInicio"], $timeZone);
        $oldDateTimeTermino = new DateTime($oldBolsa["dataTermino"], $timeZone);

        if($fixa != 0 && $fixa != 1){
            $fixa = 1;
        }

        if(!$nome || empty($nome)){
            echo "Por favor, digite o nome da bolsa.";
        }
        else if(!$desconto || empty($desconto)){
            echo "Por favor, digite o desconto referente a bolsa.";
        }
        else if(!$fixa && !$dataInicio){
            echo "Por favor, selecione uma data de início para a bolsa";
        }
        else if(!$fixa && !$dataTermino){
            echo "Por favor, selecione uma data de término para a bolsa";
        }
        else if(!$fixa && $oldFixa && $dateTimeInicio < $now){
            echo "Por favor, selecione uma data de início que não esteja no passado.";
        }
        else if(!$fixa && !$oldFixa && $dateTimeInicio < $oldDateTimeInicio) {
            echo "Por favor, selecione uma nova data de inicio maior que a anterior.";
        }
        else if(!$fixa && $dateTimeTermino < $dateTimeInicio){
            echo "Por favor, selecione uma data de término após a data de início.";
        }
        else if(!$fixa && $dateTimeInicio == $dateTimeTermino){
            echo "Por favor, selecione datas distintas.";
        }
        else if(!$fixa && !$descricao || empty($descricao)){
            echo "Por favor, digite a descrição da bolsa.";
        }
        else {
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
                return array("erro" => false, "responseText" => "Bolsa atualizada com sucesso.");
            }
            return array("erro" => true, "responseText" => "Falha ao atualizar bolsa.");
        }
	}

	public function deleteBolsa($id){
	    $query = "DELETE FROM bolsas WHERE id=" . $id;
	    $result = $this->conn->query($query);

	    if($result){
	        return array("erro" =>false, "responseText" => "Bolsa excluida com sucesso.");
	    }
	    return array("erro" => true, "responseText" => "Falha ao exluir bolsa");
	}
}
?>