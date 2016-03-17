<?php
require 'utils/SmartyConfig.class.php';
require 'utils/appException.class.php';
require 'utils/Configs.php';
require 'utils/Conexao.class.php';
require 'utils/logApp.php';
require 'BO/menuBO.class.php';
require 'BO/usuarioBO.class.php';

global $objUsuarioLogado;

try{
	//GET USUARIO LOGADO
	$usuBO = UsuarioBO::getInstance();
	$objUsuarioLogado =  $usuBO->listarPorId(1)[0];
	
	// SETA LANGUAGE DO USUARIO
	$strLanguage = $objUsuarioLogado->siglaIdioma;
	require 'lang/lang_'.$strLanguage.'.php';
	// SETA TEMA CSS
	$strCssArquivo = $objUsuarioLogado->cssTema;
	if($objUsuarioLogado->flagLayout == '1'){
	$strCustomCss = ".primary{background-color: {$objUsuarioLogado->cor1} !important;}
		.secondary {background-color: {$objUsuarioLogado->cor2}  !important;}
		.danger{background-color: #ef5350  !important;}
		table thead, table tfoot{background-color: {$objUsuarioLogado->cor2} !important;}
		table thead tr td, table tfoot tr td, table thead tr th, table tfoot tr th{border:1px #DEDEDE solid !important;}
		table.striped>tbody>tr:nth-child(odd),table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd,table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1{background-color: {$objUsuarioLogado->cor3} !important;}
		.header2{border-bottom: 2px solid {$objUsuarioLogado->cor2};color: {$objUsuarioLogado->cor2};line-height:30px;padding-left:20px;width:35%;padding-right:20px;}";	
	}else{
		$strCustomCss = '';
	}
	
		
	// SETA FILENAME LOG FILE
	define("LOG_PATH_FILE", "logs/erros_usu_".$objUsuarioLogado->id.".log");

	if(!file_exists(LOG_PATH_FILE)){
		file_put_contents(LOG_PATH_FILE, "", FILE_APPEND);
	}
	//INCLUIR LOGICA DE PERMISSIONAMENTO
	// CRIAR MENUS
	$menuBO = MenuBO::getInstance();
	$arrMenus = $menuBO->listarMenusUsuario($objUsuarioLogado);
	$arrParametros['menu'] = $arrMenus;
	$arrParametros['arquivoCss'] = $strCssArquivo;
	$arrParametros['customCss'] = $strCustomCss;
	$arrParametros['usuario'] = $objUsuarioLogado;
	SmartyConfig::LoadTemplateFile('includes/header.tpl', $arrParametros);
	
	//DESCOBRE CONTROLLER E ACAO	
	$strController = !isset($_REQUEST['c']) ? 'usuario' : $_REQUEST['c'];
	$strAcao = !isset($_REQUEST['a']) ? 'listar' : $_REQUEST['a'];
	include_once "controller/".$strController."Controller.php";
	
	
	//CARREGA FOOTER
	SmartyConfig::LoadTemplateFile('includes/footer.tpl', $arrMenus);
}catch(AppException $e){
	//TRATAR ERRO DE APLICACAO
}catch(Exception $e){
	$strMsgErro = "Erro de aplicação (".$e->getMessage().")";
	LogAplicacao::logarErro($strMsgErro);
}

