<?php
switch ($_GET['action']) {
	default:
		echo '<h1> Créer un étudiant</h1>';
		?>
		<form action="index.php?page=creaEtudiant&action=etudiantCrea" method="post">
			<label for="">Nom</label>
			<input type="text" name="nom">
			<label for="">Prénom</label>
			<input type="text" name="prenom">
			<label for="">Classe</label>
			<?php
				$s = $cnx->query("SELECT * FROM sdn_classe ORDER BY nom asc");
				echo '<select name="classe">';
				while($r = $s->fetch()) {
					echo '<option value="'.$r['id'].'">'.$r['nom'].'</option>';
				}
				echo '</select>';
			?>
			<label for="">Mot de passe</label>
			<input type="text" name="mdp">
			<label for="">y maile</label>
			<input type="text" name="mail">
			<button>Enregistrer</button>
		</form>

<?php
	break;
	case 'etudiantCrea':
		echo '<h1> Etudiant créé</h1>';
		$s = $cnx->prepare('INSERT INTO sdn_etudiants SET nom=?, prenom=?, idClasse=?, mdp=?, mail=?');
		$s->execute([$_POST['nom'], $_POST['prenom'], $_POST['classe'], password_hash($_POST['mdp'], PASSWORD_DEFAULT), $_POST['mail']]);
		?>
		<h2>Enregistrer un autre étudiant</h2>
		<form action="index.php?page=creaEtudiant&action=etudiantCrea" method="post">
			<label for="">Nom</label>
			<input type="text" name="nom">
			<label for="">Prénom</label>
			<input type="text" name="prenom">
			<label for="">Classe</label>
			<?php
				$s = $cnx->query("SELECT * FROM sdn_classe ORDER BY nom asc");
				echo '<select name="classe">';
				while($r = $s->fetch()) {
					echo '<option value="'.$r['id'].'">'.$r['nom'].'</option>';
				}
				echo '</select>';
			?>
			<label for="">Mot de passe</label>
			<input type="text" name="mdp">
			<label for="">y maile</label>
			<input type="text" name="mail">
			<button>Enregistrer</button>
		</form>
		<?php
		$s = $cnx->query('SELECT * FROM sdn_etudiants ORDER BY nom asc');
		while ($r = $s->fetch()) {
			echo '<p>';
			echo $r['nom'];
			echo ' - ';
			echo $r['prenom'];
			echo ' - ';
			echo $r['idClasse'];
			echo '<p>';			
		}
	break;
}
?>