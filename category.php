<?php

try{

include 'header.php';

// on définit la page sur laquelle on se trouve
$page = 1;
if(!empty($_GET['page'])) {
	$page = $_GET['page'];
}

$nb_pages=1;

$nb_posts_per_page = 2;

// on initialise les variables de get
$search='';
$select='';

// on veut sélectionner les articles d'une catégorie
if(!empty($_GET['cat'])){
	$select=$_GET['cat'];
	$search='?cat=';
	// on crée la requête pour récupérer les articles de la catégorie
	$stmt = $db -> prepare('SELECT * FROM post WHERE post_category = :post_category LIMIT :start, :nb_items');
	$stmt -> bindValue('post_category', $select, PDO::PARAM_STR);
	$stmt -> bindValue('start', ($page-1) * $nb_posts_per_page, PDO::PARAM_INT);
	$stmt -> bindValue('nb_items', $nb_posts_per_page, PDO::PARAM_INT);
	$stmt -> execute();
	$posts = $stmt -> fetchAll();

	// on retourne le nombre de résultat obtenu
	$stmt = $db->prepare('SELECT COUNT(*) as count_total FROM post WHERE post_category = :post_category ');
	$stmt -> bindValue('post_category', $select, PDO::PARAM_STR);
	$stmt->execute();
	$nb_results = $stmt->fetch();
	$result ='true';

}
// on veut sélectionner les articles d'une date
else if(!empty($_GET['date'])){
	$select=$_GET['date'];
	$search='?date=';
	// on crée la requête pour récupérer les articles de la date
	$stmt = $db -> prepare('SELECT * FROM post WHERE DATE_FORMAT(post_date, "%d-%m-%y") = :date ORDER BY post_date DESC LIMIT :start, :nb_items');
	$stmt -> bindValue('date', $select, PDO::PARAM_STR);
	$stmt -> bindValue('start', ($page-1) * $nb_posts_per_page, PDO::PARAM_INT);
	$stmt -> bindValue('nb_items', $nb_posts_per_page, PDO::PARAM_INT);
	$stmt -> execute();
	$posts = $stmt -> fetchAll();

	// on retourne le nombre de résultat obtenu
	$stmt = $db->prepare('SELECT COUNT(*) as count_total FROM post WHERE DATE_FORMAT(post_date, "%d-%m-%y") = :date ORDER BY post_date DESC');
	$stmt -> bindValue('date', $select, PDO::PARAM_STR);
	$stmt->execute();
	$nb_results = $stmt->fetch();
	$result ='true';

}
else{
	// on crée une requête pour récupérer les articles
	$stmt = $db -> prepare('SELECT * FROM post LIMIT :start, :nb_items');
	$stmt -> bindValue('start', ($page-1) * $nb_posts_per_page, PDO::PARAM_INT);
	$stmt -> bindValue('nb_items', $nb_posts_per_page, PDO::PARAM_INT);
	$stmt -> execute();
	$posts = $stmt -> fetchAll();

	// on récupère le nbr de résultat de la requête
	$stmt = $db->prepare('SELECT COUNT(*) as count_total FROM post');
	$stmt->execute();
	$nb_results = $stmt->fetch();
	$result ='false';
}

$nb_items = $nb_results['count_total'];
$nb_pages = ceil($nb_items / $nb_posts_per_page);

include 'sidebar.php';

if($result){
	echo '<h2 class="result">Il y a '.$nb_items.' articles liés à la sélection </h2>' ;
}

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
if($nb_pages>1){ ?>
	<div id="pagination" class="col-xs-12 col-md-9">
<?php
	for($i=1;$i<= $nb_pages;$i++){ ?>
		<a class="page" href="category.php?page=<?= $i ?><?= !empty($search)?'&'.$search.$select :''; ?>" alt="page <?= $i ?>">
			<?= $i ?>
		</a>
	<?php } ?>
	</div>
<?php }

include 'footer.php';
} catch (Exception $e) {
    echo $e->getMessage();
}
