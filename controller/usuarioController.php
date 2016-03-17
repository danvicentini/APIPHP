<?php
require_once "BO/usuarioBO.class.php";
require_once "BO/idiomaBO.class.php";
require_once "BO/temaLayoutBO.class.php";

global $pastaTemplates;
global $objUsuarioLogado;

$pastaTemplates = 'view/usuario/';

switch($strAcao){
	case "listar" : listar(); break;
	case "salvar" : salvar(); break;
	case "mesalvar" : meSalvar(); break;
	case "logout" : logout(); break;
	default : listar(); break;
}

function popularObjetoFormulario(){
	$objCadastrar = new Usuario();
	$objCadastrar->id = $_REQUEST['hdnId'];
	$objCadastrar->nome = $_REQUEST['txtNome'];
	$objCadastrar->login = $_REQUEST['txtLogin'];
	$objCadastrar->idIdioma = $_REQUEST['lstIdioma'];
	$objCadastrar->idTemaLayout = $_REQUEST['lstTema'];
	$objCadastrar->email = $_REQUEST['txtEmail'];
	$objCadastrar->senha = $_REQUEST['hdnPassword'];
	$objCadastrar->cor1 = $_REQUEST['cpCor1'];
	$objCadastrar->cor2 = $_REQUEST['cpCor2'];
	$objCadastrar->cor3 = $_REQUEST['cpCor3'];
	$objCadastrar->flagLayout = $_REQUEST['hdnTema'];
	$objCadastrar->imagem = "";
	return $objCadastrar;
}

function listar(){
	global $pastaTemplates;
	$usuBO = UsuarioBO::getInstance();
	$arrParametros['listaObjs'] = $usuBO->listarTodos();
	SmartyConfig::LoadTemplateFile($pastaTemplates.'index.tpl', $arrParametros);
}

function salvar(){
	global $pastaTemplates;
	global $objUsuarioLogado;
	$usuBO = UsuarioBO::getInstance();
	$idiomaBO = IdiomaBO::getInstance();
	$temaBO = TemaLayoutBO::getInstance();
	
	//FORMULARIO POSTADO
	if(!empty($_REQUEST['hdnSalvar'])){
		try{
			$objUsuario = popularObjetoFormulario();	
			$usuBO->salvar($objUsuario);	
			$arrParametros['blnSucesso'] = true;
		}catch(AppException $e){
			$arrParametros['strErroMsg'] = $e->getMessage();
		}		
		$arrParametros['objFormulario'] = $objUsuario;
	}else{
		//ACABOU DE ENTRAR NA PAGINA
		//CHECA SE ESTA ALTERANDO
		if(!empty($_REQUEST['p1']) && is_numeric($_REQUEST['p1'])){
			$idUsuario = $_REQUEST['p1'];
			$objUsuario = $usuBO->listarPorId($idUsuario)[0];
			$arrParametros['objFormulario'] = $objUsuario;
		}else{
			$arrParametros['objFormulario'] = new Usuario();
		}	
	}
	//PARAMETROS PARA O FORMULARIO
	$arrParametros['arrIdiomas'] = $idiomaBO->listarTodos();
	$arrParametros['arrTemas'] = $temaBO->listarTodos($objUsuarioLogado->idIdioma);
	//---------------------------
	SmartyConfig::LoadTemplateFile($pastaTemplates.'cadastro.tpl', $arrParametros);
}


function meSalvar(){
	global $pastaTemplates;
	global $objUsuarioLogado;
	$usuBO = UsuarioBO::getInstance();
	$idiomaBO = IdiomaBO::getInstance();
	$temaBO = TemaLayoutBO::getInstance();
	
	//FORMULARIO POSTADO
	if(!empty($_REQUEST['hdnSalvar'])){
		try{
			$objUsuario = popularObjetoFormulario();	
			$usuBO->salvar($objUsuario);	
			$arrParametros['blnSucesso'] = true;
		}catch(AppException $e){
			$arrParametros['strErroMsg'] = $e->getMessage();
		}		
		$arrParametros['objFormulario'] = $objUsuario;
	}else{
		//ACABOU DE ENTRAR NA PAGINA
		//CHECA SE ESTA ALTERANDO
		if(!empty($_REQUEST['p1']) && is_numeric($_REQUEST['p1'])){
			$idUsuario = $_REQUEST['p1'];
			$objUsuario = $usuBO->listarPorId($idUsuario)[0];
			$arrParametros['objFormulario'] = $objUsuario;
		}else{
			$arrParametros['objFormulario'] = new Usuario();
		}	
	}
	//PARAMETROS PARA O FORMULARIO
	$arrParametros['arrIdiomas'] = $idiomaBO->listarTodos();
	$arrParametros['arrTemas'] = $temaBO->listarTodos($objUsuarioLogado->idIdioma);
	//---------------------------
	SmartyConfig::LoadTemplateFile($pastaTemplates.'cadastro_meu.tpl', $arrParametros);
}

function logout(){
/*	global $pastaTemplates;
	SmartyConfig::LoadTemplateFile($pastaTemplates.'cadastro.tpl', null);*/
}
?>