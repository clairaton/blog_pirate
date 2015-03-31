<?php
// On crée la requête permettant de récupérer l'ensemble des catégories
$stmt=$db->query('SELECT * FROM category');
$category=$stmt->fetchAll();

$stmt=$db->query('SELECT post_date FROM post');
$category=$stmt->fetchAll();
?>

<aside id="main-sidebar" class="sidebar">
	<h1>Categories</h1>
	<nav>
		<ul>
			<?php
			foreach($category as $item){ ?>
				<li><a href="category.php?cat=<?= $item['cat_id'] ?>" alt="<?= $item['cat_id'] ?>"><?= $item['cat_name'] ?></a></li>
			<?php } ?>
		</ul>
	</nav>
	<h1>Articles par date</h1>
	<nav>
		<ul>
			<?php
			foreach($archives as $archive){ ?>
				<li><a href="category.php?date=<?= date('F Y',strtotime($archive['post_date'])) ?>" alt="<?= date('F Y',strtotime($archive['post_date'])) ?>"><?= date('F Y',strtotime($archive['post_date'])) ?></a></li>
			<?php } ?>
		</ul>
	</nav>
</aside>