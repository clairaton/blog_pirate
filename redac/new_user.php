<?php include 'header.php'

// on définit les champs du formulaire dans un tableau
$fields=array(
	'user_lastname'=> array(
		'maxsize'=> 50 ,
		'minsize' => 1,
		'name'=> 'lastname',
		'type'=> 'text',
		'required' => 'true',
		'placeholder' => 'Nom'
		 ),
	'user_firstname'=> array(
		'maxsize'=> 50 ,
		'minsize' => 1,
		'name'=> 'firstname',
		'type'=> 'text',
		'required' => 'true',
		'placeholder' => 'Prénom'
		 ),
	'user_email'=> array(
		'maxsize'=> 20 ,
		'minsize' => 1,
		'name'=> 'email',
		'type'=> 'email',
		'required' => 'true',
		'placeholder' => 'Email'
		 ),
	'pass'=> array(
		'maxsize'=> 10 ,
		'minsize' => 6,
		'name'=> 'pass',
		'type'=> 'password',
		'required' => 'true',
		'placeholder' => 'Mot de passe'
		 ),
	'confirm'=> array(
		'maxsize'=> 15 ,
		'minsize' => 0,
		'name'=> 'confirm_pass',
		'type'=> 'password',
		'required' => 'true',
		'placeholder' => 'Confirmation Mot de passe'
		 )
	);

// on initialise les variables d'info
$error = false;
$errors =array();
$thanks = false;
foreach($fields as $key => $array){
	$$key = '';
}

// On regarde si le formulaire a été soumis
if(!empty($_POST)){
	// on vérifie les champs
	foreach($fields as $key => $array){
		$$key = $_POST[$array['name']];
		if($array['required'] && empty($_POST[$array['name']])){
			$error = true;
			$errors[$key] = "Le champs est obligatoire!";
		}
		if((strlen($_POST[$array['name']])< $array['minsize']) || (strlen($_POST[$array['name']])> $array['maxsize'])){
			$error = true;
			$errors[$key] = "Votre saisie doit être comprise entre ".$array['minsize']." et ".$array['maxsize']." caractères.";
		}
		if(($array['type'] == 'email') && !filter_var($_POST[$array['name']], FILTER_VALIDATE_EMAIL)){
			$error= true;
			$errors[$key]= "Veuillez renseigner un email valide";
		}

	}
	// on regarde si la confirm est égale au mot de passe
	if(strcmp($confirm,$pass) !== 0){
		$error = true;
		$errors['confirm']="Vous n'avez pas tapé le même mot de passe!";
	}

	if(!$error){
		// on vérifie que l'email n'est pas déjà enregistré
		$stmt = $db->prepare('SELECT id FROM user WHERE user_email =:user_email');
		$stmt -> bindValue('user_email',$user_email,PDO::PARAM_STR);
		$stmt -> execute();
		$nb_result = $stmt -> rowCount();
		// si l'email existe dans notre base, on comptabilise une erreur
		if($nb_result > 0){
			$error= true;
			$errors['account']= "Cet email existe déjà!";
			echo '<a href="login.php" alt="connection">Se connecter à un compte existant</a>';
		}

		// on crypte le mot de passe
		$user_pass= password_hash ($pass , PASSWORD_BCRYPT);
		// on enregistre les données dans notre base de donnée
		$stmt=$db -> prepare('INSERT INTO user (user_lastname,user_firstname,user_email,user_pass) VALUES (:user_lastname,:user_firstname,:user_email,:user_pass)');
		$stmt -> bindValue('user_lastname',$user_lastname,PDO::PARAM_STR);
		$stmt -> bindValue('user_firstname',$user_firstname,PDO::PARAM_STR);
		$stmt -> bindValue('user_email',$user_email,PDO::PARAM_STR);
		$stmt -> bindValue('user_pass',$user_pass,PDO::PARAM_STR);
		$stmt -> execute();
		$new_user = $db -> lastInsertId();
		// on passe la variable thanks à vrai si un nouvel utilisateur a bien été enregistré
		if(!empty($new_user)){
			$thanks = true;
			$_SESSION['id']=$new_user;
		}
	}
}
?>


	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<?php
			if(!$thanks){?>
			<form class="form-horizontal" action="register.php" method="POST" novalidate>
			<?php
			//on crée une boucle d'affichage des champs du formulaire
			foreach($fields as $key => $array){ ?>
				<div class="form-group">
					<label for="<?=$array['name']?>" class="label"><?=$array['placeholder']?></label>
						<input type="<?=$array['type']?>" name="<?=$array['name']?>" id="<?=$array['name']?>" placeholder="<?=$array['placeholder']?>" value="<?=$$key?>">
				</div>
				<?= !empty($errors[$key])? "<p class='alert alert-danger'>Erreur</p>" : ''; ?>

			<?php }	?>

				<div class="form-group">
					<button type="submit" class="btn btn-default">Inscription</button>
				</div>
			</form>
			<?= !empty($errors['account'])?  "<p class='alert alert-danger'>".$errors['account']."</p>" : '' ; ?>
			<?php }
			echo $thanks?"<h2>Merci $user_firstname</h2>":'' ?>
		</div>
	</div>
<?php include 'footer.php'