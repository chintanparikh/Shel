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
		var_dump($this->getNav());
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
}

