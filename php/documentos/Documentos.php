<?php
/**
 *
 * Created on 09/05/2018
 *
 * @category   Contratos
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */

Class Documentos {
  protected $id;
  public $titulo;
  public $parcelas;
  public $valor;
  public $vencimento;
  // Aluno
  protected $nomeAluno;
  protected $dataNascAluno;
  protected $rgAluno;
  protected $cpfAluno;
  protected $escolaridadeAluno;
  protected $logradouroAluno;
  protected $ruaAluno;
  protected $cepAluno;
  protected $bairroAluno;
  protected $cidadeAluno;
  protected $telefoneAluno;
  protected $celularAluno;
  protected $emailAluno;
  // Responsável
  protected $nomeResponsavel;
  protected $dataNascResponsavel;
  protected $rgResponsavel;
  protected $cpfResponsavel;
  protected $escolaridadeResponsavel;
  protected $logradouroResponsavel;
  protected $ruaResponsavel;
  protected $cepResponsavel;
  protected $bairroResponsavel;
  protected $cidadeResponsavel;
  protected $telefoneResponsavel;
  protected $celularResponsavel;
  protected $emailResponsavel;
  // Formatação
  public $fonte;
  public $tamanho;
  public $alinhamento;
  public $cor;
  // Conexão
  protected $conn;

  public function __construct($conn){
    $this->conn = $conn;
  }

  // Seta todos os dados do aluno em suas respectivas variáveis
  public function setAlunosDados($aluno){
    $this->nomeAluno = $aluno['nome'];
    $this->dataNascAluno = $aluno['dataNasc'];
    $this->rgAluno = $aluno['rg'];
    $this->cpfAluno = $aluno['cpf'];
    $this->escolaridadeAluno = $aluno['escolaridade'];
    $this->logradouroAluno = $aluno['logradouro'];
    $this->ruaAluno = $aluno['numeroCasa'];
    $this->cepAluno = $aluno['cep'];
    $this->bairroAluno = $aluno['bairro'];
    $this->cidadeAluno = $aluno['cidade'];
    $this->telefoneAluno = $aluno['telefone'];
    $this->celularAluno = $aluno['celular'];
    $this->emailAluno = $aluno['email'];
  }

  // Seta todos os dados do responsável em suas respectivas variáveis
  public function setResponsavelDados($responsavel){
    $this->nomeResponsavel = $responsavel['nome'];
    $this->dataNascResponsavel = $responsavel['dataNasc'];
    $this->rgResponsavel = $responsavel['rg'];
    $this->cpfResponsavel = $responsavel['cpf'];
    $this->escolaridadeResponsavel = $responsavel['escolaridade'];
    $this->logradouroResponsavel = $responsavel['logradouro'];
    $this->ruaResponsavel = $responsavel['numeroCasa'];
    $this->cepResponsavel = $responsavel['cep'];
    $this->bairroResponsavel = $responsavel['bairro'];
    $this->cidadeResponsavel = $responsavel['cidade'];
    $this->telefoneResponsavel = $responsavel['telefone'];
    $this->celularResponsavel = $responsavel['celular'];
    $this->emailResponsavel = $responsavel['email'];
  }
}
Class DocumentosMatricula extends Documentos {
  public $titulo;
  private $dia;
  private $mes;
  private $ano;
  private $aluno;
  private $responsavel;
  private $conteudo;

  public function buildDocumento(){
    $this->titulo = "<center><h2>{$this->titulo}</h2></center>";
    $this->dia = date('j');
    $this->mes = date('F');
    $this->ano = date('Y');

    $this->aluno = "
    <h3>ALUNO</h3>
    Nome: {$this->nomeAluno}<br/>
    Data de Nascimento: {$this->dataNascAluno}    RG: {$this->rgAluno}   CPF: {$this->cpfAluno}<br/>
    Nível de Escolaridade: {$this->escolaridadeAluno}<br/>
    Endereço: {$this->logradouroAluno} nº {$this->ruaAluno} CEP: {$this->cepAluno}<br/>
    Bairro: {$this->bairroAluno}  Cidade: {$this->cidadeAluno}<br/>
    Telefone: {$this->telefoneAluno}  Celular/WhatsApp: {$this->celularAluno}<br/>
    Email: {$this->emailAluno}<br/>
    ";
    $this->responsavel = "
    <h3>RESPONSÁVEL</h3>
    Nome: {$this->nomeResponsavel}<br/>
    Data de Nascimento: {$this->dataNascResponsavel}    RG: {$this->rgResponsavel}   CPF: {$this->cpfResponsavel}<br/>
    Nível de Escolaridade: {$this->escolaridadeResponsavel}<br/>
    Endereço: {$this->logradouroResponsavel} nº {$this->ruaResponsavel} CEP: {$this->cepResponsavel}<br/>
    Bairro: {$this->bairroResponsavel}  Cidade: {$this->cidadeResponsavel}<br/>
    Telefone: {$this->telefoneResponsavel}  Celular/WhatsApp: {$this->celularResponsavel}<br/>
    Email: {$this->emailResponsavel}<br/>
    ";

    $this->conteudo = "
    <p>Declaro que as informações acima são verdadeiras e poderão ser utilizadas para preenchimento de cadastro escolar.</p><br/>
    <h3>CONDIÇÕES CONTRATUAIS</h3>
    1. Cláusula Primeira: Quanto a matrícula<br/>
    1.1 O preenchimento desta ficha não exime o CONTRATANTE da assinatura do CONTRATO DE PRESTAÇÃO DE SERVIÇOS e da apresentação dos documentos originais para confirmações e cópia.<br/>
    1.2 Caso as aulas não se iniciem em até 80 (oitenta) dias a partir da data de assinatura deste documento, dar-se-á por rescindido o mesmo, desobrigando ambas as partes destes termos, ficando a critério do CONTRATANTE ser ressarcido do valor pago na matrícula ou optar pela formação de turma.<br/>
    1.3 Caso o CONTRATANTE desista de realizar o curso antes do prazo estipulado no item 1.2 não será ressarcido do valor referente a matrícula.<br/>
    2. Cláusula Segunda: Quanto ao curso<br/>
    2.1 Esta matrícula refere-se ao ensino de idiomas, denominado -, em níveis de estudos - básico, intermediário, avançado, com duração de 50 minutos por aula, no horário das -, previamente acordado entre as partes.<br/>
    2.2 As turmas serão formadas, inicialmente, por no mínimo 07 (sete) alunos matriculados, cujas aulas serão ministradas em horários previamente estabelecidos neste documento.<br/>
    3. Cláusula Terceira: Quanto ao pagamento da matrícula<br/>
    3.1 O CONTRATANTE pagará a CONTRATADA o importante de R$ <br/>
    <table>
      <tr>
        <th>Vencimento</th>
        <th>Parcelas</th>
        <th>Valor</th>
      </tr>
      <tr>
        <td>{$this->vencimento}</td>
        <td>{$this->parcelas}</td>
        <td>{$this->valor}</td>
      </tr>
    </table>
    <br/>
    <p>Volta Redonda, {$this->dia} de {$this->mes} de {$this->ano}</p>
    ";
  }

  public function getDocumento(){
    return $this->titulo.$this->aluno.$this->responsavel.$this->conteudo;
  }
}
 ?>
