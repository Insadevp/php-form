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
			echo '<h1> Créer un étudiant</h1>';
	?>
    <form action="etudiant.php?action=etudiantCrea" method="post">
        <label for="">Nom</label>
        <input type="text" name="nom">
        <label for="">Prénom</label>
        <input type="text" name="prenom">
        <label for="">Classe</label>
        <input type="text" name="classe">
        <button>Enregistrer</button>
    </form>

    <?php
			break;
		case 'etudiantCrea':
			echo '<h1> Etudiant créé</h1>';
			$s = $cnx->prepare('INSERT INTO etudiant SET nom=?, prenom=?, classe=?');
			$s->execute([$_POST['nom'], $_POST['prenom'], $_POST['classe']]);
		?>
    <h2>Enregistrer un autre étudiant</h2>
    <form action="etudiant.php?action=etudiantCrea" method="post">
        <label for="">Nom</label>
        <input type="text" name="nom">
        <label for="">Prof</label>
        <input type="text" name="prenom">
        <label for="">Classe</label>
        <input type="text" name="classe">
        <button>Enregistrer</button>

        <?php
			$s = $cnx->query('SELECT * FROM etudiant ORDER BY nom asc');
			while ($r = $s->fetch()) {
				echo '<p>';
				echo $r['nom'];
				echo ' - ';
				echo $r['prenom'];
				echo ' - ';
				echo $r['classe'];
				echo '<p>';
			}
			break;
	}
		?>

</body>

</html>