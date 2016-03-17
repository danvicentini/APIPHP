<?php 
class AppException extends Exception{
	 public function __construct($intErro, $strCampoAuxiliar) {
			switch($intErro){
				case 1: $message = LNG_ERRO_CAMPO_NULO." '".$strCampoAuxiliar."'"; break;
				case 2: $message = LNG_ERRO_CAMPO_INVALIDO." '".$strCampoAuxiliar."'"; break;
				case 3: $message = LNG_PARAMETROS_FALTANTES." '".$strCampoAuxiliar."'"; break;
				case 4: $message = LNG_ERRO_CAMPO_EXISTENTE." '".$strCampoAuxiliar."'"; break;
				default: $message = LNG_ERRO_GENERICO; break;
			}
      parent::__construct($message, $intErro, null);
    }
}
?>