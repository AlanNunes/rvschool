<?php
Class Documentos_Matricula extends Documentos {
  private $dia;
  private $mes;
  private $ano;
  private $aluno;
  private $responsavel;
  private $conteudo;

  public function buildDocumento(){
    $this->logo = "<p><img src='assets/imgs/logo/logo_para_contratos.png' width='200px' height='71px' /></p>";
    $this->titulo = "<center><h2>DOCUMENTO DE MATRÍCULA</h2></center>";
    $this->dia = date('j');
    $this->mes = date('F');
    $this->ano = date('Y');

    $this->aluno = "
    <br/>
    <strong>ALUNO</strong><br/>
    Nome: {$this->nomeAluno}<br/>
    Data de Nascimento: {$this->dataNascAluno}    RG: {$this->rgAluno}   CPF: {$this->cpfAluno}<br/>
    Nível de Escolaridade: {$this->escolaridadeAluno}<br/>
    Endereço: {$this->logradouroAluno} nº {$this->numeroCasaAluno} CEP: {$this->cepAluno}<br/>
    Bairro: {$this->bairroAluno}  Cidade: {$this->cidadeAluno}<br/>
    Telefone: {$this->telefoneAluno}  Celular/WhatsApp: {$this->celularAluno}<br/>
    Email: {$this->emailAluno}<br/>
    ";
    $this->responsavel = "
    <br/>
    <strong>RESPONSÁVEL</strong><br/>
    Nome: {$this->nomeResponsavel}<br/>
    Data de Nascimento: {$this->dataNascResponsavel}    RG: {$this->rgResponsavel}   CPF: {$this->cpfResponsavel}<br/>
    Nível de Escolaridade: {$this->escolaridadeResponsavel}<br/>
    Endereço: {$this->logradouroResponsavel} nº {$this->numeroCasaResponsavel} CEP: {$this->cepResponsavel}<br/>
    Bairro: {$this->bairroResponsavel}  Cidade: {$this->cidadeResponsavel}<br/>
    Telefone: {$this->telefoneResponsavel}  Celular/WhatsApp: {$this->celularResponsavel}<br/>
    Email: {$this->emailResponsavel}<br/>
    ";

    $this->conteudo = "
    <p>Declaro que as informações acima são verdadeiras e poderão ser utilizadas para preenchimento de cadastro escolar.</p><br/>
    <strong>CONDIÇÕES CONTRATUAIS</strong><br/>
    1. Cláusula Primeira: Quanto a matrícula<br/>
    1.1 O preenchimento desta ficha não exime o CONTRATANTE da assinatura do CONTRATO DE PRESTAÇÃO DE SERVIÇOS e da apresentação dos documentos originais para confirmações e cópia.<br/>
    1.2 Caso as aulas não se iniciem em até 80 (oitenta) dias a partir da data de assinatura deste documento, dar-se-á por rescindido o mesmo, desobrigando ambas as partes destes termos, ficando a critério do CONTRATANTE ser ressarcido do valor pago na matrícula ou optar pela formação de turma.<br/>
    1.3 Caso o CONTRATANTE desista de realizar o curso antes do prazo estipulado no item 1.2 não será ressarcido do valor referente a matrícula.<br/>
    2. Cláusula Segunda: Quanto ao curso<br/>
    2.1 Esta matrícula refere-se ao ensino de idiomas, denominado -, em níveis de estudos - básico, intermediário, avançado, com duração de 50 minutos por aula, no horário das -, previamente acordado entre as partes.<br/>
    2.2 As turmas serão formadas, inicialmente, por no mínimo 07 (sete) alunos matriculados, cujas aulas serão ministradas em horários previamente estabelecidos neste documento.<br/>
    3. Cláusula Terceira: Quanto ao pagamento da matrícula<br/>
    3.1 O CONTRATANTE pagará a CONTRATADA o importante de R$ <br/>
    <table border='1px'>
      <tr>
        <th>Vencimento</th>
        <th>Parcelas</th>
        <th>Valor</th>
      </tr>
      <tr>
        <td>{$this->vencimento}</td>
        <td>{$this->parcelas}</td>
        <td>{$this->parcelaValor}</td>
      </tr>
    </table>
    <br/>
    <p>Volta Redonda, {$this->dia} de {$this->mes} de {$this->ano}</p>
    ";
  }

  public function getDocumento(){
    return $this->logo.$this->titulo.$this->aluno.$this->responsavel.$this->conteudo;
  }
}
?>
