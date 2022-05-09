<?php
switch ($_GET['action']) {
	default:
		echo '<h1> Enregistrer un professeur</h1>';
		?>
		<form action="index.php?page=creaProf&action=profCrea" method="post">
			<label for="">Nom</label>
			<input type="text" name="nom">
			<label for="">Prénom</label>
			<input type="text" name="prenom">
			<label for="">Mail</label>
			<input type="text" name="mail">
			<label for="">Mot de passe</label>
			<input type="text" name="mdp">
			<?php
		$s = $cnx->query("SELECT * FROM sdn_matieres ORDER BY nom ASC");
		$i=0;
		while($r = $s->fetch()) {
			echo '<p>';
			echo '<input type="checkbox" name="mat['.$i.']" value="'.$r['id'].'">';
			echo '<label>'.$r['nom'].'</label>';
			echo '<select name="classe['.$i.']">';
			$t = $cnx->query("SELECT * FROM sdn_classe ORDER BY nom ASC");
			while($u = $t->fetch()) {
				echo '<option value="'.$u['id'].'">'.$u['nom'].'</option>';
			}			
			echo '</select>';
			echo '</p>';
			$i++;
		}
			?>
			<input type="hidden" name="nb" value="<?php echo $i;?>">
			<button>Enregistrer</button>
		</form>

<?php
	break;
	case 'profCrea':
		echo '<h1> Professeur enregistré</h1>';
		$s = $cnx->prepare('INSERT INTO sdn_users SET nom=?, prenom=?, niveau=?, mdp=?, mail=?');
		$s->execute([$_POST['nom'], $_POST['prenom'], 1, password_hash($_POST['mdp'], PASSWORD_DEFAULT), $_POST['mail']]);
		$s = $cnx->query("SELECT max(id) as user FROM sdn_users");
		$r = $s->fetch();
		$user = $r['user'];
		for($i=0;$i<$_POST['nb'];$i++) {
			if(isset($_POST['mat'][$i])){
				$s=$cnx->prepare("INSERT INTO sdn_profs SET idUser=?, idClasse=?, idMatiere=?");
				$s->execute([$user, $_POST['mat'][$i], ]);
			}
		}
	break;
}











?>