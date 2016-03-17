<?php 
require 'model/idioma.class.php';
class IdiomaBO{
	public static $instance;
	
	public static function getInstance() { 
		if (!isset(self::$instance)) 
			self::$instance = new IdiomaBO(); 
		return self::$instance; 
	} 
	
	private function getArrayObjs($dsRegistros){
		$arrObjs = array();
		foreach($dsRegistros as $registro){
			$obj = new Idioma();
			$obj->id = $registro['id'];
			$obj->nome = $registro['nome'];
			$obj->sigla = $registro['sigla'];
			$obj->icone = $registro['icone'];
			$arrObjs[] = $obj;
		}
		return $arrObjs;
	}
	
	function listarTodos(){
		$sql = 'CALL sp_se_idioma(""); ';
		$arrResultado = $this->getArrayObjs(Conexao::executarSql($sql));
		return $arrResultado;
	}
	
	function listarPorId($id){
		//PEGA OS MENUS RAIZ
		$sql = 'CALL sp_se_idioma("AND u.id = '.$id.'"); ';
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