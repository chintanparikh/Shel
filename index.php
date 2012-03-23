<?php

/** Bootstrap **/
include('engine/config.php');
include('engine/router.php');
include('engine/Shel.php');
include('engine/controller.php');

$config = new Config();
$router = new Router($config);

$shel = new Shel($config, $router);

$router->bind('~/~', function() use ($shel)
{
	new Controller($shel, 'home');
});
$router->bind('~.?~', function() use ($shel)
{
	print 'This matches every page.';
});
$shel->start();