<?php
include('../database/DataBase.php');
$db = new DataBase();
$conn = $db->getConnection();
var_dump($conn);
$count = 1;
$j = 1;
for($i = 53; $j <= 128; $i+=3)
{
  $j = $i+2;
  $sql = "insert into programacao_estagios (Numero, PaginaInicial, PaginaFinal,
          IdEstagio) values ({$count}, {$i}, {$j}, 3)";
  $count++;
  printf($sql);
  $conn->query($sql);
}
 ?>
