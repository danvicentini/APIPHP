<?php 
class LogAplicacao { 
	private function __construct() { 
	// 
	} 
	public static function logarErro($strMensagem){
		$strMsgErro = "ERRO;".date('m/Y/d;H:i:s').";". self::tratarMensagem($strMensagem).";";
		error_log($strMsgErro."\r\n", 3, LOG_PATH_FILE);
		throw new AppException(5000, "");
	}
	
	public static function logarInfo($strMensagem){
		$strMsgInfo = "INFO;".date('m/Y/d;H:i:s').";". self::tratarMensagem($strMensagem).";";
		error_log($strMsgInfo."\r\n", 3, LOG_PATH_FILE);
	}
	public static function tratarMensagem($strMensagem){
		$strMensagem = str_replace("\r\n", '', $strMensagem);
		$strMensagem = preg_replace('!\s+!', ' ', $strMensagem);
		return $strMensagem;
	}
} 
?>

