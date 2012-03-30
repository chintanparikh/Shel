<?php include ($this->getThemePath() . 'inc/header.php');?>

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
	
<?php include ($this->getThemePath() . 'inc/footer.php'); ?>

