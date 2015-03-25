<?php
// On récupère la page en cours, $_SERVER['PHP_SELF'] renvoie le chemin en entier, basename permet de garder seulement le nom du fichier
$current_page = basename($_SERVER['PHP_SELF']);
require_once('inc/db.php');
require_once('inc/config.php');

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Le blog des pirates du mini- séjour de la classe xxx de l'école xxx à xxxx">
		<meta name="author" content="Alice Turpin">
		<link rel="icon" href="img/favicon.ico">
		<title>Blog Pirates</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
		<header id="header">
			<div class="container-fluid">
			<h1>Les Pirates du XXeme</h1>
			<?php include 'nav.php'; ?>
			</div>
		</header>
		<main id="main">
			<div class="container-fluid">


