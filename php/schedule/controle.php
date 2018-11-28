<?php
header('Content-Type: application/json');
require_once('../database/DataBase.php');
date_default_timezone_set('America/Sao_Paulo');
// echo var_dump($_POST);
if(!empty($_POST["acao"]) && isset($_POST["acao"])){
  switch ($_POST["acao"]) {
    case 'salvar':
    salvar();
    break;

    default:
    # code...
    break;
  }
}

function salvar() {
  $db = new DataBase();
  $conn = $db->getConnection();
  $idTurma = $_POST['idTurma'];
  $idHorario = $_POST['idHorario'];
  $monday = $_POST['monday'];
  $tuesday = $_POST['tuesday'];
  $wednesday = $_POST['wednesday'];
  $thursday = $_POST['thursday'];
  $friday = $_POST['friday'];
  $saturday = $_POST['saturday'];
  $erro = false;
  // Monday
  $data = date('Y-m-d',strtotime('Monday this week'));
  $sql = "SELECT IdSchedule FROM schedules WHERE IdTurma = {$idTurma}
  AND Data = '{$data}'";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    $sql = "UPDATE schedules SET IdTurma = {$idTurma},
     IdFuncionario = {$monday}, IdHorario = {$idHorario} WHERE IdTurma = {$idTurma} AND Data = '{$data}'";
  }else{
    $sql = "INSERT INTO schedules (IdTurma, IdFuncionario, Data, IdHorario) VALUES ({$idTurma}, {$monday}, '{$data}', {$idHorario})";
    echo $sql;
  }
  if(!$conn->query($sql)) {
    $erro = true;
  }
  // Fim Monday
  // Tuesday'
  $data = date('Y-m-d',strtotime('Tuesday this week'));
  $sql = "SELECT IdSchedule FROM schedules WHERE IdTurma = {$idTurma}
  AND Data = '{$data}'";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    $sql = "UPDATE schedules SET IdTurma = {$idTurma},
    IdFuncionario = {$tuesday}, IdHorario = {$idHorario} WHERE IdTurma = {$idTurma} AND Data = '{$data}'";
  }else{
    $sql = "INSERT INTO schedules (IdTurma, IdFuncionario, Data, IdHorario) VALUES ({$idTurma}, {$tuesday}, '{$data}', {$idHorario})";
  }
  if(!$conn->query($sql)) {
    $erro = true;
  }
  // Fim Tuesday
  // Tuesday
  $data = date('Y-m-d',strtotime('Tuesday this week'));
  $sql = "SELECT IdSchedule FROM schedules WHERE IdTurma = {$idTurma}
  AND Data = '{$data}'";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    $sql = "UPDATE schedules SET IdTurma = {$idTurma},
    IdFuncionario = {$tuesday}, IdHorario = {$idHorario} WHERE IdTurma = {$idTurma} AND Data = '{$data}'";
  }else{
    $sql = "INSERT INTO schedules (IdTurma, IdFuncionario, Data, IdHorario) VALUES ({$idTurma}, {$tuesday}, '{$data}', {$idHorario})";
  }
  if(!$conn->query($sql)) {
    $erro = true;
  }
  // Fim Tuesday
  // Wednesday
  $data = date('Y-m-d',strtotime('Wednesday this week'));
  $sql = "SELECT IdSchedule FROM schedules WHERE IdTurma = {$idTurma}
  AND Data = '{$data}'";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    $sql = "UPDATE schedules SET IdTurma = {$idTurma}, Id
    Funcionario = {$wednesday}, IdHorario = {$idHorario} WHERE IdTurma = {$idTurma} AND Data = '{$data}'";
  }else{
    $sql = "INSERT INTO schedules (IdTurma, IdFuncionario, Data, IdHorario) VALUES ({$idTurma}, {$wednesday}, '{$data}', {$idHorario})";
  }
  if(!$conn->query($sql)) {
    $erro = true;
  }
  // Fim Wednesday
  // Thursday
  $data = date('Y-m-d',strtotime('Thursday this week'));
  $sql = "SELECT IdSchedule FROM schedules WHERE IdTurma = {$idTurma}
  AND Data = '{$data}'";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    $sql = "UPDATE schedules SET IdTurma = {$idTurma}, I
    dFuncionario = {$thursday}, IdHorario = {$idHorario} WHERE IdTurma = {$idTurma} AND Data = '{$data}'";
  }else{
    $sql = "INSERT INTO schedules (IdTurma, IdFuncionario, Data, IdHorario) VALUES ({$idTurma}, {$thursday}, '{$data}', {$idHorario})";
  }
  if(!$conn->query($sql)) {
    $erro = true;
  }
  // Fim Thursday
  // Friday
  $data = date('Y-m-d',strtotime('Friday this week'));
  $sql = "SELECT IdSchedule FROM schedules WHERE IdTurma = {$idTurma}
  AND Data = '{$data}'";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    $sql = "UPDATE schedules SET IdTurma = {$idTurma},
     IdFuncionario = {$friday}, IdHorario = {$idHorario} WHERE IdTurma = {$idTurma} AND Data = '{$data}'";
  }else{
    $sql = "INSERT INTO schedules (IdTurma, IdFuncionario, Data, IdHorario) VALUES ({$idTurma}, {$friday}, '{$data}', {$idHorario})";
  }
  if(!$conn->query($sql)) {
    $erro = true;
  }
  // Fim Friday
  // Saturday
  $data = date('Y-m-d',strtotime('Saturday this week'));
  $sql = "SELECT IdSchedule FROM schedules WHERE IdTurma = {$idTurma}
  AND Data = '{$data}'";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    $sql = "UPDATE schedules SET IdTurma = {$idTurma}, I
    dFuncionario = {$saturday}, IdHorario = {$idHorario} WHERE IdTurma = {$idTurma} AND Data = '{$data}'";
  }else{
    $sql = "INSERT INTO schedules (IdTurma, IdFuncionario, Data, IdHorario) VALUES ({$idTurma}, {$saturday}, '{$data}', {$idHorario})";
  }
  if(!$conn->query($sql)) {
    $erro = true;
  }
  // Fim Saturday
  echo $erro;
}
?>
