<?php
/**
 * It's the Class Parcelas where all the datas relationed to parcelas
 * are manipulated.
 *
 * @category   Parcelas
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
Class Parcelas {
	private $id;
	public $aluno;
	public $valor;
  public $dataVencimento;
  public $categoria;
  public $desconto;
  public $bolsa;
  public $situacao_parcela;
  public $observacoes;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

	public function setBolsa($bolsa){
		$this->bolsa = ($bolsa)?$bolsa:'null';
	}

	public function setDesconto($desconto){
		$this->desconto = ($desconto)?$desconto:0;
	}

  public function registrarParcelas($quantidade, $quitar_primeira_parcela){
		/**
		* Variável utilizado para fazer multi query, por isso é inicializada com valor vazio
		* @var string
		*/
		$sql = '';
		// Registra todas as parcelas de 0 até $parcelas_quantidade
    for($i = 0; $i < $quantidade; $i++){
      $sql .= "INSERT INTO parcelas (aluno, valor, dataVencimento, categoria, desconto, bolsa, situacao_parcela, observacoes, numero)
                VALUES ({$this->aluno}, {$this->valor}, '{$this->dataVencimento}', {$this->categoria}, {$this->desconto}, {$this->bolsa}, '{$this->situacao_parcela}', '{$this->observacoes}', '{$i}');";
    }
		if($this->conn->multi_query($sql)){
			return array('erro' => false, 'quitar' => $quitar_primeira_parcela, 'description' => 'O plano foi criado com sucesso.');
		}else{
			return array('erro' => false, 'description' => 'O plano não foi criado, ocorreu algum erro.', 'more' => $this->conn->error);
		}
  }

  public function quitarParcela($parcelaId, $dinheiro, $troco){

  }
}
?>
