<?php

/** Bootstrap **/

/* Include the necessary files - might replace with an autoloader if needed */
include('engine/config.php');
include('engine/router.php');
include('engine/themer.php');
include('engine/dispatcher.php');
include('engine/Shel.php');

/* Initiate the router, config and the main Shel engine */
$config = new Config();
$router = new Router($config);
$themer = new Themer($config);
$dispatcher = new Dispatcher();

$shel = new Shel($config, $router, $dispatcher);

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
		$content['posts'][$key]['link'] = $post['link'];
	}
	$themer->theme($content, 'home');
});

$router->bind('~/posts/.+~', function() use ($shel, $themer, $router, $config)
{
	$postName = str_replace('/posts/','', $router->URI);
	if (file_exists('posts/' . $postName . '.shel'))
	{
		$post = $shel->getPost($postName);
		$content = array();
		$content['nav'] = $shel->getNav();
		$content['post']['post'] = $shel->translate($post['post']);
		$content['post']['title'] = ucwords($post['title']);
		$content['post']['date'] = $post['date'];
		$content['post']['link'] = $post['link'];

		$themer->theme($content, 'post');
	}

	//404

});

$router->bind('~.+~', function() use ($shel)
{
	print '404 :(';
});


$shel->start();