<?php
/**
 *
 * Created on 09/05/2018
 *
 * @category   Contratos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

interface iDocumentos {
  public function write();
}
Class DocumentosMatricula implements iDocumentos {
  protected $id;
  protected $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }
}
 ?>
