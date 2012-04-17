<?php

class Cacher
{
	const PATH_TO_CACHE = '/cache';
	const CACHE_FILE = 'cachefile.xml';

	public function __construct()
	{

	}

	public function checkCache($filename)
	{
		return file_exists(self::PATH_TO_CACHE . '/' . $filename);
	}

	public function add($filename, $content)
	{
		if (!$this->checkCache($file))
		{
			$fh = fopen(self::PATH_TO_CACHE . '/' . $filename, 'w');
			fwrite($fh, $content);
			fclose($fh);
		}
	}

	public function read($filename)
	{
		return file_get_contents(self::PATH_TO_CACHE . '/' . $filename);
	}
}