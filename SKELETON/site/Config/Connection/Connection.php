<?php
namespace Config\Connection;
use PDO;
use Exception;

/*
 * Classe que gerencia conex�es com bancos de dados astrav�s de arquivos de configura��o
*/

final class Connection
{
   private function __construct()
   {
   }

   public static function open($name)
   {
   	 /*
   	  * m�todo open()
   	  * recebe o nome do banco de dados e instancia o objeto PDO correspondente
   	  */
   	
   	  if(file_exists(dirname(__FILE__) . "/../{$name}.ini"))
   	  {
   	  	//le o ini e retorna um array
   	  	$db = parse_ini_file(dirname(__FILE__) . "/../{$name}.ini");
   	  }
   	  else 
   	  {
   	  	 //sen�o existir lan�a um erro
   	  	 throw new Exception("ARQUIVO  /../{$name}.ini n�o encontrado ");
   	  	 #var_dump("../{$name}.ini");
        }
   	  
   	  //le as informa��es contidoas no arquivo
   	  $user = isset($db['user']) ? $db['user'] : NULL;
   	  $pass = isset($db['pass']) ? $db['pass'] : NULL;
   	  $name = isset($db['name']) ? $db['name'] : NULL;
   	  $host = isset($db['host']) ? $db['host'] : NULL;
   	  $type = isset($db['type']) ? $db['type'] : NULL;
   	  $port = isset($db['port']) ? $db['port'] : NULL;
        
   	 //descobre qual o tipo(driver) de banco de dados a ser utilizado
   	  switch($type)
   	  {
   	    case 'mysql':
   	  	 $port = $port ? $port : '3306';
   	  	 $conn = new PDO("mysql: host={$host}; port={$port}; dbname={$name}", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
   	  	 break;
   	  }
   	  
   	  //define para que o PDO lance exce��es na ocorrencia de erros
   	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	  
   	  //retorna o objeto instanciado
   	  return $conn;
        
   }
}