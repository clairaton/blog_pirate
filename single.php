<?php
include 'header.php';

// on crée une requête pour récupérer la photo
$stmt=$db->prepare('SELECT * FROM pictures WHERE id_pic = :id_pic');
$stmt-> bindValue('id_pic', $post['post_id'], PDO::PARAM_INT);
$stmt-> execute();
$pic = $stmt-> fetch();

if(!empty($post)){
?>
	<section class="single col-xs-12">
		<h2 class="title"><?= $post['post_title']?></h2>
		<h3 class="date"><?= date('j M. Y',strtotime($post['post_date']))?></h3>
		<h4 class="author"><p>Par </p><?= $post['post_author']?></h4>
		<div class="content">
		<img class="pic-single" src="<?= !empty($pic['medium_url'])?$pic['medium_url']:$pic['thumb_url'] ?>" alt="<?= $pic['pic_name'] ?>">
			<p><?= nl2br($post['post_content'])?></p>
		</div>
	</section>
	<?php
}
else{ ?>
	<h4>Oups, il semble que cet article n\'existe pas...</h4>
	<?php } ?>
	<a href="index.php" class="btn-back">Retour à l'acceuil</a>
<?php
include 'footer.php';