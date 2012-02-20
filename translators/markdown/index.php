<?php
include('../translator.php');
include('markdown.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		  <!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"/script>
		  <![endif]-->
	<title>Hello</title><script src="http://yandex.st/highlightjs/6.1/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script><link rel="stylesheet" href="highlight.css">

</head>
<body>

<?php
$md = new Markdown();
print $md->translate('
#Hello

Welcome to Shel, my super simple flat file blogging engine.

It currently only supports Markdown, but it is soon to support many more formats! It uses highlight.js for syntax highlighting!

##Examples:
###XML:

	<?xml version="1.0" encoding="UTF-8"?>
	<config>
		<router>
			<!-- The default controller to call on the index -->
			<defaultController>controller</defaultController>

			<!-- The default method to call when no method is specified -->
			<defaultMethod>index</defaultMethod>

			<!-- The default routing pattern -->
			<defaultRoutingPattern>{controller}/{method}/{args}</defaultRoutingPattern>
			
			<path>Serene</path>
		</router>
	</config>

###PHP:
	<?php

	interface Translator
	{
		public function translate($text);
	}
	');

?>
</body>
</html>