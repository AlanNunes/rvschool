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

	/**
	* Construtor
	*
	*/
	public function __construct($db) {
		$this->conn = $db;
	}

	/**
	* Define o id da bolsa
	*
	* @access public
	* @param integer id da bolsa
	*/
	public function setBolsa($bolsa){
		$this->bolsa = ($bolsa)?$bolsa:'null';
	}

	/**
	* Define o valor da parcela
	*
	* @access public
	* @param string valor das parcelas
	*/
	public function setValor($valor){
		$valor = str_replace(',', '.', $valor);
		$this->valor = floatval($valor);
	}

	/**
	* Define a observação
	*
	* @access public
	* @param string observações do plano
	*/
	public function setObservacoes($observacoes){
		$this->observacoes = ($observacoes)?"{$observacoes}":'null';
	}

	/**
	* Define o desconto
	*
	* @access public
	* @param string desconto da bolsa
	*/
	public function setDesconto($desconto){
		if(!$desconto){
			$this->desconto = 0;
		}else{
			$desconto = str_replace(',', '.', $desconto);
			$this->desconto = floatval($desconto);
		}
	}

	/**
	* Registrador de Parcelas
	* Esta função registra parcelas, todas como 'Pendentes'
	*
	* @access public
	* @param integer a quantidade de parcelas
	* @param boolean se a primeira parcela deve ser quitada
	* @return array retorna um conjunto de informações dizendo se houve erro ou não, descrição do processo
	* e o id da primeira parcela
	*/
  public function registrarParcelas($quantidade, $quitar_primeira_parcela){
		/**
		* Variável utilizado para fazer multi query, por isso é inicializada com valor vazio
		* @var string
		*/
		if($quitar_primeira_parcela){
			$sql = "INSERT INTO parcelas (aluno, valor, dataVencimento, categoria, desconto, bolsa, situacao_parcela, observacoes, numero)
                VALUES ({$this->aluno}, {$this->valor}, '{$this->dataVencimento}', {$this->categoria}, {$this->desconto}, {$this->bolsa}, '{$this->situacao_parcela}', {$this->observacoes}, 1);";
			if($this->conn->query($sql)){
				$sql = ''; // Reseta o '$sql' para ser usado na multi_query
				/**
				* Pega o id da primeira parcela cuja será quitada
				* @var integer
				*/
				$insert_id = $this->conn->insert_id;
			}
			/**
			* @var integer
			* Inicia com a primeira parcela, número um
			*/
			$i = 2;
		}else{
			/**
			* Define o insert_id como falso pois não é para quitar a primeira parcela
			* @var integer
			*/
			$insert_id = false;
			/**
			* @var integer
			* Pula para a segunda parcela, já que a primeira já foi lançada no scope acima
			*/
			$i = 1;
			/**
			* @var string
			* Inicia a variável de query para poder fazer multi queries
			*/
			$sql = '';
		}
		// Registra todas as parcelas de 0 até $parcelas_quantidade
    for($i; $i <= $quantidade; $i++){
      $sql .= "INSERT INTO parcelas (aluno, valor, dataVencimento, categoria, desconto, bolsa, situacao_parcela, observacoes, numero)
                VALUES ({$this->aluno}, {$this->valor}, '{$this->dataVencimento}', {$this->categoria}, {$this->desconto}, {$this->bolsa}, '{$this->situacao_parcela}', {$this->observacoes}, {$i});";
    }
		if($this->conn->multi_query($sql)){
			/**
			* Caso o '$quitar_primeira_parcela' seja falso o '$insert_id' é retornado como false(0)
			*/
			return array('erro' => false, 'quitar' => $quitar_primeira_parcela, 'description' => 'O plano foi criado com sucesso.', 'insert_id' => $insert_id);
		}else{
			return array('erro' => true, 'description' => 'O plano não foi criado, ocorreu algum erro.', 'more' => $this->conn->error);
		}
  }

	/**
	* Quita Parcelas
	*
	* Esta função é responsável por quitar parcelas
	*
	* @access public
	* @param integer id da parcela a ser paga
	* @param float o valor em dinheiro recebido
	* @param float o valor em troco dado ao sacado
	*/
  public function quitarParcela($parcela, $dinheiro, $troco){

  }
}
?>
