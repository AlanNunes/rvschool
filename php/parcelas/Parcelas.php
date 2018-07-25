<?php
/**
 * Controle de Parcelas
 *
 * It's the Class Parcelas where all the datas relationed to parcelas
 * are manipulated.
 *
 * @category   Parcelas
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 */
Class Parcelas {
	/**
	* @var integer
	*/
	public $id;
	/**
	* @var integer
	*/
	public $aluno;
	/**
	* @var float
	*/
	public $valor;
	/**
	* @var string
	*/
  public $dataVencimento;
	/**
	* @var integer
	*/
  public $categoria;
	/**
	* @var float
	*/
  public $desconto;
	/**
	* @var integer
	*/
  public $bolsa;
	/**
	* @var string
	*/
  public $situacao_parcela;
	/**
	* @var string
	*/
  public $observacoes;
	/**
	* @var float
	*/
	public $valor_recebido;
	/**
	* @var float
	*/
	public $troco;
	/**
	* @var string
	*/
	public $dataRecebimento;
	/**
	* @var integer
	*/
	public $formaCobranca;
	/**
	* @var integer
	*/
	public $operadoraCartao;
	/**
	* @var integer
	*/
	public $contaBancaria;

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
	* Define o valor recebido
	*
	* @access public
	* @param string $valor Valor recebido
	*/
	public function setValor_Recebido($valor){
		if(!$valor){
			$this->valor_recebido = 'DEFAULT';
		}else{
			$valor = str_replace(',', '.', $valor);
			$this->valor_recebido = floatval($valor);
		}
	}

	/**
	* Define o troco
	*
	* @access public
	* @param string $troco Troco a ser recebido
	*/
	public function setTroco($troco){
		if(!$troco){
			$this->troco = 'DEFAULT';
		}else{
			$troco = str_replace(',', '.', $troco);
			$this->troco = floatval($troco);
		}
	}

	/**
	*
	*
	* @access public
	* @param integer id da parcela
	*/
	public function applyDescontoBolsaByParcelaId($id){
		$sql = "SELECT p.valor, p.desconto, p.bolsa, b.desconto,
						b.fixa, b.dataInicio, b.dataTermino FROM parcelas p
						INNER JOIN bolsas b ON b.id = p.bolsa
						WHERE p.id = {$this}";
    $result = $this->conn->query($sql);
		if ($result->num_rows > 0)
		{
			// Esta parcela tem bolsa atribuida
		}
		else
		{
			return false;
		}
	}

	/**
	* Pega o valor da parcela somente
	*
	* @access public
	* @param integer id da parcela
	*/
	public function getParcelaValorById($id){
		$sql = "SELECT valor FROM parcelas WHERE id = {$id}";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0)
		{
			// Retorna o valor da parcela, sem desconto nenhum
			$row = $result->fetch_assoc();
			return $row['valor'];
		}
		else
		{
			return false;
		}
	}

	/**
	* Pega o valor da parcela somente
	*
	* @access public
	* @param integer id da parcela
	*/
	public function getDescontoByParcelaId($id){
		$sql = "SELECT desconto FROM parcelas WHERE id = {$id}";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0)
		{
			// Retorna o valor da parcela, sem desconto nenhum
			$row = $result->fetch_assoc();
			return $row['desconto'];
		}
		else
		{
			return false;
		}
	}

	/**
	* Retorna desconto, data de início e término da bolsa, e se ela é fixa ou não.
	*
	* @access public
	* @param integer id da parcela
	*/
	public function getBolsaByParcelaId($id){
		$sql = "SELECT b.desconto, b.fixa, b.dataInicio, b.dataTermino
						FROM bolsas b INNER JOIN parcelas p ON p.bolsa = b.id
						WHERE p.id = {$id}";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0)
		{
			// Retorna o valor da parcela, sem desconto nenhum
			$row = $result->fetch_assoc();
			return $row;
		}
		else
		{
			return false;
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
		$dataVencimento = $this->dataVencimento;
    for($i; $i <= $quantidade; $i++){
      $sql .= "INSERT INTO parcelas (aluno, valor, dataVencimento, categoria, desconto, bolsa, situacao_parcela, observacoes, numero)
                VALUES ({$this->aluno}, {$this->valor}, '{$dataVencimento}', {$this->categoria}, {$this->desconto}, {$this->bolsa}, '{$this->situacao_parcela}', {$this->observacoes}, {$i});";
      $dataVencimento = date('Y-m-d', strtotime("+1 months", strtotime($dataVencimento)));
		}
		if($this->conn->multi_query($sql) OR $insert_id){
			/**
			* Caso o '$quitar_primeira_parcela' seja falso o '$insert_id' é retornado como false(0)
			*/
			return array('erro' => false, 'quitar' => $quitar_primeira_parcela, 'description' => 'O plano foi criado com sucesso.', 'insert_id' => $insert_id);
		}else{
			return array('erro' => true, 'description' => 'O plano não foi criado, ocorreu algum erro.', 'more' => $quantidade);
		}
  }

	/**
	* Quita Parcelas
	*
	* Esta função é responsável por quitar parcelas
	*
	* @access public
	* @return array Retorna um conjunto de informações sobre o procedimento
	*/
  public function quitar(){
		$sql = "UPDATE parcelas SET situacao_parcela = 'Quitada',
		valor_recebido = {$this->valor_recebido}, troco = {$this->troco},
		operadora_de_cartao = {$this->operadoraCartao},
		forma_de_cobranca = {$this->formaCobranca}, data_recebimento = '{$this->dataRecebimento}',
		desconto_momento_recebimento = {$this->desconto} WHERE id = {$this->id}";
		if($this->conn->query($sql)){
			return true;
		}else{
			return false;
		}
  }

	/**
	* Coleta Parcelas
	*
	* Esta função é responsável por coletar parcelas do banco de dados através de
	* filtros.
	*
	* @access public
	* @param integer $aluno Id do aluno
	* @param integer $mes Número do mês
	* @param array $situacoes Situação das Parcelas
	* @return array Retorna um conjunto de informações sobre o procedimento
	*/
	public function getParcelasByFilter($aluno, $mes, $situacoes)
	{
		$quitada = $situacoes[0];
		$pendente = $situacoes[1];
		$cancelada = $situacoes[2];
		$sql = "SELECT p.id, p.numero, a.nome, p.dataVencimento,
						p.valor, p.desconto, b.desconto as descPercentual, pc.nome
						as categoria FROM parcelas p
						INNER JOIN alunos a ON a.id = p.aluno
						INNER JOIN parcelas_categorias pc ON pc.id = p.categoria
						INNER JOIN bolsas b ON b.id = p.bolsa
						WHERE a.nome LIKE '%{$aluno}%'
						AND (p.situacao_parcela LIKE '%{$quitada}%'
						OR p.situacao_parcela LIKE '%{$pendente}%'
						OR p.situacao_parcela LIKE '%{$cancelada}%')
						AND MONTH(p.dataVencimento) = '{$mes}'
						ORDER BY p.dataVencimento";
		/**
		* Executa a query para buscar os alunos e retorna o resultado do processo
		*/
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$parcelas[] = $row;
			}
			return $parcelas;
		}else{
			return 0;
		}
	}
}
?>
