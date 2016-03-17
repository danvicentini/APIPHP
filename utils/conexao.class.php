<?php 
class Conexao { 
	private static $instance; 
	private static $strServer = "srvc6-db01"; 
	private static $strDbName = "myservices"; 
	private static $strUsername = "admin"; 
	private static $strPassword = "admin"; 
	
	private function __construct() { 
	// 
	} 
	private static function getInstance() {
		if (!isset(self::$instance)) { 
			self::$instance = new PDO('mysql:host='.self::$strServer.';dbname='.self::$strDbName, self::$strUsername, self::$strPassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES latin1"));
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING); 
			
		} 
		return self::$instance;
	}
	public static function executarSql($strSql, $objUsuario = null){
		try{
			$p_sql = self::getInstance()->prepare($strSql);
			if($p_sql->execute()){
				$dsResultado = $p_sql->fetchAll();
				
				return $dsResultado;	
			}else{
				throw new Exception($dbh->errorInfo(), 0, null);
			}
		}catch(Exception $e){
			//ERRO GENERICO
			$strMsgErro = "SQL resultou um erro (".$e->getMessage().") em ".$strSql;
			LogAplicacao::logarErro($strMsgErro);
			throw new AppException(5000, "");
		}
		
	}
	public static function executarComando($strSql, $objUsuario = null){
		try{
			$p_sql = self::getInstance()->prepare($strSql);
			if($p_sql->execute()){
				$dsResultado = $p_sql->fetch();
				//print_r($dsResultado);
				if(isset($dsResultado['cod_erro']) && $dsResultado['cod_erro'] > 0){
					throw new AppException($dsResultado['cod_erro'], get_defined_constants()[$dsResultado['str_campo']]);
				}
				return $dsResultado;	
			}else{
				throw new Exception($dbh->errorInfo(), 0, null);
			}
		}catch(AppException $e){
			//ERRO GENERICO
			throw $e;
		}catch(Exception $e){
			//ERRO GENERICO
			$strMsgErro = "SQL resultou um erro (".$e->getMessage().") em ".$strSql;
			LogAplicacao::logarErro($strMsgErro);
			throw new AppException(5000, "");
		}
		
	}
} 
?>

