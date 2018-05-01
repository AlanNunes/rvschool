<?php
/**
 * This Class is responsable to manipulate all data relationed to 'Situações de Contrato'
 * Created on 29/04/2018
 *
 * @category   Situações de Contrato
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
Class SituacoesContrato {
  private $id;
  private $nome;
  private $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }

  // Lista as situações de contrato em HTML, para serem inseridas em tags '<select>'
  public function listSituacoesDeContrato(){
    $db = new DataBase();
    $conn = $db->getConnection();

    $sql = "SELECT * FROM situacoes_de_contratos";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
      $id = $row["id"];
      $nome = $row["nome"];
      echo "<option id='{$id}'>{$nome}</option>";
    }
  }
}
 ?>
