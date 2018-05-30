<?php
Class Documentos_Contrato_Kids extends Documentos {
  private $contratada;
  private $dia;
  private $mes;
  private $ano;
  private $aluno;
  private $responsavel;
  private $conteudo;

  public function buildDocumento(){
    $this->logo = "<p><img src='assets/imgs/logo/logo_para_contratos.png' width='200px' height='71px' /></p>";
    $this->titulo = "<center><h2>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</h2></center>";
    $this->contratada = "<strong>CONTRATADA</strong><p><strong>Revolution Escola de Linguas</strong>, pessoa jurídica cadastrada no CNPJ sob nº 12.052.681/0001-10, sediada na Rua 18 A nº 76, CEP 27.260-380, Volta Redonda, RJ.</p><br/>";
    $this->dia = date('j');
    $this->mes = date('F');
    $this->ano = date('Y');

    $this->aluno = "
    <strong>ALUNO</strong><br/>
    {$this->nomeAluno}, CPF {$this->cpfAluno}, RG {$this->rgAluno}, sito a {$this->logradouroAluno},
    {$this->numeroCasaAluno}, -, {$this->bairroAluno} - {$this->cidadeAluno}, CEP: {$this->cepAluno},
    e-mail {$this->emailAluno}, telefone {$this->telefoneAluno}, celular {$this->celularAluno}
    <br/><br/>
    ";
    $this->responsavel = "
    <strong>CONTRATANTE</strong><br/>
    {$this->nomeResponsavel}, CPF {$this->cpfResponsavel}, RG {$this->rgResponsavel}, sito a {$this->logradouroResponsavel},
    {$this->numeroCasaResponsavel}, -, {$this->bairroResponsavel} - {$this->cidadeResponsavel}, CEP: {$this->cepResponsavel},
    e-mail {$this->emailResponsavel}, telefone {$this->telefoneResponsavel}, celular {$this->celularResponsavel}
    <br/><br/>
    ";

    $this->conteudo = "
    <strong>QUANTO AO CURSO</strong>
    A CONTRATADA compromete-se a prestar o serviço de ensino de idiomas, denominado -. As aulas terão frequência de duas vezes por semana, com duração de 50 minutos por aula, no horário e dias  -, previamente acordado entre as partes.
    O presente contrato terá a duração de 12 (doze) meses a iniciar na data de assinatura. E após este período, permanecendo o CONTRATANTE em silêncio, o contrato será prorrogado tacitamente por igual período, até o término do último estágio do curso, ou seja, o estágio 4 (quatro), vigendo para o período prorrogado as mesmas condições tabuladas, exceto o valor que poderá ser corrigido pelo índice de reajustes de preços ao consumidor. No caso do aluno concluir o curso (término do estágio 4) e ainda existirem parcelas a vencer, as mesmas serão canceladas, isso não isentando o responsável pelo pagamento das parcelas anteriores. Existindo descumprimento de quaisquer das cláusulas contidas neste contrato e/ou inadimplência NÃO HAVERÁ PRORROGAÇÃO DO CONTRATO.
    <br/><br/>
    <strong>QUANTO AO PAGAMENTO</strong>
    O CONTRATANTE pagará a CONTRATADA o importante de R$ {$this->valorTotal} ({$this->valorTotal}), o qual será dividido em - parcelas de R$ {$this->parcelaValor} (-), sendo a primeira para o dia de início do curso e as demais para todo dia - dos meses subsequentes.
    O CONTRATANTE gozará de um desconto de - caso o pagamento seja efetuado até a data de vencimento da mensalidade.
    <br/>
    As partes atribuem ao presente contrato plena eficácia e força executiva judicial e elegem o foro da COMARCA DE PINDAMONHANGABA – SP para dirimir dúvidas que o presente contrato possa suscitar.
    E por estarem as partes de acordo com todos os termos e condições do presente instrumento, assinam o mesmo em duas vias de igual teor, frente e verso, perante duas testemunhas, para que produza efeitos legais.
    <br/><br/>
    <p>Volta Redonda, {$this->dia} de {$this->mes} de {$this->ano}</p>
    ";
  }

  public function getDocumento(){
    return $this->logo.$this->titulo.$this->contratada.$this->responsavel.$this->aluno.$this->conteudo;
  }
}
?>
