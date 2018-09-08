<h4>Suas últimas 14 aulas</h4>
<div class="container-fluid" id="content" style="width: 100%; margin-left: 0px;">
  <div class="table-responsive">
    <table class="table table-hover table-condensed table-sm" style ="cursor: pointer;">
      <thead class="thead-dark">
      <tr style="text-align: center;">
        <th scope="col">DATA</th>
        <th scope="col">DIA</th>
        <th scope="col">PÁGINA</th>
        <th scope="col">CONTEÚDO</th>
        <th scope="col">DICTATION</th>
        <th scope="col">READING</th>
        <th scope="col">ESTÁGIO</th>
        <th scope="col">LIVRO</th>
        <th scope="col">PROFESSOR</th>
      </tr>
      </thead>
      <tbody id="tableContent" style="text-align: center;">
<?php
// Mostra as últimas aulas que o aluno teve na turma
if($_SESSION["roleId"] == 4){
  $matricula = $_SESSION['matricula'];
  $sql = "SELECT al.Data, al.Pagina, al.Conteudo, al.Dictation ,
  al.Reading, f.nome as 'Professor', e.nome as 'Estagio',
  l.Nome as 'Livro'
  FROM alunos a
  INNER JOIN matriculas m ON a.id = m.aluno
  INNER JOIN turmas t ON t.id = m.turma
  INNER JOIN aulas al ON t.id = al.IdTurma
  INNER JOIN funcionarios f ON al.Professor = f.id
  INNER JOIN estagios e ON t.estagio = e.id
  INNER JOIN livros l ON e.IdLivro = l.IdLivro
  WHERE a.matricula = '{$matricula}'
  ORDER BY al.data DESC
  LIMIT 14";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $data = date('d/m/Y', strtotime($row['Data']));
      $getDay = date('D', strtotime($row['Data']));
      $diaDaSemana = $semana["$getDay"];
      $pagina = ($row['Pagina'] == null)?:"-";
      $conteudo = ($row['Conteudo'] == null)?:"-";
      $dictation = ($row['Dictation'] == null)?:"-";
      $reading = ($row['Reading'] == null)?:"-";
      $professorNomes = split_name($row['Professor']);
      $professor = $professorNomes[0]." ".$professorNomes[1];
      $estagio = $row['Estagio'];
      $livro = $row['Livro'];
      echo "<tr>";
      echo "<td align='center'>{$data}</td>";
      echo "<td align='center'>{$diaDaSemana}</td>";
      echo "<td align='center'>{$pagina}</td>";
      echo "<td align='center'>{$conteudo}</td>";
      echo "<td align='center'>{$dictation}</td>";
      echo "<td align='center'>{$reading}</td>";
      echo "<td align='center'>{$estagio}</td>";
      echo "<td align='center'>{$livro}</td>";
      echo "<td align='center'>{$professor}</td>";
      echo "</tr>";
    }
  }else{
    echo "<tr><td colspan=9>Sua turma não teve aula durante os últimos 7 dias</td></tr>";
  }
}
 ?>
    </tbody>
    </table>
  </div>
</div>
