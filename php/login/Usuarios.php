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

	public function MudaSenha($matricula, $senha, $senhaConfirm){
		$senha = hash('sha256', $senha);
		$sql = "UPDATE usuarios SET senha = '{$senha}'
		WHERE matricula = '{$matricula}'";
		if($this->conn->query($sql)){
			return 1;
		}else{
			return 0;
		}
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

    public function deleteByMatricula($m)
    {
    $sql = "DELETE FROM usuarios WHERE matricula = '{$m}'";
        if($this->conn->query($sql)){
            return 1;
        }else{
            return 0;
        }
    }

    public function GetUltimoLoginByMatricula($m)
    {
        $sql = "SELECT * FROM log_acessos ORDER BY data DESC LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }else{
            return 0;
        }
    }

    public function Loga($m, $s)
    {
        $s = hash('sha256', $s);
        $sql = "SELECT usuarioId, matricula FROM usuarios
        WHERE matricula = '{$m}' AND senha = '{$s}'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }else{
            return 0;
        }
    }
}
?>
