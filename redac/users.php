<?php include 'header.php';
// requête pour récupérer la liste des utilisateurs
$stmt = $db-> query('SELECT * FROM user');
$users = $stmt -> fetchAll();
?>
<h1 class="page-header">Gestion des utilisateurs</h1>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Email</th>
					<th>Statuts</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user) { ?>
				<tr>
					<td><?= $user['user_firstname'] ?></td>
					<td><?= $user['user_lastname'] ?></td>
					<td><?= $user['user_email'] ?></td>
					<td><?= $user['user_status'] ?></td>
					<td>
						<a href="mod_user.php?id=<?= $user['user_id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
						<a href="del_user.php?id=<?= $user['user_id'] ?>"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<button class="btn btn-default">Créer un nouvel utilisateur</button>
	</div>
<?php include 'footer.php';