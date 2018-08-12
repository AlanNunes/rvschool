<?php
/**
 *
 * @category   Aulas
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

Class Aulas {
	public $IdAula;
	public $Data;
	public $Numero;
	public $Pagina;
  public $Conteudo;
  public $Dictation;
  public $Reading;
  public $IdProgramacaoEstagio;
  public $Professor;
  public $IdTurma;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

  public function IsAulasAlreadyCreated($IdTurma, $IdEstagio)
  {
    $sql = "SELECT * FROM aulas a
            INNER JOIN turmas t ON t.id = a.IdTurma
            WHERE t.id = {$IdTurma} AND t.estagio = {$IdEstagio}";
    $result = $this->conn->query($sql);
    if ($result->num_rows)
    {
      return 1;
    }
    else
    {
      return 0;
    }
  }

  public function GerarAulas($IdTurma, $ProgramacaoEstagio, $StartDate)
  {
    $count = 1;
    $sql = "";
    foreach ($ProgramacaoEstagio as $programacao)
    {
      $idProgramacao = $programacao['IdProgramacao_Estagio'];
      $sql .= "INSERT INTO aulas (Data, Numero, IdProgramacaoEstagio, IdTurma)
            VALUES ('{$StartDate}', '{$count}', {$idProgramacao}, {$IdTurma});";
      $StartDate = $this->AddOneDayToDateAndJumpWeekend($StartDate);
      $count++;
    }
    if ($this->conn->multi_query($sql))
    {
      return 1;
    }
    else
    {
      return $sql;
    }
  }

  public function AddOneDayToDateAndJumpWeekend($date)
  {
    while(true)
    {
      $date = date('Y-m-d', strtotime($date. ' + 1 days'));
      if (!$this->IsWeekend($date))
      {
        break;
      }
    }
    return $date;
  }

  public function IsWeekend($date)
  {
    if (date('l', strtotime($date)) == 'Saturday' || date('l', strtotime($date)) == 'Sunday')
    {
      return 1;
    }
    else
    {
      return 0;
    }
  }
}
?>
