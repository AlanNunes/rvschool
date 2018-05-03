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
}
 ?>
