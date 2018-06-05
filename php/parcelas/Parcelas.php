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
	private $valor;
  private $dataVencimento;
  private $categoria;
  private $desconto;
  private $bolsa;
  private $forma_de_cobranca;
  private $situacao_parcela;
  private $observacoes;
  private $conta_bancaria;
	private $conn;

	public function __construct($db) {
		$this->conn = $db;
	}

  public function registraParcelas($valor, $dataVencimento, $categoria, $desconto, $bolsa, $forma_de_cobranca, $situacao_parcela, $observacoes, $conta_bancaria, $parcelas_quantidade){
    $bolsa = ($bolsa)?$bolsa:'null';
    $conta_bancaria = ($conta_bancaria)?$conta_bancaria:'null';

    for($i = 0; $i < $parcelas_quantidade; $i++){
      $sql .= "INSERT INTO parcelas (valor, dataVencimento, categoria, desconto, bolsa, forma_de_cobranca, situacao_parcela, observacoes, conta_bancaria)
                VALUES ({$valor}, '{$dataVencimento}', {$categoria}, {$desconto}, {$bolsa}, {$forma_de_cobranca}, {$situacao_parcela}, '{$observacoes}', {$conta_bancaria})";
    }
  }

  public function quitarParcela($parcelaId, $dinheiro, $troco){
    
  }
}
?>
