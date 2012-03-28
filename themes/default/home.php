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
	foreach ($posts as $title=>$post)
	{
		print "<h2>{$title}</h2>";
		print $post;
	}
	?>

</body>
</html>