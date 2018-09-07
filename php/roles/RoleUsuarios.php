<?php
/**
 *
 * @category   Roles
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

Class RoleUsuarios {
	public $RoleUsuarioId;
	public $UsuarioId;
  public $RoleId;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

  public function Add()
  {
    $sql = "INSERT INTO role_usuarios (usuarioId, roleId) VALUES ({$this->UsuarioId}, {$this->RoleId})";
    if($this->conn->query($sql)){
      return 1;
    }else{
      return 0;
    }
  }

  public function Delete()
  {
    $sql = "DELETE FROM role_usuarios WHERE roleUsuarioId = {$this->RoleUsuarioId}";
    if($this->conn->query($sql)){
      return 1;
    }else{
      return 0;
    }
  }
}
?>
