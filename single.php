<?php
include 'header.php';
// on récupère l'id de l'article
if(!empty($_GET) && !empty($_GET['id'])){
	$id=$_GET['id'];
}

// on crée une requête pour récupérer l'article
$stmt = $db -> prepare('SELECT * FROM post WHERE post_id= :id') ;
$stmt -> bindValue('id',$id,PDO::PARAM_STR);
$stmt -> execute();
$post = $stmt -> fetchAll();

if(empty($post)){
?>
	<section>
		<h1 class="title"><?= $post['post_title']?></h1>
		<img class="thumb-home" src="" alt="" title="">
		<div class="content">
		<?= $post['post_content']?>
		</div>
		<h2 class="date"><?= $post['post_date']?></h2>
		<h3 class="author"><?= $post['post_author']?></h3>
	</section>
	<?php
}
else{ ?>
	<h4>Oups, il semble que cet article n\'existe pas...</h4>
	<?php } ?>
	<a href="index.php" class="btn-back">Retour à l'acceuil</a>
<?php
include 'footer.php';