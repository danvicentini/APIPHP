<?php 
require 'smarty/libs/Smarty.class.php';
class SmartyConfig{		
	
	static function LoadTemplateFile($strTemplate, $arrParametros = null){
		$smarty = new Smarty;
		$smarty->force_compile = true;
		//$smarty->debugging = true;
		$smarty->caching = true;
		$smarty->cache_lifetime = 120;
		
		if(!is_null($arrParametros)){
			foreach($arrParametros as $strChave => $objValor){
				$smarty->assign($strChave, $objValor);		
			}
		}
		
		$smarty->display($strTemplate);
	}
}
?>