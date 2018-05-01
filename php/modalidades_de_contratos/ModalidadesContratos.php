<?php
/**
 * This Class is responsable to manipulate all data relationed to 'Modalidades de Contratos'
 * Created on 29/04/2018
 *
 * @category   Modalidades de Contratos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
Class ModalidadesContratos {
  private $id;
  private $nome;
  private $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }

  // Lista as modalidades de contratos em HTML como radio box'
  public function listSituacoesDeContrato(){
    $db = new DataBase();
    $conn = $db->getConnection();

    $sql = "SELECT * FROM modalidades_de_contratos";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
      $id = $row["id"];
      $nome = $row["nome"];
      echo "<option id='{$id}'>{$nome}</option>";
    }
  }
}
 ?>
