<?php
$menu=array(
	'dashboard.php' => 'Tableau de bord',
	'news.php' => 'Articles',
	'message.php' => 'Message',
	'users.php' => 'Utilisateur',
	'pics.php' => 'Photos'
);
?>
<aside id="admin-sidebar">
	<ul>
	<?php
		foreach($menu as $key => $value){
			$active=($key == $current_page)?'class="active"':''; ?>
		<li><a <?= $active ?> href="<?= $key ?>"><?= $value ?></a></li>
	<?php } ?>
	</ul>
</aside>