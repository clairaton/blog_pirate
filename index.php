<?php

try{

include 'header.php';

// on crée une requête pour récupérer les articles
$stmt = $db -> query('SELECT * FROM post ORDER BY post_id DESC LIMIT 2');
$posts = $stmt -> fetchAll();

// on crée la requête pour récupérer uniquement l'article 1
$stmt = $db -> query('SELECT * FROM post WHERE post_id = 1');
$douarnenez = $stmt -> fetch();

?>
	<aside class="boat hidden-xs hidden-sm col-md-4">
	</aside>
	<h1 class="col-xs-12 col-md-8">Dernières News</h1>
<?php
// Boucle permettant d'afficher les deux derniers posts créés
foreach($posts as $post){ ?>
	<section class="post col-xs-12 col-sm-6 col-md-4" >
		<a href="single.php?id=<?= $post['post_id'] ?>">
		<?php
			$stmt=$db->prepare('SELECT * FROM pictures WHERE id_pic = :id_pic');
			$stmt-> bindValue('id_pic', $post['post_pic_id'], PDO::PARAM_INT);
			$stmt-> execute();
			$result = $stmt-> fetch();
		?>
			<img class="thumb-home" src="<?= $result['thumb_url'] ?>" alt="<?= $result['pic_name'] ?>" />
			<div class="slide col-xs-12">
				<h2 class="title"><?= $post['post_title'] ?></h2>
				<div class="resume">
				<?= Utils::resume($post['post_content'],$post['post_id'],100) ?>
				</div>
				<h3 class="date"><?= date('j M. Y',strtotime($post['post_date']))?></h3>
				<p> by </p>
				<h4 class="author"><?= $post['post_author']?></h4>
			</div>
		</a>
		<a href="single.php?id=<?= $post['post_id'] ?>">
			<h4 class="title"><?= $post['post_title'] ?></h4>
		</a>
	</section>
	<?php } ?>
	<div class="post col-xs-12 col-md-8" >
		<a href="single.php?id=<?= $douarnenez['post_id'] ?>">
		<?php
			$stmt=$db->prepare('SELECT * FROM pictures WHERE id_pic = :id_pic');
			$stmt-> bindValue('id_pic', $douarnenez['post_pic_id'], PDO::PARAM_INT);
			$stmt-> execute();
			$result = $stmt-> fetch();
		?>
			<img class="thumb-home" src="<?= $result['medium_url'] ?>" alt="<?= $result['pic_name'] ?>" />
			<div class="slide large col-xs-12">
				<h2 class="title"><?= $douarnenez['post_title'] ?></h2>
				<div class="resume">
				<?= Utils::resume($douarnenez['post_content'],$douarnenez['post_id'],300) ?>
				<br></div>
				<h3 class="date"><?= date('j M. Y',strtotime($douarnenez['post_date']))?></h3>
				<p> by </p>
				<h4 class="author"><?= $douarnenez['post_author']?></h4>
			</div>
		</a>
		<a href="single.php?id=<?= $douarnenez['post_id'] ?>">
			<h4 class="title"><?= $douarnenez['post_title'] ?></h4>
		</a>
	</div>
<?php
include 'footer.php';
} catch (Exception $e) {
    echo $e->getMessage();
}