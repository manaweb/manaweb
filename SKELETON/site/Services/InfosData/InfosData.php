<?php

namespace Services\InfosData;


/* 
  recebe um array contendo uma data e, retorna separado dia, mes, ano
*/
class InfosData 
{
	public function __construct($data)
	{
		self::getDia($data);
		self::getMes($data);
		self::getAno($data);
	}
	
	static public function getDia($data)
    {
    	return date("d", strtotime($data));
	}
	static public function getMes($data)
    {
    	return date("m", strtotime($data));
	}
	static public function getAno($data)
    {
        return date("Y", strtotime($data));
	}
}