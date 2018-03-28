<?php
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

	public function createTurma($nome, $situacao, $professor, $estagio, $curso, $horario, $maximoDeAlunos,
	 $sala, $duracaoDaAula, $dataInicio, $dataTermino, $ultimaPalavra, $ultimaLicao, $ultimoSitato){
        $nome = filter_var(trim($nome), FILTER_SANITIZE_STRING);
        $situacao = filter_var($situacao, FILTER_SANITIZE_NUMBER_INT);
        $professor = filter_var($professor, FILTER_SANITIZE_STRING);
        $curso = filter_var($curso, FILTER_SANITIZE_STRING);
        $horario = filter_var($horario, FILTER_SANITIZE_STRING);
        $maximoDeAlunos = filter_var($maximoDeAlunos, FILTER_SANITIZE_NUMBER_INT);
        $sala = filter_var($sala, FILTER_SANITIZE_STRING);
        $duracaoDaAula = filter_var($duracaoDaAula, FILTER_SANITIZE_STRING);
        $dataInicio = filter_var($dataInicio, FILTER_SANITIZE_STRING);
        $dataTermino = filter_var($dataTermino, FILTER_SANITIZE_STRING);
        $ultimaPalavra = filter_var($ultimaPalavra, FILTER_SANITIZE_STRING);
        $ultimaLicao = filter_var($ultimaLicao, FILTER_SANITIZE_NUMBER_INT);
        $ultimoSitato = filter_var($ultimoSitato, FILTER_SANITIZE_NUMBER_INT);
        $fixa = (int)$fixa;
        $timeZone = new DateTimeZone("America/Sao_Paulo");
        $now = new DateTime("now", $timeZone);
        $dateTimeInicio = new DateTime($dataInicio, $timeZone);
        $dateTimeTermino = new DateTime($dataTermino, $timeZone);

        if($fixa != 0 && $fixa != 1){
            $fixa = 1;
        }

        if(!$nome || empty($nome)){
            echo "Por favor, digite o nome da turma.";
        }
        else if(!$desconto || empty($desconto)){
            echo "Por favor, digite o desconto referente a turma.";
        }
        else if(!$fixa && !$dataInicio){
            echo "Por favor, selecione uma data de início para a turma";
        }
        else if(!$fixa && !$dataTermino){
            echo "Por favor, selecione uma data de término para a turma";
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
            echo "Por favor, digite a descrição da turma.";
        }
        else {
            if($fixa == 0){
                $query = "INSERT INTO turmas (nome, desconto, descricao, fixa, dataInicio, dataTermino) VALUES ('{$nome}', '{$desconto}', '{$descricao}', '{$fixa}', '{$dataInicio}', '{$dataTermino}');";
            }
            else {
                $query = "INSERT INTO turmas (nome, desconto, descricao, fixa) VALUES ('{$nome}', '{$desconto}', '{$descricao}', '{$fixa}');";
            }
            $result = $this->conn->query($query);

            if($result){
                return array("erro" => false, "responseText" => "Turma criada com sucesso.");
            }
            return array("erro" => true, "responseText" => "Falha ao criar turma.");
        }
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