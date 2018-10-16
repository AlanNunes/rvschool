<?php
require_once('php/database/DataBase.php');
$db = new DataBase();
$conn = $db->getConnection();

date_default_timezone_set('America/Sao_Paulo');


$sql="SELECT t.nome as turma, t.sala, t.estagio, h.HorarioInicio, f.nome FROM turmas t
JOIN aulas a ON a.IdTurma = t.id
JOIN horarios h ON t.IdHorario = h.IdHorario
JOIN funcionarios f ON f.id = t.professor
WHERE a.Data = CURDATE()";

$result = $conn->query($sql);

echo
"
<div class = 'container-fluid'>
  <div class = 'title-modal-schedule'>
    <center>
      <h4>SCHEDULE -"; echo date('d/m/Y');  echo "</h4>
    </center>
  </div>

  <div class = 'modal-schedule'>
      <table  style='width:100%'>
        <thead>
          <tr class= 'thead-schedule'>
            <th>TURMA</th>
            <th>SALA</th>
            <th>ESTÁGIO</th>
            <th>PROFESSOR</th>
            <th>HORÁRIO</th>
          </tr>
        </thead>";

  //while($row = mysql_fetch_array($result))
    while($row = $result->fetch_assoc())
    {
      echo "<tbody>";
      echo "<tr class = 'tbody-schedule'>";
      echo "<td>" . $row['turma'] . "</td>";
      echo "<td>" . $row['sala'] . "</td>";
      echo "<td>" . $row['estagio'] . "</td>";
      echo "<td>" . $row['nome'] . "</td>";
      echo "<td>" . $row['HorarioInicio'] . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
?>
