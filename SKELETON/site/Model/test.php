<?php

include  __DIR__.'/../Config/Connection.php';

function listar()
{
	$pdo = connection();
	$stmt = $pdo->prepare('SELECT * FROM tb_test');
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_OBJ);
}