<?php
include 'header.php';

if (!empty($_POST)) {

	$login = !empty($_POST['login']) ? $_POST['login'] : '';
	$pass = !empty($_POST['pass']) ? $_POST['pass'] : '';

	if (!empty($login) && !empty($pass)) {

		$query = $db->prepare('SELECT * FROM user WHERE user_email = :login');
		$query->bindValue('login', $login, PDO::PARAM_STR);
		$query->execute();
		$user = $query->fetch();

		if (!empty($user)) {

			if (password_verify($pass, $user['user_pass'])) {

				$_SESSION['user_id'] = $user['user_id'];
				$_SESSION['lastname'] = $user['user_lastname'];
				$_SESSION['firstname'] = $user['user_firstname'];

				header('Location: index.php');
				exit();
			}
		}
	}
	echo '<div class="alert alert-danger" role="alert">Erreur de connexion</div>';
}

?>

	<div class="container login">

		<form class="form-signin" method="POST" novalidate>
			<h2 class="form-signin-heading">Authentification</h2>

			<label for="login" class="sr-only">Nom d'utilisateur</label>
			<input type="email" id="login" name="login" class="form-control" placeholder="Nom d'utilisateur" required autofocus>

			<label for="pass" class="sr-only">Mot de passe</label>
			<input type="password" id="pass" name="pass" class="form-control" placeholder="Mot de passe" required>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember" value="1"> Se souvenir de moi
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
		</form>

	</div> <!-- /container -->

<?php include_once 'footer.php' ?>