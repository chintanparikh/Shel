<!doctype html>

<head>
	<meta charset="utf-8">
	<title>Shel!</title>

	<link rel="stylesheet" href="<?php print $assetPath ?>css/reset.css" />
	<link rel="stylesheet" href="<?php print $assetPath ?>css/style.css" />
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="http://yandex.st/highlightjs/6.1/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();
hljs.addLineNumbers();</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="<?php print $assetPath ?>js/hovers.js"></script>
	<link rel="stylesheet" href="<?php print $assetPath ?>css/highlight.css">






</head>
<body>
	<header>
		<a href="<?php print $this->config->get('basepath'); ?>"><img src="<?php print $assetPath ?>img/logo.png" alt="Shel" id="logo"/></a>
	</header>

	<nav>
		<ul>
		<?php
		foreach ($nav as $navitem)
		{
			print "<li><a href='{$navitem['link']}'>{$navitem['title']}</a></li>";
		}
		?>
		</ul>
		<hr />
	</nav>