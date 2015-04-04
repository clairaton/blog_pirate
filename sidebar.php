<?php
// On crée la requête permettant de récupérer l'ensemble des catégories
$stmt=$db->query('SELECT * FROM category');
$category=$stmt->fetchAll();

$stmt=$db->query('SELECT DATE_FORMAT(post_date, "%d-%m-%y") as arch_date FROM post GROUP BY arch_date');
$archives=$stmt->fetchAll();

?>

<aside id="main-sidebar" class="sidebar">
	<h1>Categories</h1>
	<nav>
		<ul>
			<?php
			foreach($category as $item){ ?>
				<li><a href="category.php?cat=<?= $item['id_cat'] ?>" alt="<?= $item['id_cat'] ?>"><?= $item['cat_name'] ?></a></li>
			<?php } ?>
		</ul>
	</nav>
	<hr>
	<h1>Archives</h1>
	<nav>
		<ul>
			<?php
			foreach($archives as $archive){ ?>
				<li><a href="category.php?date=<?= $archive['arch_date'] ?>" alt="<?= $archive['arch_date'] ?>"><?= $archive['arch_date'] ?></a></li>
			<?php } ?>
		</ul>
	</nav>
</aside>