<?php
/**
 * Created on 15/10/2018
 *
 * @category   Relatório de Pagamentos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
include_once('../database/DataBase.php');

$process = $_POST["acao"];

switch ($process) {
  case 'pagamento':
    pagamento();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function pagamento(){
  $db = new DataBase();
  $conn = $db->getConnection();
  $idProfessor = $_POST["IdProfessor"];
  $referencia = $_POST["Referencia"];
  list($refMes, $refAno) = explode('/', $referencia);
  $sql = "SELECT f.aulaInterna as 'ValorAulaInterna',
          f.aulaExterna as 'ValorAulaExterna',
          h.horarioInicio as 'Inicio', h.horarioFim
          as 'Fim', f.nome, a.data, f.aulaInterna, f.aulaExterna,
          t.nome as 'Turma', f.nome as 'ProfessorNome'
          FROM funcionarios f
          INNER JOIN aulas a ON f.id = a.professor
          INNER JOIN turmas t ON a.IdTurma = t.id
          INNER JOIN horarios h ON t.IdHorario = h.IdHorario
          WHERE f.id = {$idProfessor}
          AND YEAR(a.data) = '{$refAno}' AND MONTH(a.data) = '{$refMes}'
          ORDER BY a.data ASC";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $relatorio[] = $row;
    }
    $totalAulas = sizeof($relatorio);
    $valorAula = $relatorio[0]['aulaInterna'];
    $relatorioAgrupado = agrupaPorData($relatorio);
    echo json_encode(array('aulas' => $relatorioAgrupado, 'totalAulas' => $totalAulas,
    'valorAula' => $valorAula, 'valorTotal' => $totalAulas*$valorAula,
    'referencia' => $referencia, 'professorNome', $relatorio[0]['ProfessorNome']));
  }else{
    echo 0;
  }
}

function agrupaPorData($relatorio){
  $result = [];
  $dataInicial = $relatorio[0]['data'];
  $grupo = 0;
  $posicao = 0;
  for($i = 0; $i < sizeof($relatorio); $i++){
    if($relatorio[$i]['data'] == $dataInicial){
      $result[$grupo][$posicao] = $relatorio[$i];
      $posicao++;
    }else{
      $posicao = 0;
      $grupo++;
      $dataInicial = $relatorio[$i]['data'];
      $result[$grupo][$posicao] = $relatorio[$i];
    }
  }
  return $result;
}
 ?>
