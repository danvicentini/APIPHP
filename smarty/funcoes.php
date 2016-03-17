<?php
	/**
	 * @file funcoes.php
	 * @brief FUNÇÕES GENERICAS
	 * @date 26/02/2016
	 * @version 1.0
	 * @author LETICIA BRUNA 
	 */
  function formataMoeda($valor){
		// tira ponto de milhar
		$dblValor = str_replace(".","", $valor);
		// substitui virgula por ponto ;
		$dblValor = str_replace(",",".", $dblValor);
		return $dblValor;
	}
	
	function verificaFaixaIR($valor){
		
		$arrRetorno = array();
		
		if($valor > 0 AND $valor <= 1903.98  ){
			$arrRetorno['faixa'] = "A";
			$arrRetorno['aliquota'] = 0.00;
			$arrRetorno['deducao'] = "não paga";
		} elseif($valor > 1903.98 AND $valor <= 2826.65){
			$arrRetorno['faixa'] = "B";
			$arrRetorno['aliquota'] = 7.5;
			$arrRetorno['deducao'] = 142.80;
		} elseif ($valor > 2826.65 AND $valor <= 3751.05){
			$arrRetorno['faixa'] = "C";
			$arrRetorno['aliquota'] = 15;
			$arrRetorno['deducao'] = 354.80;
		} elseif ($valor > 3751.05 AND $valor <= 4664.68){
			$arrRetorno['faixa'] = "D";
			$arrRetorno['aliquota'] = 22.5;
			$arrRetorno['deducao'] = 636.13;
		} else {
			$arrRetorno['faixa'] = "E";
			$arrRetorno['aliquota'] = 27.5;
			$arrRetorno['deducao'] = 869.36;
		}
		
		
		return $arrRetorno;
	}

	function verificaFaixaINSS($valor){
		$arrRetorno = array();
		
		if($valor > 0 AND $valor <= 1556.94  ){
			$arrRetorno['faixa'] = "A";
			$arrRetorno['aliquota'] = 8;
		} elseif($valor > 1556.94 AND $valor <= 2594.92){
			$arrRetorno['faixa'] = "B";
			$arrRetorno['aliquota'] = 9;
		} elseif ($valor > 2331.89 AND $valor <= 4663.75){
			$arrRetorno['faixa'] = "C";
			$arrRetorno['aliquota'] = 11;
		} else{
			$arrRetorno['faixa'] = "D";
			$arrRetorno['aliquota'] = 11;
		}
		
		
		return $arrRetorno;
	}

?>