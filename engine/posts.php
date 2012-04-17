<?php


class Posts
{
	const PATH_TO_POSTS = '/posts';
	protected $config;

	public function __construct($config)
	{
		$this->config = $config;
	}

	public function getList()
	{
		$files = glob('posts/*.shel');
		// Ensure most recent post is on top
		usort($files, function($b, $a) 
		{
			$aTime = filectime($a);
			$bTime = filectime($b);
			if ($aTime < $bTime) { return -1; }
			elseif ($aTime > $bTime) { return 1; } 
			else { return 0; }
		});
	}

	public function getData($filename)
	{
		$post = array();
		$post['post'] = file_get_contents(self::PATH_TO_POSTS . "/{$filename}.shel");
		$post['title'] = str_replace('-', ' ', substr($filename, 10));
		$date = substr($filename, 0, 10);
		$date = explode('-', $date);
		$post['date']['day'] = $date[0];
		$post['date']['month'] = date('F', mktime(0, 0, 0, $date[1]));
		$post['date']['year'] = $date[2];
		$post['link'] = $this->config->get('basepath') . '/' . str_replace('.shel', '', $filename);

		return $post;
	}
}