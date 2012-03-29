<html>
<head>
	<title>Blog Title</title>
</head>
<body>
	<h1>Shel! The super simple blogging engine!</h1>
	<ul>
		<?php
		foreach ($nav as $navitem)
		{
			print "<li><a href='{$navitem['link']}'>{$navitem['title']}</a></li>";
		}
		?>
	</ul>

	<?php
	foreach ($posts as $post)
	{
		print "<h2>{$post['title']}</h2>";
		print $post['post'];
		print $post['date']['day'] . substr($post['date']['month'], 0, 3) . $post['date']['year'];
	}
	?>

</body>
</html>