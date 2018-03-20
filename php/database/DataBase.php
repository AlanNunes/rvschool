<?php
class DataBase {
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbName = "rvschool";
	private $conn;

	public function __construct(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);
		mysqli_set_charset($this->conn,"utf8");
	}

	public function getConnection(){
		return $this->conn;
	}
}
?>