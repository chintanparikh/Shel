<?php

class Config
{
	public function get($item)
	{
		$config = parse_ini_file('config/config.ini');
		return $config[$item];
	}

	public function getComponent($component)
	{
		$config = array();
		$xml = simplexml_load_file('config/components/' . $component . '.config.shel');

		$vars = get_object_vars($xml);
		foreach ($vars as $key=>$value)
		{
			$name = $key;
		}
		
		if (!empty($name)) {
			// Remove the comments field (uncessary, and we don't need it))
			unset($xml->$name->comment);
			$config[$name] = get_object_vars($xml->$name);
		}

		return $vars;
	}
}