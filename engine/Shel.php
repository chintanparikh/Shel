<?php

class Shel
{
	protected $config;
	protected $router;

	public function __construct($config, $router)
	{
		$this->config = $config;
		$this->router = $router;
	}

	public function start()
	{
		$this->dispatcher($this->router->dispatchCall());		
	}

	public function dispatcher($dispatch)
	{
		foreach ($dispatch['routes'] as $route=>$function)
		{
			if (preg_replace($route, '', $dispatch['URI']) === '')
			{
				call_user_func($function);
				break;
			}
		}

	}

	public function getNav()
	{
		$nav = $this->config->getComponent('nav');
		$navArray = array();
		foreach($nav['item'] as $key=>$item)
		{
			$navArray[$key]['title'] = (string)$item->title;
			$navArray[$key]['link'] = (string)$item->link;
		}
		return $navArray;
	}

	public function getPosts()
	{
		$files = glob('posts/*.shel');
		// Ensure most recent post is on top
		usort($files, create_function('$b,$a', 'return filemtime($a) - filemtime($b);'));
		foreach ($files as $key=>$post)
		{
			//$posts[$key]['link'] = 
			$posts[$key]['post'] = preg_replace('/(#[^#])/', '#\1', file_get_contents($post));
			$posts[$key]['title'] = str_replace('.shel', '', str_replace('-', ' ', substr($post, 16)));
		}
		return $posts;
	}

	public function getPost($filename)
	{
		return file_get_contents("posts/{$filename}.shel");
	}

	public function translate($post)
	{
		require_once("translators/translator.php");
		$translatorName = $this->config->get('translator');
		require_once("translators/{$translatorName}/{$translatorName}.php");
		$translator = new $translatorName;
		return $translator->translate($post);
	}
}

