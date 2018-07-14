<?php
/**
 *
 * @category   Situações de Parcelas
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
Class SituacoesParcelas {
	/**
	* @var integer
	*/
	public $id;
	/**
	* @var integer
	*/
	public $nome;

	private $conn;

	/**
	* Construtor
	*
	*/
	public function __construct($db)
  {
		$this->conn = $db;
	}

  public function getSituacoes()
  {
    $sql = "SELECT * FROM situacoes_de_parcelas";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0)
    {
      while ($row = $result->fetch_assoc())
      {
        $situacoes[] = $row;
      }
      return $situacoes;
    }
    else
    {
      return 0;
    }
  }
}
?>
