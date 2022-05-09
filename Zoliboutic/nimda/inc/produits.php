<h1>Gestion des produits</h1>
<nav>
<a href="?action=p&page=crea">Créer un produit</a>
<a href="?action=p&page=mod">Modifier un produit</a>
<a href="?action=p&page=opt">Créer une option</a>
<a href="?action=p&page=optM">Gérer les options</a>
</nav>
<?php
include('../inc/_cnx2Bdd.php');
$page = isset($_GET['page']) ? $_GET['page']: "";
	switch ($page) {
		case 'crea':
			echo '<h2>Créer un produit</h2>';
			?>
<form action="index.php?action=p&page=save" method="post">
	<label for="">Nom du produit</label>
	<input type="text" name="nom" required> 
	<label for="">Référence du produit</label>
	<input type="text" name="ref" required> 
	<label for="">Description</label>
	<textarea name="description" ></textarea>
	<label for="">Prix de vente HT</label>
	<input type="text" name="puht">
	<label for="">TVA</label>
	<select name="tva">
	 <option value="20">20%</option>
	 <option value="10">10%</option>
	 <option value="7">7%</option>
	 <option value="5.5">5.5%</option>
	 <option value="2.1">2.1%</option>
	</select>
	<label for="">Stock</label>
	<input type="text" name="stock">
	<button>Enregistrer</button>
</form>
			<?php
		break;
		case 'save':
			echo '<h2>Sauvegarder un produit</h2>';
			$s = $cnx->prepare('INSERT INTO es_produits SET ref=?, cat=?, nom=?, description=?, puht=?, tva=?, stock=?, idFournisseur=?, publier=?');
			$s->execute(['ZER42RE', 'Textile', $_POST['nom'], $_POST['description'], $_POST['puht'], $_POST['tva'], 10, 1, 1]);
		break;
		case 'mod':
			echo '<h2>Modifier ou supprimer un produit</h2>';
			$s = $cnx->query("SELECT * FROM es_produits ORDER BY nom asc");
			echo '<form action="index.php?action=p&page=sup" method="post">';
			$i=0;
			while($r = $s->fetch()) {
				echo '<p>';
				echo '<a href="index.php?action=p&page=edit&id='.$r['id'].'">'.$r['nom'].'</a>';
				echo '<input type="hidden" name="id['.$i.']" value="'.$r['id'].'"/>';
				echo '<input type="checkbox" name="sup['.$i.']" value="1"/>';
				echo '</p>';
				$i++;
			}
			echo '<input type="hidden" name="nb" value="'.$i.'">';
			echo '<button>Supprimer</button>';
			echo '</form>';
		break;
		case 'edit':
			echo '<h2>Editer un produit</h2>';
			$s = $cnx->prepare("SELECT * FROM es_produits WHERe id=?");
			$s->execute([$_GET['id']]);
			$r = $s->fetch();
			?>
	<form action="index.php?action=p&page=upd&id=<?php echo $_GET['id'];?>" method="post">
		<label for="">Nom du produit</label>
		<input type="text" name="nom" value="<?php echo $r['nom'];?>" > 
		<label for="">Référence du produit</label>
		<input type="text" name="ref" value="<?php echo $r['ref'];?>"> 
		<label for="">Description</label>
		<textarea name="description" ><?php echo $r['description'];?>"</textarea>
		<label for="">Prix de vente HT</label>
		<input type="text" name="puht" value="<?php echo $r['puht'];?>">
		<label for="">TVA</label>
		<select name="tva">
		 <option value="20" <?php if($r['tva']==20) echo "SELECTED";?>>20%</option>
		 <option value="10" <?php if($r['tva']==10) echo "SELECTED";?>>10%</option>
		 <option value="7" <?php if($r['tva']==7) echo "SELECTED";?>>7%</option>
		 <option value="5.5" <?php if($r['tva']==5.5) echo "SELECTED";?>>5.5%</option>
		 <option value="2.1" <?php if($r['tva']==2.1) echo "SELECTED";?>>2.1%</option>
		</select>
		<label for="">Stock</label>
		<input type="text" name="stock" value="<?php echo $r['stock'];?>">
		<button>Enregistrer</button>
	</form>
			<?php		
			break;
		case 'upd':
			echo '<h2>Mise à jour du produit</h2>';
			$s = $cnx->prepare('UPDATE es_produits SET ref=?, cat=?, nom=?, description=?, puht=?, tva=?, stock=?, idFournisseur=?, publier=? WHERE id=?');
			$s->execute(['ZER42RE', 'Textile', $_POST['nom'], $_POST['description'], $_POST['puht'], $_POST['tva'], 10, 1, 1, $_GET['id']]);
		break;
		case 'sup':
			echo '<h2>Supprimer les produits</h2>';
			for ($i=0; $i <=$_POST['nb'];$i++) {
				$sup = $cnx->prepare("DELETE FROM es_produits WHERE id=?");
				$sup->execute([$_POST['id'][$i]]);
			}
		break;

		case 'opt':
			echo '<h2>Créer une option</h2>';
		break;
		case 'optM':
			echo '<h2>Modifier une option</h2>';
		break;
	}
?>