<?php include 'header.php'; ?>
<form method="post" action="news.php" enctype="multipart/form-data">
	<div>
		<label for="titre">Titre :</label>
		<input type="text" name="news_title" id="titre" />
	</div>
	<div>
		<label for="pic">Image : </label>
		<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
		<input type="file" name="news_pic" id="pic" />
	</div>
	<div>
		<label for="content">Contenu :</label>
		<textarea cols="40" rows="3" name="newsContent" id="content"></textarea>
	</div>
		<input type="submit" name="InsererNews" value="Insérer" />

</form>
<?php
include 'footer.php';