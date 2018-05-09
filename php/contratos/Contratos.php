<?php
/**
 * Registra contrato, edita e exclui
 * Created on 29/04/2018
 *
 * @category   Contratos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
Class Contratos {
  private $id;
  private $numero;
  private $aluno;
  private $situacao;
  private $tipo;
  private $dataInicio;
  private $dataTermino;
  private $contratoTurmas;
  private $contratoAulasLivres;
  private $atendente1;
  private $atendente2;
  private $atendente3;
  private $dataContrato;
  private $contratante;
  private $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }

  // Lista todos os contratos relacionado ao usuário. PS: as listagem retorna um HTML
  public function getContratosByUserId($userId){
    $sql = "SELECT c.dataInicio, c.numero, s.nome FROM contratos c
    INNER JOIN situacoes_de_contratos s ON c.situacao = s.id AND aluno = {$userId}";
    $result = $this->conn->query($sql);
    return $result;
  }

  // Matricula aluno e retorna o id da matrícula. Se o procedimento falhar retorna nulo
  public function matriculaAluno($aluno, $turma, $dataMatricula, $dataInicioAtividades){
    $sql = "INSERT INTO matriculas (aluno, turma, dataMatricula, dataInicioAtividades)
            VALUES ('{$aluno}', {$turma}, '{$dataMatricula}', '{$dataInicioAtividades}')";
    if($this->conn->query($sql)){
      $matriculaId = $this->conn->insert_id;
      return array("erro" => true, "description" => "Aluno matriculado com sucesso.", "matriculaId" => $matriculaId);
    }else{
      return array("erro" => true, "description" => "Aluno não matriculado.", "matriculaId" => null);
    }
  }

  public function cadastraContrato($data, $matriculaId){
    $aluno = $data["aluno"];
    $turma = $data["turma"];
    $dataMatricula = $data["dataMatricula"];
    $dataInicioAtividades = $data["dataInicioAtividades"];
    $numeroContrato = $data["numeroContrato"];
    $situacao = $data["situacao"];
    $tipo = $data["tipo"];
    $dataInicio = $data["dataInicio"];
    $dataTermino = $data["dataTermino"];
    $contratoTurmas = $data["contratoTurmas"];
    $contratoAulasLivres = $data["contratoAulasLivres"];
    $atendente1 = $data["atendente1"];
    $atendente2 = $data["atendente2"];
    $atendente3 = $data["atendente3"];
    $dataContrato = $data["dataContrato"];
    $contratante = $data["contratante"];

    $sql = "INSERT INTO contratos (numero, aluno, situacao, tipo, dataInicio, dataTermino, contratoTurmas, contratoAulasLivres,
            atendente1, atendente2, atendente3, dataContrato, contratante, matricula) VALUES ('{$numeroContrato}', {$aluno},
            {$situacao}, {$dataInicio}, {$dataTermino}, {$contratoTurmas}, {$contratoAulasLivres}, {$atendente1},
            {$atendente2}, {$atendente3}, '{$dataContrato}', {$contratante}, {$matriculaId})";
  }
}
 ?>
