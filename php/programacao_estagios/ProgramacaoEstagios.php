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

  public function GetProgramacaoEstagioByEstagio($IdEstagio)
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
}
?>
