<?php

/**
 * Themer class - manages theming (not translating posts into HTML, but rather inserting these posts into them appropriate theme)
 *
 * @version 1.0
 * @author Chintan Parikh
 *
 * Changelist: 
 */
class Themer
{
	/**
	 * Holds the config instance
	 */
	protected $config;

	/**
	 * Holds the theme name
	 */
	protected $theme;

	/**
	 * Path to themes
	 */
	const THEME_PATH = 'themes/';

	/**
	 * File to insert the home page into
	 */
	const HOME_PAGE = 'home.php';

	/**
	 * File to insert the post page into
	 */
	const POST_PAGE ='post.php';

	public function __construct($config, $theme = null)
	{
		$this->config = $config;
		$this->theme = $this->getTheme($theme);
	}

	/**
	 * Determines the theme (default if no theme supplied)
	 */
	protected function getTheme($theme)
	{
		if ($theme !== null)
		{
			return $theme;
		}
		return $this->config->get('theme');
	}

	/**
	 * Builds the path to the theme
	 */
	protected function getThemePath($themeName = null)
	{
		if ($themeName === null)
		{
			$themeName = $this->theme . '/';
		}
		return self::THEME_PATH . $themeName;
	}

	/**
	 * Workhorse function - does the entire theming process
	 */
	public function theme($content, $type)
	{
		$assetPath = $this->config->get('url') . $this->config->get('basepath') . '/' . $this->getThemePath() . 'assets/'; 
		extract($content);

		switch ($type)
		{
			case 'home':
				include($this->getThemePath() . self::HOME_PAGE);
				break;
			case 'post':
				include($this->getThemePath() . self::POST_PAGE);
				break;
			default:
			break;
		}
	}
}