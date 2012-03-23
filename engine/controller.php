<?php

/**
* 
*/
class Controller
{
	const CONTROLLER_PATH = '/controllers/';
	function __construct($shel, $name, array $data = null)
	{
		include(self::CONTROLLER_PATH . "{$name}.php");
		new $name($shel, $data);
	}
}