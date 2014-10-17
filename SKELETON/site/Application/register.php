<?php
require_once 'vendor/autoload.php';
require_once 'autoload.php';

use Silex\Application;

$app = new Application();
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app['view'] = $app->share(function () use ($app){
  return new Services\View\View();
});