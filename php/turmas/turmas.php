<?php
/**
 * It's the Class Turmas where all the datas relationed to the turmas
 * are manipulated.
 *
 * @category   CategoryName
 * @author     Luan Nunes da Silva <lunanunesrpg@gmail.com>
 * @copyright  2018 Dual Dev
 */
header('Content-Type: application/json');
class Turmas {
	private $id;
	private $nome;
	private $descricao;
	private $desconto;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function listTurmas() {
		$query = "SELECT * FROM turmas";
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

	public function getTurma($id){
	    $query = "SELECT * FROM turmas where id = " . $id;
	    $result = $this->conn->query($query);

	    if($result->num_rows > 0) {
	        $row = $result->fetch_assoc();
	    }
	    else {
	        return array("erro" => true);
	    }
	    return array("erro" => false, "response" => $row);
	}

	public function createTurma($data){
        $nome = $data["nome"];
        $situacao = $data["situacao"];
        $situacao = (int)$situacao;
        $professor = $data["professor"];
        $estagio = $data["estagio"];
        $curso = $data["curso"];
        $horario = $data["horario"];
        $minimoAlunos = $data["minimoAlunos"];
        $sala = $data["sala"];
        $duracaoAula = $data["duracaoAula"];
        $dataInicio = $data["dataInicio"];
        $dataTermino = $data["dataTermino"];

        $query = "INSERT INTO turmas(nome, situacao, professor, estagio, curso, horario, minimoAlunos, sala,
         duracaoAula, dataInicio, dataTermino) VALUES ('{$nome}',
          {$situacao}, '{$professor}', '{$estagio}', '{$curso}', '{$horario}', {$minimoAlunos}, '{$sala}',
           {$duracaoAula}, '{$dataInicio}', '{$dataTermino}');";
        $result = $this->conn->query($query);

        if($result){
            return array("erro" => false, "Description" => "Turma criada com sucesso.");
        }
        return array("erro" => true, "Description" => "Falha ao criar turma.");
	}

	public function updateTurma($data){
	    $id = $data["id"];
        $nome = $data["nome"];
        $situacao = $data["situacao"];
        $situacao = (int)$situacao;
        $professor = $data["professor"];
        $estagio = $data["estagio"];
        $curso = $data["curso"];
        $horario = $data["horario"];
        $minimoAlunos = $data["minimoAlunos"];
        $sala = $data["sala"];
        $duracaoAula = $data["duracaoAula"];
        $dataInicio = $data["dataInicio"];
        $dataTermino = $data["dataTermino"];

        $query = "UPDATE turmas SET nome = '{$nome}', situacao = {$situacao}, professor = '{$professor}',
         estagio = '{$estagio}', curso = '{$curso}', horario = '{$horario}', minimoAlunos = {$minimoAlunos},
          sala = '{$sala}', duracaoAula = {$duracaoAula}, dataInicio = '{$dataInicio}', dataTermino = '{$dataTermino}'
           WHERE id = {$id}";
           $result = $this->conn->query($query);

        if($result){
            return array("erro" => false, "Description" => "Turma atualizada com sucesso.");
        }
        return array("erro" => true, "Description" => "Falha ao atualizar turma.");
    }

	public function deleteTurma($id){
	    $query = "DELETE FROM turmas WHERE id=" . $id;
	    $result = $this->conn->query($query);

	    if($result){
	        return array("erro" =>false, "responseText" => "Turma excluida com sucesso.");
	    }
	    return array("erro" => true, "responseText" => "Falha ao exluir turma");
	}
}
?>