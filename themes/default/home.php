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
		<img src="<?php print $assetPath ?>img/logo.png" alt="Shel" id="logo"/>
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

	<?php
	foreach ($posts as $post):
	?>
		<article class="blog-post">
		<a href="<?php print $post['link']; ?>">
			<div class="date-circle">
					<time datetime="<?php print $post['date']['year'] . '-' . $post['date']['month'] . '-' . $post['date']['day'] ?>">
					<span class="day"><?php print $post['date']['day'] ?></span>
					<span class="month-year"><?php print substr($post['date']['month'], 0, 3) . ' ' . substr($post['date']['year'], 2, 4) ?></span>
				</time>
			</div>
		</a>

		<div class="post">
			<h2><a href="<?php print $post['link']; ?>"><?php print $post['title']; ?></a></h2>
			<?php print $post['post']; ?>
			<hr />
		</div>
				
	<?php endforeach; ?>
	

<footer>
	Copyright © 2012 - <a href="#">Chintan Parikh</a> - Powered by <a href="#">Shel</a>
</footer>


</body>
</html>