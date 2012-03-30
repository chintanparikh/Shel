<?php

/**
* 
*/
class Router
{
	protected $config;
	public $URI;
	protected static $routes;

	public function __construct(Config $config, $URI = '')
	{
		$this->config = $config;
		$this->URI = $this->getURI($URI);
	}

	public function getURI($requestURI)
	{
		$basePath = $this->config->get('basepath');

		if ($requestURI != '')
		{
			$URI = $requestURI;
		}
		else
		{
			$URI = filter_input(INPUT_SERVER, "REQUEST_URI", FILTER_SANITIZE_URL);
		}

		$URI = strtolower($URI);
		$URI = preg_replace('~' . strtolower($basePath) . '~', '', $URI, 1);
		return $URI;
	}

	public function bind($path, $function)
	{
		$this->routes[$path] = $function;
	}

	public function dispatchCall()
	{
		return array('routes' => $this->routes,
					 'URI' => $this->URI);
	}

}