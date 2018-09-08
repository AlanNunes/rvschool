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


	public static function LogOff()
	{
		session_unset();
		session_destroy();
	}

	public function SetSessions($usuarioId, $matricula, $tipoUsuario)
	{
		session_unset();
		session_destroy();
		session_start();
		$_SESSION["usuarioId"] = $usuarioId;
		$_SESSION["matricula"] = $matricula;
		$_SESSION["tipoUsuario"] = $tipoUsuario;
		if($tipoUsuario == 'f'){
			$sql = "SELECT f.id, f.nome, r.roleId, f.avatarPath FROM funcionarios f
			INNER JOIN roles r ON f.cargo = r.roleId WHERE f.matricula = '{$matricula}'";
		}else{
			$sql = "SELECT id, nome FROM alunos WHERE matricula = '{$matricula}'";
		}
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$_SESSION["funcionarioId"] = $row['id'];
			$_SESSION["nome"] = $row['nome'];
			$_SESSION["roleId"] = $row['roleId'];
			$_SESSION["avatarPath"] = $row['avatarPath'];
			return 1;
		}else{
			return 0;
		}
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

    public function registerUser($matricula, $senha, $tipoUsuario)
    {
        $sql = "INSERT INTO usuarios (matricula, senha, tipoUsuario)
                VALUES ('{$matricula}', '{$senha}', '{$tipoUsuario}')";
        if($this->conn->query($sql)){
            return $this->conn->insert_id;
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
        $sql = "SELECT * FROM log_acessos WHERE matricula = '{$m}' LIMIT 1";
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
        $sql = "SELECT usuarioId, matricula, tipoUsuario FROM usuarios
        WHERE matricula = '{$m}' AND senha = '{$s}'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }else{
            return 0;
        }
    }

		public function GetUsuarioIdByMatricula($m)
		{
			$sql = "SELECT usuarioId FROM usuarios WHERE matricula = '{$m}' LIMIT 1";
			$result = $this->conn->query($sql);
			if($result->num_rows > 0){
					$row = $result->fetch_assoc();
					return $row['usuarioId'];
			}else{
					return 0;
			}
		}
}
?>
