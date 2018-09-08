<?php
/**
 *
 * @category   Rate
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

Class RatingAulas {
	public $IdRatingAula;
	public $Rate;
  public $Feedback;
  public $IdUsuario;
	public $IdAula;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

  public function Add()
  {
    $sql = "INSERT INTO rating_aulas (Rate, Feedback, IdUsuario, IdAula)
    VALUES ({$this->Rate}, '{$this->Feedback}', {$this->IdUsuario},
		{$this->IdAula})";
    if($this->conn->query($sql)){
      return 1;
    }else{
      return $sql;
    }
  }

}
?>
