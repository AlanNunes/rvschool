<link rel="stylesheet" href="css/star-rating.css">
<!-- <link rel="stylesheet" href="css/font-awesome.css"> -->
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
        <th scope="col">AVALIR AULA</th>
      </tr>
      </thead>
      <tbody id="tableContent" style="text-align: center;">
<?php
// Mostra as últimas aulas que o aluno teve na turma
if($_SESSION["roleId"] == 4){
  $matricula = $_SESSION['matricula'];
  $sql = "SELECT al.IdAula, al.Data, al.Pagina, al.Conteudo, al.Dictation ,
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
  $count = 0;
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
      $idAula = $row['IdAula'];
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
      echo "<td align='center'><button type='button' class='btn btn-outline-success' onclick='showRating({$idAula})'>Avaliar</button></td>";
      echo "</tr>";
      $count++;
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
<!-- Modal -->
<div class="modal fade" id="rating-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Avaliação da Aula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <label for="rating" style="margin-left:0px;">Avaliação:</label> -->
        <div class="form-row">
          <div class="form-group col-md">
            <label for="rating" style="margin-left:0px!important;margin-right: 80%!important;">
              <strong>Estrelas</strong><span style="color: red">*</span>
            </label>
            <br/>
            <center>
            <fieldset class="rating" id="rating" onclick="rating(this)">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
            </fieldset>
          </center>
          </div>
      </div>
        <!-- <br/> -->
        <div class="form-group col-md">
          <label for="texto"><strong>Escreva Algo:</strong></label>
          <textarea id="texto" class="form-control"></textarea>
        </div>
        <div class="form-group col-md">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="anonimo" checked>
            <label class="custom-control-label" for="anonimo" style="margin-left:0px!important;margin-right: 55%!important;">
              <strong><i>Enviar como Anônimo</i></strong>
            </label>
          </div>
        </div>
        <input type="hidden" id="valueRating" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-enviar-rating" data-idaula="" onclick="enviaRate(this)">Enviar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Revolution School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-feedback-content">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<script>
function showRating(idAula){
  $("#rating-modal").modal('show');
  document.getElementById('btn-enviar-rating').dataset.idaula = idAula;
}
function rating(e){
  radios = e.querySelectorAll("input[type='radio']");
  for(i = 0; i < radios.length; i++){
    console.log(radios[i].checked);
    radios[i].style.color = "#FFED85";
    if(radios[i].checked){
      document.getElementById('valueRating').value = radios[i].value;
      break;
    }
  }
}

function enviaRate(e){
  rate = document.getElementById('valueRating').value;
  idAula = e.dataset.idaula;
  texto = document.getElementById('texto').value;
  anonimo = document.getElementById('anonimo').checked;
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "php/rating_aulas/controle.php",
    data: {'acao':'registraRating', 'rate':rate, 'idAula': idAula, 'texto':texto, 'anonimo':anonimo},
    success: function(data) {
      console.log(data);
      if(data){
        $("#rating-modal").modal('hide');
        $("#modal-feedback-content").html("Sua avaliação foi enviada com sucesso!");
        $("#modal-feedback").modal('show');
      }else{
        $("#modal-feedback-content").html("É necessário informar as estrelas.");
        $("#modal-feedback").modal('show');
      }
    },
    error: function(data) {
      console.error(data);
    }
  });
}
</script>
