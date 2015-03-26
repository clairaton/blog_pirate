<?php

try{

include 'header.php';

// on crée une requête pour récupérer les articles
$stmt = $db -> query('SELECT * FROM post');
$posts = $stmt -> fetchAll();

?>
	<aside class="hidden-xs col-md-5">		
	</aside>
<?php
foreach($posts as $post){ ?>
	<section class="post col-xs-12 col-md-8">
		<h1 class="title"><?= $post['post_title'] ?></h1>
		<img class="thumb-home" src="uploads/Port-douardenez-by-philippematon.jpg" alt="" title="">
		<div class="resume">
		<?= Utils::resume($post['post_content'],$post['post_id'],150) ?>
		</div>
		<h2 class="date"><?= $post['post_date']?></h2>
		<h3 class="author"><?= $post['post_author']?></h3>
	</section>
	<?php }
include 'footer.php';
} catch (Exception $e) {
    echo $e->getMessage();
}