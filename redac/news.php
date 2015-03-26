<?php include 'header.php' ?>
<form method="post" action="news.php" enctype="multipart/form-data">
	<fieldset class="formulaire_news">
	        <p>
	                <label for="titre">Titre :</label>
	                <input type="text" name="TitreNews" id="titre" />
	        </p>
	                       
	        <p>
	                <label for="image">Image : </label>
	                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
	                <input type="file" name="ImageNews" id="image" />
	        </p>
	                        
	        <p>
	                <label for="contenu">Contenu :</label>
	                <textarea cols="40" rows="3" name="ContenuNews"></textarea>
	        </p>
	 
	        <p>
	                <input type="submit" name="InsererNews" value="Insérer" />
	                <input type="reset" name="Recommencer" value="Recommencer" />
	        </p>
	</fieldset>
</form>
<?php include 'footer.php'