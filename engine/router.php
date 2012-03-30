<?php

/**
 * Router class - manages the routes and sends a dispatch call after routes are set.
 *
 * @version 1.0
 * @author Chintan Parikh
 *
 * Changelist: 
 */
class Router
{
	/**
	 * Stores a config instance
	 */
	protected $config;

	/**
	 * Stores each route and the corresponding function
	 */
	protected static $routes;

	/**
	 * Stores the (stripped down) URI
	 */
	public $URI;

	public function __construct(Config $config, $URI = '')
	{
		$this->config = $config;
		$this->URI = $this->getURI($URI);
	}

	/**
	 * Determines the URI and returns it
	 */
	public function getURI($requestURI)
	{
		$basePath = $this->config->get('basepath');

		if ($requestURI != '')
		{
			$URI = $requestURI;
		}
		else
		{
			// gets the URI and sanitizes it at the same time
			$URI = filter_input(INPUT_SERVER, "REQUEST_URI", FILTER_SANITIZE_URL);
		}

		// strtolower allows us to compare case insentively
		# possible replace with strcasecmp() - advantages are that it doesn't directly modify the URI so we can use the original URI
		$URI = strtolower($URI);
		// removes the unnecessary parts of the URI
		$URI = preg_replace('~' . strtolower($basePath) . '~', '', $URI, 1);
		return $URI;
	}

	/**
	 * Binds a function to a path (gets executed in the dispatcher)
	 */
	public function bind($path, $function)
	{
		$this->routes[$path] = $function;
	}

	/**
	 * Forms a dispatch call based of the routes bound and the URI
	 */
	public function dispatchCall()
	{
		return array('routes' => $this->routes,
					 'URI' => $this->URI);
	}

}