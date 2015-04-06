<?php

try{
	include 'header.php';
	// On récupère l'ensemble des photos de la base
	$stmt = $db -> query('SELECT * FROM pictures ORDER BY pic_date');
	$pics = $stmt -> fetchAll();
?>
	<h2 class="portfolio col-xs-12">Diaporama Photo</h2>
	<div id="gallery">
<?php
	foreach($pics as $pic){ ?>
		<div class="pictures">
			<img src="<?= $pic['original_url'] ?>" alt="<?= $pic['pic_name'] ?>" class="pic">
			<h3><?= $pic['pic_name'] ?></h3>
			<div class="info">
				<p>agrandir l'image</p>
			</div>
		</div>		 
<?php } ?>
	</div>
<?php
	include 'footer.php';
} catch (Exception $e) {
    echo $e->getMessage();
}