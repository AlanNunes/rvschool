<?php
/**
 * It's the Class Turmas where all the datas relationed to the class
 * are manipulated.
 *
 * @category   Turmas
 * @author     Luan Nunes da Silva <lunanunesrpg@gmail.com>
 */

Class Turmas {
	private $id;
	private $nome;
	private $descricao;
	private $desconto;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function listTurmas() {
		$query = "SELECT t.id, t.nome, t.situacao, t.professor, t.estagio, t.curso, t.horario, t.maximoDeAlunos, t.sala, t.dataInicio, t.dataTermino, t.ultimaPalavra, t.ultimaLicao, t.UltimoDitado, t.minimoAlunos, t.duracaoAula, c.id as cursoId, c.nome as cursoNome, f.nome as professorNome FROM turmas t INNER JOIN cursos c ON c.id = t.curso INNER JOIN funcionarios f ON f.id = t.professor";
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
	    $query = "SELECT t.id, t.nome, t.situacao, t.professor, t.estagio, t.curso, t.horario, t.maximoDeAlunos, t.sala, t.dataInicio, t.dataTermino,
								t.ultimaPalavra, t.ultimaLicao, t.UltimoDitado, t.minimoAlunos, t.duracaoAula, c.id as cursoId, c.nome as cursoNome, e.nome as estagioNome
								FROM turmas t INNER JOIN cursos c ON c.id = t.curso INNER JOIN estagios e ON e.id = t.estagio AND t.id = {$id}";
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
          {$situacao}, {$professor}, '{$estagio}', '{$curso}', '{$horario}', {$minimoAlunos}, '{$sala}',
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
				$professor = ($professor == null ? "NULL" : "'$professor'");

        $query = "UPDATE turmas SET nome = '{$nome}', situacao = {$situacao}, professor = {$professor},
         estagio = '{$estagio}', curso = '{$curso}', horario = '{$horario}', minimoAlunos = {$minimoAlunos},
          sala = '{$sala}', duracaoAula = {$duracaoAula}, dataInicio = '{$dataInicio}', dataTermino = '{$dataTermino}'
           WHERE id = {$id}";
           $result = $this->conn->query($query);

        if($result){
            return array("erro" => false, "Description" => "Turma atualizada com sucesso.");
        }
        return array("erro" => true, "Description" => $query);
    }

	public function GetTurmaEstagio($IdTurma)
	{
		$query = "SELECT estagio as IdEstagio FROM turmas t
							INNER JOIN estagios e ON e.id = t.estagio
							WHERE t.id = {$IdTurma}";
		$result = $this->conn->query($query);
		if ($result->num_rows)
		{
			$row = $result->fetch_assoc();
			$idEstagio = $row["IdEstagio"];
			return $idEstagio;
		}
		else
		{
			return 0;
		}
	}

	public function deleteTurma($id){
	    $query = "DELETE FROM turmas WHERE id=" . $id;
	    $result = $this->conn->query($query);

	    if($result){
	        return array("erro" =>false, "Description" => "Turma excluida com sucesso.");
	    }
	    return array("erro" => true, "Description" => "Falha ao exluír turma.");
	}
}
?>
