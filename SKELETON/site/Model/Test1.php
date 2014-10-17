<?php
namespace Model;
#include  __DIR__.'/../Config/Connection.php';

use Config\Connection\Connection;
use PDO;
class Test1
{
	private $bd = 'mysql';
  	private $conn;
  
  	public function __construct()
  	{
    	$this->conn = Connection::open($this->bd); 
  	}

	public function listar()
	{
		$stmt = $this->conn->prepare('SELECT * FROM tb_test');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}