<?php
switch ($_GET['action']) {
	default:
		echo '<h1> Créer un cours</h1>';
		?>
		<form action="index.php?page=creaMatiere&action=coursCrea" method="post">
			<label for="">Matière</label>
			<input type="text" name="cours">
			<button>Enregistrer</button>
		</form>

<?php
	break;
	case 'coursCrea':
		echo '<h1> Cours créé</h1>';
		$s = $cnx->prepare('INSERT INTO sdn_matieres SET nom=?');
		$s->execute([$_POST['cours']]);
		?>
		<h2>Enregistrer un autre cours</h2>
		<form action="index.php?page=creaMatiere&action=coursCrea" method="post">
		<label for="">Matière</label>
		<input type="text" name="cours">
		<button>Enregistrer</button>

		<?php
		$s = $cnx->query('SELECT * FROM sdn_matieres ORDER BY nom asc');
		while ($r = $s->fetch()) {
			echo '<p>';
			echo $r['nom'];
			echo '<p>';			
		}
	break;
}
?>