<?php
Class Documentos_Contrato_Promocao extends Documentos {
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
    $this->contratada = "<strong>CONTRATADA</strong><p>Revolution School LTDA ME, inscrita no CNPJ sob nº 12.052.681/0001-10, com sede na Rua 18 A nº 76, CEP 27.260-380, Volta Redonda, RJ.</p><br/>";
    $this->dia = date('j');
    $this->mes = date('F');
    $this->ano = date('Y');

    $this->aluno = "
    <strong>ALUNO</strong><br/>
    {$this->nomeAluno}, CPF {$this->cpfAluno}, RG {$this->rgAluno}, residente e domiciliando a {$this->logradouroAluno},
    {$this->numeroCasaAluno}, -, {$this->bairroAluno} - {$this->cidadeAluno}, CEP: {$this->cepAluno},
    e-mail {$this->emailAluno}, telefone {$this->telefoneAluno}, celular {$this->celularAluno}
    <br/><br/>
    ";
    $this->responsavel = "
    <strong>CONTRATANTE</strong><br/>
    {$this->nomeResponsavel}, CPF {$this->cpfResponsavel}, RG {$this->rgResponsavel}, residente e domiciliando a {$this->logradouroResponsavel},
    {$this->numeroCasaResponsavel}, -, {$this->bairroResponsavel} - {$this->cidadeResponsavel}, CEP: {$this->cepResponsavel},
    e-mail {$this->emailResponsavel}, telefone {$this->telefoneResponsavel}, celular {$this->celularResponsavel}
    <br/><br/>
    ";

    $this->conteudo = "
    <strong>CONDIÇÕES DE EXECUÇÃO DOS SERVIÇOS</strong><br/>
    A CONTRATADA compromete-se a prestar o serviço de ensino de idiomas, denominado -. As aulas terão frequência de acordo com o nível de estudos básico, intermediário e avançado, nos termos da CLAUSULA 1, com duração de 50 minutos por aula, no horário das -, previamente acordado entre as partes.
    <br/><br/>
    <strong>DURAÇÃO DOS SERVIÇOS CONTRATADOS</strong><br/>
    O presente contrato terá a duração de 12 (doze) meses a iniciar na data de assinatura. E após este período, permanecendo o CONTRATANTE em silêncio, o contrato será prorrogado tacitamente por igual período, até o término do último estágio do curso, ou seja, o estágio 12 (doze), vigendo para o período prorrogado as mesmas condições tabuladas, exceto o valor dos serviços, que poderá ser corrigido pelo índice de reajustes de preços ao consumidor. No caso do aluno concluir o curso (término do estágio 12) e ainda existirem parcelas a vencer, as mesmas serão canceladas, isso não isentando o responsável pelo pagamento das parcelas anteriores. Existindo descumprimento de quaisquer das cláusulas contidas neste contrato e/ou inadimplência NÃO HAVERÁ PRORROGAÇÃO DO CONTRATO.
    <br/><br/>
    <strong>TRANCAMENTO E CANCELAMENTO</strong><br/>
     O CONTRATANTE poderá solicitar trancamento do curso mediante as condições: [1] Período de 1 (um) mês, taxa de 50% (cinquenta por cento) sobre o valor da mensalidade; [2] Período de 2 (dois) meses, taxa de 75% (setenta e cinco por cento) sobre o valor da mensalidade ou [3] Período de 3 (três) meses, taxa de 1 (uma) mensalidade. Para períodos superiores, o CONTRATANTE deverá solicitar a rescisão de contrato, conforme cláusula 4.
     <br/><br/>
    <strong>MENSALIDADES CONTRATADAS</strong><br/>
    O CONTRATANTE pagará a CONTRATADA a importância de R$ 0,00 (0,00), o qual será dividido em - parcelas de R$0,00 (-). A primeira mensalidade deverá ser paga no dia de início do curso e as demais para todo dia - dos meses subsequentes.
    <br/><br/>
    <strong>HORÁRIO PROMOCIONAL</strong><br/>
    O CONTRATANTE está ciente que só poderá particar das aulas referentes aos horários promocionais, que circulam entre as sete horas (7 horas) e quinze horas (15 horas), como previamente acordado entre as partes. Nesse período o mesmo pode assistir quantas aulas quiser desde que esteja dentro do horário promocional e previamente autorizado pela coordenação da escola. Caso o CONTRATANTE deseje a troca de horário fora do horário promocional a CONTRATADA realizará o reajuste da mensalidade para o valor normal previamente estabelecido na tabela comercial do periodo.
    <br/><br/>
    As partes atribuem ao presente contrato plena eficácia e força executiva judicial e elegem o foro da COMARCA DE Volta Redonda - RJ para dirimir dúvidas que o presente contrato possa suscitar.
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
