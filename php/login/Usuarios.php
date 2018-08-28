<?php
/**
 *
 * @category   Login
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

Class Usuarios {
	public $usuarioId;
	public $matricula;
	public $senha;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
    }

    public function registerUser($matricula, $senha)
    {
        $sql = "INSERT INTO usuarios (matricula, senha)
                VALUES ('{$matricula}', '{$senha}')";
        if($this->conn->query($sql)){
            return 1;
        }else{
            return 0;
        }
    }
}
?>
