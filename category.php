<?php

try{

include 'header.php';
// on crée une requête pour récupérer les articles
$stmt = $db -> query('SELECT * FROM post ORDER BY post_id DESC');
$posts = $stmt -> fetchAll();

?>
	<aside class="hidden-xs col-md-3">		
	</aside>
<?php
foreach($posts as $post){ ?>
	<section class="single cat col-xs-12 col-md-9" >
		<a href="single.php?id=<?= $post['post_id'] ?>">
		<?php
			$stmt=$db->prepare('SELECT * FROM pictures WHERE id_pic = :id_pic');
			$stmt-> bindValue('id_pic', $post['post_pic_id'], PDO::PARAM_INT);
			$stmt-> execute();
			$result = $stmt-> fetch(); 
		?>
			<h2 class="title"><?= $post['post_title'] ?></h2>
				<div class="slide annexe col-xs-12">
					<img class="thumb-home" src="<?= $result['thumb_url'] ?>" alt="<?= $result['pic_name'] ?>" />
					<div class="resume">
					<?= nl2br(Utils::resume($post['post_content'],$post['post_id'],150)) ?>
					</div>
					<hr>
					<h3 class="date"><?= date('j M. Y',strtotime($post['post_date']))?> </h3>
					<h4 class="author"><?= $post['post_author']?></h4>
				</div>
		</a>
	</section>
<?php }
include 'footer.php';
} catch (Exception $e) {
    echo $e->getMessage();
}
