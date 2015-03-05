<?php
$menu=array(
	'index.php' => 'Acceuil',
	'contact.php' => 'Contact',
	'planning.php' => 'Programme',
	'pics.php' => 'Photos'
);
?>
<nav id="main-nav">
	<ul>
	<?php
		foreach($menu as $key => $value){ ?>
		<li><a href="<?= $key ?>"><?= $value ?></a></li>
	<?php } ?>
	</ul>
</nav>