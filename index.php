<?php

/** Bootstrap **/
include('engine/config.php');
include('engine/Shel.php');

$config = new Config();
$shel = new Shel($config);
$shel->start();