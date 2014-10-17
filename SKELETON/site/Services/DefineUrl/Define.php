<?php
namespace Services\DefineUrl;
class Define
{
	
	public function generator($file)
	{
	    $url = "";
        $originalUri = $_SERVER['REQUEST_URI'];
        $uri = explode("/", $originalUri);
        for($i=0; $i < count($uri); $i++)
        {
            if(!empty($uri[$i]))
                $conteudoUrl[] =  $uri[$i];
        }

        if(count($conteudoUrl) == 1)
            return $file;
    
        if(count($conteudoUrl) >= 2)
        {        
            for($i=0; $i < count($conteudoUrl)-2; $i++)
            {
                $url .= "../";  
            }
            return $url.$file   ;
        }
    }   
  
}
