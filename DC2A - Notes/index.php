<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document sans nom</title>
</head>

<body>
    <?php
	include('header.php');
	$cnx = new PDO('mysql:host=localhost;dbname=DC2ANote', 'root', '');
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	switch ($action) {
		default:
			echo '<h1> Sélectionner une matière</h1>';
			$s = $cnx->query("SELECT * FROM cours ORDER BY nom asc");
			while ($r = $s->fetch()) {
				echo '<p>';
				echo '<a href="index.php?action=liste&id=' . $r['id'] . '">' . $r['nom'] . '</a>';
				echo '</p>';
			}
			break;
		case 'liste':
			$s = $cnx->query("SELECT * FROM etudiant ORDER BY nom asc");
			while ($r = $s->fetch()) {
				$t = $cnx->prepare('SELECT * FROM notes WHERE idCours = ? AND idEtudiant = ?');
				$t->execute([$_GET['id'], $r['id']]);
				$u = $t->fetch();
				echo '<p>';
				echo $r['nom'] . ' ' . $r['prenom'];
				echo ' : ' . $u['note'];
				echo '</p>';
			}

			break;
	}
	?>

</body>

</html>