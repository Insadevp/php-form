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
			echo '<h1> Créer un cours</h1>';
	?>
    <form action="cours.php?action=coursCrea" method="post">
        <label for="">Matière</label>
        <input type="text" name="cours">
        <label for="">Prof</label>
        <input type="text" name="prof">
        <button>Enregistrer</button>
    </form>

    <?php
			break;
		case 'coursCrea':
			echo '<h1> Cours créé</h1>';
			$s = $cnx->prepare('INSERT INTO cours SET nom=?, prof=?');
			$s->execute([$_POST['cours'], $_POST['prof']]);
		?>
    <h2>Enregistrer un autre cours</h2>
    <form action="cours.php?action=coursCrea" method="post">
        <label for="">Matière</label>
        <input type="text" name="cours">
        <label for="">Prof</label>
        <input type="text" name="prof">
        <button>Enregistrer</button>

        <?php
			$s = $cnx->query('SELECT * FROM cours ORDER BY nom asc');
			while ($r = $s->fetch()) {
				echo '<p>';
				echo $r['nom'];
				echo ' - ';
				echo $r['prof'];
				echo '<p>';
			}
			break;
	}
		?>

</body>

</html>