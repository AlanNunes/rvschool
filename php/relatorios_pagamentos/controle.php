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
  $sql = "SELECT f.aulaInterna as 'ValorAulaInterna',
          f.aulaExterna as 'ValorAulaExterna',
          h.horarioInicio as 'Inicio', h.horarioFim
          as 'Fim', f.nome, a.data
          FROM funcionarios f
          INNER JOIN aulas a ON f.id = a.professor
          INNER JOIN turmas t ON a.IdTurma = t.id
          INNER JOIN horarios h ON t.IdHorario = h.IdHorario
          WHERE f.id = {$idProfessor}
          ORDER BY a.data ASC";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
    $relatorio[] = $row;
  }
  $relatorioAgrupado = agrupaPorData($relatorio);
  echo $relatorioAgrupado;
}

function agrupaPorData($relatorio){
  $result = [];
  $dataInicial = $relatorio[0]['data'];
  $grupo = 0;
  $posicao = 0;
  for($i = 0; $i < sizeof($relatorio); $i++){
    if($relatorio[$i]['data'] == $dataInicial){
      echo 'birl';
      $result[$grupo][$posicao] = $relatorio[$i];
      $posicao++;
    }else{
      echo 'eita';
      $posicao = 0;
      $grupo++;
      $dataInicial = $relatorio[$i]['data'];
      $result[$grupo][$posicao] = $relatorio[$i];
    }
  }
  return $result;
}
 ?>
