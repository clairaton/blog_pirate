<?php
include_once 'header.php';

$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($id)) {
	exit('Undefined param id');
}

$query = $db->prepare('SELECT user_email FROM user WHERE user_id = :id');
$query->bindValue('id', $id, PDO::PARAM_INT);
$query->execute();
$user = $query->fetch();

if (empty($user)) {
	exit('Undefined user');
}

$confirm = !empty($_GET['confirm']) ? intval($_GET['confirm']) : 0;

if ($confirm === 1) {

	$query = $db->prepare('DELETE FROM user WHERE user_id = :id');
	$query->bindValue('id', $id, PDO::PARAM_INT);
	$query->execute();

	$affected_rows = $query->rowCount();
}
?>

			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

				<?php
				if (!empty($affected_rows)) {
					echo '<div class="alert alert-success" role="alert">'.$affected_rows.' utilisateur(s) supprimé(s)</div>';
					echo redirectJs('users.php', 2);
					exit();
				}
				?>

				<h1 class="page-header">Supprimer un utilisateur</h1>

				Etes-vous sûr de vouloir supprimer l'utilisateur' "<?= $user['user_email'] ?>" ?

				<br><br>

				<a href="?id=<?= $id ?>&confirm=1"><button class="btn btn-danger">Supprimer</button></a>
				<a href="users.php"><button class="btn btn-default">Annuler</button></a>

			</div><!--/.main -->

<?php include_once 'footer.php'; ?>