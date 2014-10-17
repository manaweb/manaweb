<?php
namespace Services\View;

 /*
  * Is class is responsible for loading the views
  * having sub directory specified after /view/directory
  * namespace View
 */

use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;

class View 
{
	public function load($view, $content = array())
	{
	  $loader = new FilesystemLoader(__DIR__.'/../../../site/%name%');
      $templating = new PhpEngine(new TemplateNameParser(), $loader);
      return $templating->render("$view", $content);
	}
}
 
 
