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
  protected $titulo;
  protected $logo;
  public $parcelas;
  public $parcelaValor;
  public $valorTotal;
  public $vencimento;
  // Aluno
  protected $nomeAluno;
  protected $dataNascAluno;
  protected $rgAluno;
  protected $cpfAluno;
  protected $escolaridadeAluno;
  protected $logradouroAluno;
  protected $numeroCasaAluno;
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
  protected $numeroCasaResponsavel;
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
    $this->numeroCasaResponsavel = $aluno['numeroCasa'];
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
    $this->numeroCasaResponsavel = $responsavel['numeroCasa'];
    $this->cepResponsavel = $responsavel['cep'];
    $this->bairroResponsavel = $responsavel['bairro'];
    $this->cidadeResponsavel = $responsavel['cidade'];
    $this->telefoneResponsavel = $responsavel['telefone'];
    $this->celularResponsavel = $responsavel['celular'];
    $this->emailResponsavel = $responsavel['email'];
  }
}
 ?>
