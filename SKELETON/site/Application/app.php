<?php
include "register.php";

$app->get('/', function() use ($app){
	return $app['view']->load('index.php');
});

$app->get('/quem-somos', function() use ($app){
	return $app['view']->load('quemSomos.php');
});

$app->get('/contatos', function() use ($app){
	return $app['view']->load('contatos.php');
});
