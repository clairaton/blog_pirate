<?php
$menu=array(
	'index.php' => 'Acceuil',
	'category.php' => 'News',
	'program.php' => 'Programme',
	'pictures.php' => 'Photos'
);
?>
<nav id="main-nav" class="hidden-xs col-sm-12">
	<ul>
	<?php
		foreach($menu as $key => $value){ ?>
		<li><a href="<?= $key ?>"><?= $value ?></a></li>
	<?php } ?>
	</ul>
</nav>