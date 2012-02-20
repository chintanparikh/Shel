<?php

class Shel
{
	protected $config;

	public function __construct($config)
	{
		$this->config = $config;
	}

	public function start()
	{
		foreach ($this->getNav() as $item)
		{
			print "<a href='{$item['link']}'>{$item['title']}</a>";
		}
		foreach ($this->getPosts() as $post)
		{
			print $this->translate($post['post']);
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
			$posts[$key]['post'] = file_get_contents($post);
			$posts[$key]['title'] = str_replace('-', ' ', substr($post, 11));
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

