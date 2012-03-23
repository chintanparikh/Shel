<?php

/**
* 
*/
class Home
{
	
	function __construct($shel, $data)
	{
		foreach ($shel->getNav() as $item)
		{
			print "<a href='{$item['link']}'>{$item['title']}</a>";
		}
		foreach ($shel->getPosts() as $post)
		{
			print $shel->translate($post['post']);
		}
	}
}