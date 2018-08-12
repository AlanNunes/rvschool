<?php
/**
 * Created on 12/08/2018
 *
 * @category   Programação de Aulas
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
include_once('../database/DataBase.php');
include_once('Aulas.php');
include_once('../turmas/turmas.php');
include_once('../programacao_estagios/ProgramacaoEstagios.php');

$process = $_POST["acao"];

switch ($process) {
  case 'gerarProgramacaoAulas':
    gerarProgramacaoAulas();
    break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function gerarProgramacaoAulas()
{
  $db = new DataBase();
  $conn = $db->getConnection();

  if (isset($_POST['IdTurma']) && !empty($_POST['IdTurma']))
  {
    $IdTurma = $_POST['IdTurma'];
    $Turma = new Turmas($conn);
    $Aulas = new Aulas($conn);
    $ProgramacaoEstagios = new ProgramacaoEstagios($conn);
    $IdEstagio = $Turma->GetTurmaEstagio($IdTurma);
    $resp = $Aulas->IsAulasAlreadyCreated($IdTurma, $IdEstagio);
    if ($resp)
    {
      echo json_encode(array("erro" => true, "description" => "A Programação
                        de aulas desta turma para este estágio já foi gerada."));
    }
    else
    {
      $programacao = $ProgramacaoEstagios->GetProgramacaoEstagioByEstagio($IdEstagio);
      if ($programacao)
      {
        $resp = $Aulas->GerarAulas($IdTurma, $programacao, date('Y-m-d'));
        echo $resp;
      }
      else
      {
        echo json_encode(array("erro" => true, "description" => "Não foi encontrado
                                uma programação de estágio para este estágio."));
      }
    }
  }
  else
  {
    echo 0;
  }
}

 ?>
