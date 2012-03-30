<?php
/**
 * Config class - manages reading the configuration from the set config files (for both the global config file and components)
 * The global config file must be an ini (unless the implementation of Config::get() is changed), and the component config files are all XML files
 * 
 * @version 1.0
 * @author Chintan Parikh
 *
 * Changelist: 
 */
class Config
{
	/**
	 * The location of the config directory
	 */
	const CONFIG_DIRECTORY = 'config/';

	/**
	 * The location of the component directory (must be under the config directory)
	 */
	const COMPONENT_DIRECTORY = 'components/'

	/**
	 * The filename of the global config file (located inside the config directry)
	 */
	const GLOBAL_CONFIG = 'config.ini';

	/**
	 * Gets a config item from the global config file and returns it
	 */
	public function get($item)
	{
		$config = parse_ini_file(self::CONFIG_DIRECTORY . self::GLOBAL_CONFIG);
		return $config[$item];
	}

	/**
	 * Gets all config items from a component xml file
	 */
	public function getComponent($component)
	{
		$config = array();
		$xml = simplexml_load_file((self::CONFIG_DIRECTORY . self::COMPONENT_DIRECTORY . $component . '.config.shel');

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