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

    case 'getAulasByTurma':
      getAulasByTurma();
      break;

  default:
    echo json_encode(array("erro" => true, "description" => "No Process Found"));
    break;
}

function getAulasByTurma()
{
  $db = new DataBase();
  $conn = $db->getConnection();

  if(isset($_POST['IdTurma']) && !empty($_POST['IdTurma']))
  {
    $aulas = new Aulas($conn);
    $response = $aulas->getAulasByTurma($_POST['IdTurma'], $_POST['IdEstagio']);
    if($response)
    {
      echo json_encode(array("erro" => false, "aulas" => $response));
    }
    else
    {
      echo json_encode(array("erro" => true, "description" => "Essa turma ainda
      não possui um diário de aulas"));
    }
  }
  else{
    echo json_encode(array("erro" => true, "description" => "É necessário informar
    a turma."));
  }
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
    $resp = $Aulas->TurmarHasClassesCreated($IdTurma);
    if ($resp)
    {
      echo json_encode(array("erro" => true, "description" => "A Programação
                        de aulas desta turma já foi gerada."));
    }
    else
    {
      $programacao = $ProgramacaoEstagios->GetAllProgramacaoEstagios();
      if ($programacao)
      {
        $resp = $Aulas->GerarAulas($IdTurma, $programacao, date('Y-m-d'));
        if ($resp)
        {
          echo json_encode(array("erro" => false, "description" => "A programação de aulas
          foi gerada com sucesso.", "IdTurma" => $IdTurma));
        }
        else
        {
          echo json_encode(array("erro" => true, "description" => "Não foi possível
          gerar as aulas."));
        }
      }
      else
      {
        echo json_encode(array("erro" => true, "description" => "Não foi encontrado
        nenhuma programação de estágio para este estágio."));
      }
    }
  }
  else
  {
    echo json_encode(array("erro" => true, "description" => "A Programação
                      de aulas desta turma neste estágio já foi gerada."));
  }
}

function RegistraAula()
{
  if (!empty($_POST["IdAula"]) && !empty($_POST["Pagina"]) &&
  !empty($_POST["Conteudo"]))
  {
    $db = new DataBase();
    $conn = $db->getConnection();
    $Aulas = new Aulas($conn);
    $Aulas->IdAula = $_POST["IdAula"];
    $Aulas->Pagina = $_POST["Pagina"];
    $Aulas->Conteudo = $_POST["Conteudo"];
    $Aulas->Dictation = $_POST["Dictation"];
    $Aulas->Reading = $_POST["Reading"];
    $Aulas->Professor = 20;
    if ($Aulas->RegistraAula())
    {
      echo json_encode(array("erro" => false, "description" => "Aula registrada
      com sucesso."));
    }
    else
    {
      echo json_encode(array("erro" => true, "description" => "Não foi possível
      registrar a aula."));
    }
  }
  else
  {
    echo json_encode(array("erro" => true, "description" => "Não foi possível
    registrar a aula."));
  }
}

// Retorna "null" caso o parâmetro seja nulo
function Nullable($v)
{
    if (empty($v))
    {
      return "NULL";
    }
    else
    {
      $v;
    }
}

 ?>
