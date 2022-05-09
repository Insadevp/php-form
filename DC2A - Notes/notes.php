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
				echo '<a href="notes.php?action=cours&id=' . $r['id'] . '">' . $r['nom'] . '</a>';
				echo '</p>';
			}
			break;
		case 'cours':
			echo '<h1> Saisir les notes</h1>';
			echo '<form action="notes.php?action=save" method="post">';
			echo '<input type="hidden" name="cours" value="' . $_GET['id'] . '">';
			$s = $cnx->query("SELECT * FROM etudiant ORDER BY nom asc");
			$i = 0;
			while ($r = $s->fetch()) {
				echo '<p>';
				echo $r['nom'] . ' ' . $r['prenom'];
				echo ' <input type="text" placeholder="note" name="note[' . $i . ']">';
				echo '<input type="hidden" name="etudiant[' . $i . ']" value="' . $r['id'] . '">';
				echo '</p>';
				$i++;
			}
			echo '<input type="hidden" name="nb" value="' . $i . '">';
			echo '<button>Enregistrer</button>';
			echo '</form>';
			break;
		case 'save':
			for ($i = 0; $i < $_POST['nb']; $i++) {
				$ins = $cnx->prepare("INSERT INTO notes SET idEtudiant=?, idCours=?, note=?");
				$ins->execute([$_POST['etudiant'][$i], $_POST['cours'], $_POST['note'][$i]]);
			}
			break;
	}
	?>












</body>

</html>