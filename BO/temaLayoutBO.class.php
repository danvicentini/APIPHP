<?php 
require 'model/temaLayout.class.php';
class TemaLayoutBO{
	public static $instance;
	
	public static function getInstance() { 
		if (!isset(self::$instance)) 
			self::$instance = new TemaLayoutBO(); 
		return self::$instance; 
	} 
	
	private function getArrayObjs($dsRegistros){
		$arrObjs = array();
		foreach($dsRegistros as $registro){
			$obj = new TemaLayout();
			$obj->id = $registro['id'];
			$obj->nome = $registro['nome'];
			$obj->css = $registro['css'];
			$obj->idIdioma = $registro['id_idioma'];
			$arrObjs[] = $obj;
		}
		return $arrObjs;
	}
	
	function listarTodos($intIdioma){
		$sql = 'CALL sp_se_tema_layout("AND id_idioma = '.$intIdioma.'"); ';
		$arrResultado = $this->getArrayObjs(Conexao::executarSql($sql));
		return $arrResultado;
	}
	
	function listarPorId($id){
		//PEGA OS MENUS RAIZ
		$sql = 'CALL sp_se_tema_layout("AND u.id = '.$id.'"); ';
		$arrResultado = $this->getArrayObjs(Conexao::executarSql($sql));
		return $arrResultado;
	}
	
	function salvar($objSalvar){
	
	}
	
	function validarObjeto($objValida){
		
		return true;
	}
}
?>