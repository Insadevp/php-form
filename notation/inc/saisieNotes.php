<?php
switch ($_GET['action']) {
	default:
		echo '<h1> Saisir les notes</h1>';
		echo 6 * 7;
		if($_SESSION['niveau']==0) {
//			$s = $cnx->query("SELECT * FROM sdn_profs ORDER BY")
			
		}
		if($_SESSION['niveau']==1) {
			// On sélectionne les informations du prof
			$s = $cnx->prepare("SELECT * FROM sdn_profs WHERE idUser=?");
			$s->execute([$_SESSION['id']]);
			while($r = $s->fetch()) {
				// On récupère le nom de la matière
				$t = $cnx->prepare("SELECT * FROM sdn_matieres WHERE id=?");
				$t->execute([$r['idMatiere']]);
				$u = $t->fetch();
				// On récupère le nom de la classe
				$v = $cnx->prepare("SELECT * FROM sdn_classe WHERE id=?");
				$v->execute([$r['idClasse']]);
				$w= $v->fetch();
				echo '<p>';
				// On crée le lien pour aller saisir les notes
				echo '<a href="index.php?page=saisieNotes&action=saisie&mat='.$r['idMatiere'].'">'.$u['nom'].' - '.$w['nom'].'</a>';
				echo '</p>';
			}
		}
		?>


<?php
	break;
	case 'saisie':
		echo '<h1>Oh saisis tes notes</h1>';
		$s = $cnx->prepare("SELECT * FROM sdn_profs WHERE idUser=? AND idMatiere=?");
		$s->execute([$_SESSION['id'], $_GET['mat']]);
		$r = $s->fetch();
		$classe = $r['idClasse'];
		$matiere = $_GET['mat'];
		$s = $cnx->prepare("SELECT * FROM sdn_etudiants WHERE idClasse=?");
		$s->execute([$classe]);
		$i = 0;
		echo '<form action="index.php?page=saisieNotes&action=noter" method="post">';
		while ($r = $s->fetch()) {
			echo '<p>';
			echo '<label>'.$r['nom'].' '.$r['prenom'].'</label>';
			echo '<input type="hidden" name="id['.$i.']" value="'.$r['id'].'">';
			echo '<input type="number" name="note['.$i.']" max="20" min="0" step="0.5">';
			echo '</p>';
			$i++;
		}
		echo '<input type="hidden" name="matiere" value="'.$matiere.'">';
		echo '<input type="hidden" name="nb" value="'.$i.'">';
		echo '<button>Noter</button>';
	break;
	case 'noter':
		echo '<h1>Notation enregistrée</h1>';
		for ($i=0;$i<$_POST['nb'];$i++) {
			if(isset($_POST['note'][$i])) {
				$ins = $cnx->prepare("INSERT INTO sdn_notes SET idEtudiant=?, idMatiere=?, note=?");
				$ins->execute([$_POST['id'][$i], $_POST['matiere'], $_POST['note'][$i]]);
			}
		}
	break;
}





















?>