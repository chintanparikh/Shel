<?php

/**
* 
*/
class Themer
{
	protected $config;
	protected $theme;

	const THEME_PATH = 'themes/';
	const HOME_PAGE = 'home.php';
	const POST_PAGE ='post.php';

	public function __construct($config, $theme = null)
	{
		$this->config = $config;
		$this->theme = $this->getTheme($theme);
	}

	protected function getTheme($theme)
	{
		if ($theme !== null)
		{
			return $theme;
		}
		return $this->config->get('theme');
	}

	protected function getThemePath($themeName = null)
	{
		if ($themeName === null)
		{
			$themeName = $this->theme . '/';
		}
		return self::THEME_PATH . $themeName;
	}

	public function theme($content, $post = false)
	{
		$assetPath = $this->config->get('url') . $this->config->get('basepath') . '/' . $this->getThemePath() . 'assets/'; 
		extract($content);
		if (!$post)
		{
			include($this->getThemePath() . self::HOME_PAGE);
		}
		else
		{
			include($this->getThemePath() . self::POST_PAGE);
		}
	}
}