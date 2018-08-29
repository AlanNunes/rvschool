<?php
/**
 *
 * @category   Login
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

Class LogAcessos {
	public $logAcessoId;
    public $matricula;
    public $data;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
    }

    public function RegistraLog($matricula, $data)
    {
        $sql = "INSERT INTO log_acessos (matricula, data)
                VALUES ('{$matricula}', '{$data}')";
        if($this->conn->query($sql)){
            return 1;
        }else{
            return 0;
        }
    }
}
?>
