<?php
include 'header.php';

// on crée une requête pour récupérer les articles
$stmt = $db -> query('SELECT * FROM post');
$posts = $stmt -> fetchAll();

foreach($post as $posts){ ?>
	<section class="post">
		<h1 class="title"><?= $post['post_title']?></h1>
		<img class="thumb-home" src="" alt="" title="">
		<div class="resume">
		<?= $post['post_resume']?>
		</div>
		<h2 class="date"><?= $post['post_date']?></h2>
		<h3 class="author"><?= $post['post_author']?></h3>
	</section>
	<?php }
include 'footer.php';