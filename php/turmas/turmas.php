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

	public function createTurma($nome, $situacao, $professor, $estagio, $curso, $horario, $maximoDeAlunos,
	 $sala, $duracaoDaAula, $dataInicio, $dataTermino, $ultimaPalavra, $ultimaLicao, $ultimoSitato){
        $nome = filter_var(trim($nome), FILTER_SANITIZE_STRING);
        $situacao = filter_var($situacao, FILTER_SANITIZE_NUMBER_INT);
        $situacao = (int)$situacao;
        $professor = filter_var($professor, FILTER_SANITIZE_STRING);
        $estagio = filter_var($estagio, FILTER_SANITIZE_STRING);
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
        $timeZone = new DateTimeZone("America/Sao_Paulo");
        $now = new DateTime("now", $timeZone);
        $dateTimeInicio = new DateTime($dataInicio, $timeZone);
        $dateTimeTermino = new DateTime($dataTermino, $timeZone);

        if(!$nome || empty($nome)){
            echo "Por favor, digite o nome da turma.";
        }
        else if(is_nan($situacao)){
            echo "Por favor, selecione a situação da turma.";
        }
        else if(!$sala || empty($sala)) {
            echo "Por favor, selecione uma sala para a turma.";
        }
        else if(!$duracaoDaAula || empty($duracaoDaAula)) {
            echo "Por favor, selecione a duracao da aula.";
        }
        else if(!$horario || empty($horario)) {
            echo "Por favor, selecione o horario da turma.";
        }
        else if(!$maximoDeAlunos || empty($maximoDeAlunos)) {
            echo "Por favor, digite o máximo de alunos permitido na turma.";
        }
        else if(!$dataInicio){
            echo "Por favor, selecione uma data de início para a turma";
        }
        else if(!$dataTermino){
            echo "Por favor, selecione uma data de término para a turma";
        }
        else if($dateTimeInicio < $now){
            echo "Por favor, selecione uma data de início que não esteja no passado.";
        }
        else if($dateTimeTermino < $dateTimeInicio){
            echo "Por favor, selecione uma data de término após a data de início.";
        }
        else if($dateTimeInicio == $dateTimeTermino){
            echo "Por favor, selecione datas distintas.";
        }
        else if(!$estagio || empty($estagio)){
            echo "Por favor, selecione o estágio da turma.";
        }
        else if(!$curso || empty($curso)){
            echo "Por favor, selecione o curso da turma.";
        }
        else if(!$ultimaPalavra || empty($ultimaPalavra)){
            echo "Por favor, digite a última palavra da turma.";
        }
        else if(!$ultimaLicao || empty($ultimaLicao)) {
            echo "Por favor, digite a última licao da turma.";
        }
        else if(!$ultimoSitato || empty($ultimoSitato)) {
            echo "Por favor, digite o último sitato da turma.";
        }
        else {
            $query = "INSERT INTO turmas(nome, situacao, professor, estagio, curso, horario, maximoDeAlunos, sala,
             duracaoDaAula, dataInicio, dataTermino, ultimaPalavra, ultimaLicao, ultimoSitato) VALUES ('{$nome}',
              '{$situacao}', '{$professor}', '{$estagio}', '{$curso}', '{$horario}', '{$maximoDeAlunos}', '{$sala}',
               '{$duracaoDaAula}', '{$dataInicio}', '{$dataTermino}', '{$ultimaPalavra}', '{$ultimaLicao}', '{$ultimoSitato}');";
            $result = $this->conn->query($query);

            if($result){
                return array("erro" => false, "responseText" => "Turma criada com sucesso.");
            }
            return array("erro" => true, "responseText" => "Falha ao criar turma.");
        }
	}

	public function updateTurma($id, $nome, $situacao, $professor, $estagio, $curso, $horario, $maximoDeAlunos,
    	 $sala, $duracaoDaAula, $dataInicio, $dataTermino, $ultimaPalavra, $ultimaLicao, $ultimoSitato){
    	    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    	    $id = (int)$id;
            $nome = filter_var(trim($nome), FILTER_SANITIZE_STRING);
            $situacao = filter_var($situacao, FILTER_SANITIZE_NUMBER_INT);
            $situacao = (int)$situacao;
            $professor = filter_var($professor, FILTER_SANITIZE_STRING);
            $estagio = filter_var($estagio, FILTER_SANITIZE_STRING);
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
            $timeZone = new DateTimeZone("America/Sao_Paulo");
            $now = new DateTime("now", $timeZone);
            $dateTimeInicio = new DateTime($dataInicio, $timeZone);
            $dateTimeTermino = new DateTime($dataTermino, $timeZone);

            if(!$nome || empty($nome)){
                echo "Por favor, digite o nome da turma.";
            }
            else if(is_nan($situacao)){
                echo "Por favor, selecione a situação da turma.";
            }
            else if(!$sala || empty($sala)) {
                echo "Por favor, selecione uma sala para a turma.";
            }
            else if(!$duracaoDaAula || empty($duracaoDaAula)) {
                echo "Por favor, selecione a duracao da aula.";
            }
            else if(!$horario || empty($horario)) {
                echo "Por favor, selecione o horario da turma.";
            }
            else if(!$maximoDeAlunos || empty($maximoDeAlunos)) {
                echo "Por favor, digite o máximo de alunos permitido na turma.";
            }
            else if(!$dataInicio){
                echo "Por favor, selecione uma data de início para a turma";
            }
            else if(!$dataTermino){
                echo "Por favor, selecione uma data de término para a turma";
            }
            else if($dateTimeInicio < $now){
                echo "Por favor, selecione uma data de início que não esteja no passado.";
            }
            else if($dateTimeTermino < $dateTimeInicio){
                echo "Por favor, selecione uma data de término após a data de início.";
            }
            else if($dateTimeInicio == $dateTimeTermino){
                echo "Por favor, selecione datas distintas.";
            }
            else if(!$estagio || empty($estagio)){
                echo "Por favor, selecione o estágio da turma.";
            }
            else if(!$curso || empty($curso)){
                echo "Por favor, selecione o curso da turma.";
            }
            else if(!$ultimaPalavra || empty($ultimaPalavra)){
                echo "Por favor, digite a última palavra da turma.";
            }
            else if(!$ultimaLicao || empty($ultimaLicao)) {
                echo "Por favor, digite a última licao da turma.";
            }
            else if(!$ultimoSitato || empty($ultimoSitato)) {
                echo "Por favor, digite o último sitato da turma.";
            }
            else {
                $query = "UPDATE turmas SET nome = '{$nome}', situacao = {$situacao}, professor = '{$professor}',
                 estagio = '{$estagio}', curso = '{$curso}', horario = '{$horario}', maximoDeAlunos = {$maximoDeAlunos},
                  sala = '{$sala}', duracaoDaAula = {$duracaoDaAula}, dataInicio = '{$dataInicio}', dataTermino = '{$dataTermino}',
                   ultimaPalavra = '{$ultimaPalavra}', ultimaLicao = {$ultimaLicao}, ultimoSitato = {$ultimoSitato} WHERE id = {$id}";
                   $result = $this->conn->query($query);

                if($result){
                    return array("erro" => false, "responseText" => "Turma atualizada com sucesso.");
                }
                return array("erro" => true, "responseText" => "Falha ao atualizar turma.");
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