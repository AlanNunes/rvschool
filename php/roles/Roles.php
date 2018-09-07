<?php
/**
 *
 * @category   Roles
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

Class Roles {
	public $RoleId;
	public $RoleNome;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}
}
?>
