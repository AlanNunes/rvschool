<?php
/**
 *
 * @category   Programacão de Estagios
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

Class ProgramacaoEstagios {
	public $IdProgramacao_Estagio;
	public $Numero;
	public $PaginaInicial;
	public $PaginaFinal;
  public $IdEstagio;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	// Retorna uma array contendo o id das programações de acordo com o estágio
  public function GetProgramacaoEstagioByEstagioById($IdEstagio)
  {
    $sql = "SELECT IdProgramacao_Estagio FROM programacao_estagios
            WHERE IdEstagio = {$IdEstagio}";
    $result = $this->conn->query($sql);
    if ($result->num_rows)
    {
      while ($row = $result->fetch_assoc())
      {
        $prog[] = $row;
      }
      return $prog;
    }
    else
    {
      return 0;
    }
  }

	// Retorna uma array contendo o id de todas as programações de estágio
  public function GetAllProgramacaoEstagios()
  {
    $sql = "SELECT IdProgramacao_Estagio, Numero FROM programacao_estagios";
    $result = $this->conn->query($sql);
    if ($result->num_rows)
    {
      while ($row = $result->fetch_assoc())
      {
        $prog[] = $row;
      }
      return $prog;
    }
    else
    {
      return 0;
    }
  }
}
?>
