<?php

/** Bootstrap **/

/* Include the necessary files - might replace with an autoloader if needed */
include('engine/config.php');
include('engine/router.php');
include('engine/themer.php');
include('engine/Shel.php');

/* Initiate the router, config and the main Shel engine */
$config = new Config();
$router = new Router($config);
$themer = new Themer($config);

$shel = new Shel($config, $router);

/* Bind routes - maybe put this in it's own file (routes.php?) */
$router->bind('~/~', function() use ($shel, $themer)
{
	$content = array();
	$content['nav'] = $shel->getNav();
	foreach ($shel->getPosts() as $key=>$post)
	{
		$content['posts'][$key]['post'] = $shel->translate($post['post']);
		$content['posts'][$key]['title'] = $post['title'];
		$content['posts'][$key]['date'] = $post['date'];
	}
	$themer->theme($content, false);
});


$router->bind('~.?~', function() use ($shel)
{
	print 'This matches every page.';
});


$shel->start();