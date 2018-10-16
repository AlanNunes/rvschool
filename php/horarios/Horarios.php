<?php
/**
 *
 * @category   Turmas
 * @author     Alan Nunes da Silva <lunanunesrpg@gmail.com>
 */

Class Horarios {
	public $Id;
	public $HorarioInicio;
	public $HorarioFim;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function GetAll()
	{
		$query = "SELECT IdHorario, TIME_FORMAT(HorarioInicio, '%H:%i')
              as HorarioInicio, TIME_FORMAT(HorarioFim, '%H:%i') as HorarioFim
              FROM horarios";
		$result = $this->conn->query($query);
		if ($result->num_rows > 0)
		{
			return $result;
		}
		else
		{
			return 0;
		}
	}
}
?>
