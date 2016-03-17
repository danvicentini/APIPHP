<?php 
require 'model/usuario.class.php';
class UsuarioBO{
	public static $instance;
	
	public static function getInstance() { 
		if (!isset(self::$instance)) 
			self::$instance = new UsuarioBO(); 
		return self::$instance; 
	} 
	
	private function getArrayObjs($dsRegistros){
		$arrObjs = array();
		foreach($dsRegistros as $registro){
			$obj = new Usuario();
			$obj->id = $registro['id'];
			$obj->nome = $registro['nome'];
			$obj->login = $registro['login'];
			$obj->senha	= $registro['senha'];
			$obj->idIdioma	= $registro['id_idioma'];
			$obj->idTemaLayout	= $registro['id_tema_layout'];
			$obj->imagem	= $registro['imagem'];
			$obj->email	= $registro['email'];
			$obj->cor1	= $registro['cor1'];
			$obj->cor2	= $registro['cor2'];
			$obj->cor3	= $registro['cor3'];
			$obj->flagLayout	= $registro['flag_layout'];
			
			//AUDITAVEIS
			$obj->idUsuarioCriacao	= $registro['id_usuario_criacao'];
			$obj->dataCriacao	= $registro['dt_criacao'];
			$obj->idUsuarioAlteracao	= $registro['id_usuario_alteracao'];
			$obj->dataAlteracao	= $registro['dt_alteracao'];
			$obj->idUsuarioDelecao	= $registro['id_usuario_delecao'];
			$obj->dataDelecao	= $registro['dt_delecao'];
			
			//NÃO PERSISTIDO
			$obj->cssTema	= $registro['css'];
			$obj->siglaIdioma	= $registro['sigla'];
			
			$arrObjs[] = $obj;
		}
		return $arrObjs;
	}
	
	function listarTodos(){
		$sql = 'CALL sp_se_usuario(""); ';
		$arrResultado = $this->getArrayObjs(Conexao::executarSql($sql));
		return $arrResultado;
	}
	
	function listarPorId($id){
		//PEGA OS MENUS RAIZ
		$sql = 'CALL sp_se_usuario("AND u.id = '.$id.'"); ';
		$arrResultado = $this->getArrayObjs(Conexao::executarSql($sql));
		return $arrResultado;
	}
	
	function salvar($objSalvar){
		if($this->validarObjeto($objSalvar)){
			$sql = 'CALL sp_up_usuario("'.$objSalvar->id.'","'.
																	$objSalvar->nome.'","'.
																	$objSalvar->login.'","'.
																	$objSalvar->senha.'",'.
																	$objSalvar->idIdioma.','.
																	$objSalvar->idTemaLayout.',"'.
																	$objSalvar->imagem.'","'.
																	$objSalvar->email.'","'.
																	$objSalvar->cor1.'","'.
																	$objSalvar->cor2.'","'.
																	$objSalvar->cor3.'",'.
																	$objSalvar->flagLayout.');';

														
			Conexao::executarComando($sql);		
		}
	}
	
	function validarObjeto($objValida){
		if(empty($objValida->nome)){
			throw new AppException(1, LNG_LABEL_USUARIO_NOME);
		}
		if(empty($objValida->login)){
			throw new AppException(1, LNG_LABEL_USUARIO_LOGIN);
		}
		if(empty($objValida->idIdioma) || !is_numeric($objValida->idIdioma)){
			throw new AppException(2, LNG_LABEL_USUARIO_IDIOMA);
		}
		if(empty($objValida->idTemaLayout) || !is_numeric($objValida->idTemaLayout)){
			$objValida->idTemaLayout = 'NULL';
		}
		return true;
	}
}
?>