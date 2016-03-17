<?php 
require 'model/menu.class.php';
class MenuBO{
	public static $instance;
	
	public static function getInstance() { 
		if (!isset(self::$instance)) 
			self::$instance = new MenuBO(); 
		return self::$instance; 
	} 
	
	private function getArrayObjs($dsRegistros){
		$arrObjs = array();
		foreach($dsRegistros as $registro){
			$obj = new Menu();
			$obj->id = $registro['id'];
			$obj->nome = $registro['nome'];
			$obj->url = $registro['url'];
			$obj->idPai	= $registro['id_menu_pai'];
			$obj->icone	= $registro['icone'];
			$obj->idIdioma	= $registro['id_idioma'];
			$obj->ordem	= $registro['ordem'];
			$obj->descricao	= $registro['descricao'];
			$arrObjs[] = $obj;
		}
		return $arrObjs;
	}
	
	function listarMenuFilhos($idCodPai){		
		//PEGA OS MENUS RAIZ
		$arrResultado = $this->getArrayObjs(Conexao::executarSql('SELECT * FROM menu WHERE id_menu_pai = '.$idCodPai.'; '));
		//PEGA O SEGUNDO NIVEL
		if(!is_null($arrResultado)){
			foreach($arrResultado as $menu){
				//RECURSÃO PARA PEGAR TODOS OS NIVEIS
				$id = $menu->id;
				$menu->menusFilho = $this->listarMenuFilhos($id);
			}
		}
		return $arrResultado;
	}
	
	function listarMenusUsuario($objUsuario){		
		//PEGA OS MENUS RAIZ
		$arrResultado = $this->getArrayObjs(Conexao::executarSql('SELECT * FROM menu WHERE id_menu_pai IS NULL; '));
		return $arrResultado;
	}
}
?>