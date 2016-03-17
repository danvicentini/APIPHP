<?php
require_once "BO/menuBO.class.php";

global $pastaTemplates;
$pastaTemplates = 'view/menu/';

switch($strAcao){
	case "listar" : listar(); break;
	default : listar(); break;
}


function listar(){
	global $pastaTemplates;
	$menuBO = new MenuBO();
	if(!empty($_REQUEST['p1']) && is_numeric($_REQUEST['p1'])){
		$intCodPai = $_REQUEST['p1'];
		$arrParametros['listaObjs'] = $menuBO->listarMenuFilhos($intCodPai);
		SmartyConfig::LoadTemplateFile($pastaTemplates.'index.tpl', $arrParametros);	
	}else{
		throw new AppException(3, LNG_LABEL_MENU_PAI);
	}
	
}

?>