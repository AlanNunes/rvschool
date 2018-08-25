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

	public function getAulasByTurma($IdTurma, $IdEstagio)
	{
		if ($IdEstagio == "null")
		{
			$sql = "SELECT a.IdAula as idAula, a.Data as dataAula, a.numero, pe.PaginaInicial, pe.PaginaFinal FROM aulas a
							INNER JOIN programacao_estagios pe ON pe.IdProgramacao_Estagio = a.IdProgramacaoEstagio
							WHERE a.IdTurma = {$IdTurma}
							ORDER BY a.Data, a.numero ASC";
		}
		else{
			$sql = "SELECT a.IdAula as idAula, a.Data as dataAula, a.numero, pe.PaginaInicial, pe.PaginaFinal FROM aulas a
							INNER JOIN programacao_estagios pe ON pe.IdProgramacao_Estagio = a.IdProgramacaoEstagio
							WHERE a.IdTurma = {$IdTurma}
							AND pe.IdEstagio = {$IdEstagio}
							ORDER BY a.Data, a.numero ASC";
		}
		$result = $this->conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$aulas[] = $row;
			}
			return $aulas;
		}
		else
		{
			return 0;
		}
	}

	// Returna true se a turma já tiver aulas criadas
  public function TurmarHasClassesCreated($IdTurma)
  {
    $sql = "SELECT * FROM aulas a
            INNER JOIN turmas t ON t.id = a.IdTurma
            WHERE t.id = {$IdTurma}";
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
      return 0;
    }
  }

	// Retorna uma array com todas as aulas daquela turma referente àquele estágio
	public function GetAulasFromTurmaByEstagioId($idTurma, $idEstagio)
	{
		$sql = "SELECT * FROM aulas a
						INNER JOIN turmas t ON t.id = a.IdTurma
						INNER JOIN programacao_estagios pe
						ON pe.IdProgramacao_Estagio = a.IdProgramacaoEstagio
						WHERE t.id = {$idTurma} AND pe.IdEstagio = {$idEstagio}";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0)
		{
			while ($row = $result->fetch_assoc())
			{
				$aulas[] = $row;
			}
			return $aulas;
		}
		else
		{
			return 0;
		}
	}

	// Registra uma aula
	public function RegistraAula()
	{
		$sql = "UPDATE aulas SET Pagina = {$this->Pagina},
						Conteudo = '{$this->Conteudo}', Dictation = '{$this->Dictation}',
						Reading = '{$this->Reading}', Professor = {$this->Professor}
						WHERE IdAula = {$this->IdAula}";
		if ($this->conn->query($sql))
		{
			return 1;
		}
		else
		{
			return 0;
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
