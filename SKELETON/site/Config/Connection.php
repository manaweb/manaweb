<?php

//File for connection, is recommended using PDO library.
function connection()
{
	try 
	{
		$pdo = new PDO('mysql:host=localhost;dbname=skeleton', 'root', '');
		return $pdo;
	} 
	catch (PDOException $e) 
	{
		return $e->getMessage();
	}
}