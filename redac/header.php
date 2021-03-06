<?php
session_name('blogpirate20_session');
session_start();

include '../inc/db.php';
include 'config.php';

// On récupère la page en cours, $_SERVER['PHP_SELF'] renvoie le chemin en entier, basename permet de garder seulement le nom du fichier
$current_page = basename($_SERVER['PHP_SELF']);

// on définit ce qu'on insère dans le bloc de connexion
$connect= !empty($_SESSION['log'])==='open'? $_SESSION['firstname']: '';

/*if($current_page != 'login.php'){
	if(empty($_SESSION['log']) || $_SESSION['log'] != 'open'){
		header('location:login.php');
	}
} */
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="site de rédaction du blog des pirates de l'école XXXX">
		<meta name="author" content="Alice Turpin">
		<!-- <link rel="icon" href="img/favicon.ico"> -->
		<title>Blog Pirates - Rédaction</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
		<header id="header">
			<div class="container">
				<h2>Rédaction du Blog des Pirates du 20ème</h2>
				<h3 id="log"><?= $connect ?></h3>
				<a href="../index.php" alt="Acceuil" title="Acceuil">Accès au site</a>
				<a href="logout.php" alt="Déconnexion" title="Déconnexion">Déconnexion</a>
				<div></div>
			</div>
		</header>
		<main id="main">
			<div class="container">
			<?php 
			if($current_page != 'login.php'){ ?>
				<div class="row">
				<?php
				include 'sidebar.php';
			}


