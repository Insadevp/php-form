<?php
include('../inc/_cnx2Bdd.php');
?>
<h1>Gestion des clients</h1>

<nav>
    <a href="?action=f&page=crea">Créer une fiche fournisseur</a>
    <a href="?action=f&page=mod">Modifier une fiche fournisseur</a>
</nav>


<?php
switch ($_GET['page']) {
    case 'crea':
        echo '<h2>Créer un fournisseur</h2>';
?>
<form action="index.php?action=f&page=save" method="post">

    <label for="">Nom</label>
    <input type="text" name="nom">

    <label for="">Prénom</label>
    <input type="text" name="prenom">

    <label for="">Adresse</label>
    <input type="text" name="adresse">

    <label for="">Ville</label>
    <input type="text" name="ville">

    <label for="">Cp</label>
    <input type="text" name="cp">

    <label for="">Telephone</label>
    <input type="text" name="tel">

    <label for="">Mail</label>
    <input type="text" name="mail">

    <label for="">Login</label>
    <input type="text" name="login">
    >

    <button>Enregistrer</button>

</form>
<?php
        break;

    case 'save':
        $ins = $cnx->prepare("INSERT INTO es_clients SET nom=?,prenom=?,adresse=?, ville=?, cp=?, tel=?,mail=?,login=?,mdp=?");
        $ins->execute([$_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_POST['tel'], $_POST['mail'], $_POST['login'],]);
        echo ('Votre fournisseur a bien été enregistré avec succes!');

        break;
    case 'mod':
        echo '<h2>Modifier un client</h2>';
        $s = $cnx->query("SELECT * FROM es_clients ORDER BY id DESC");
        $i = 0;
        echo '<form action="index.php?action=f&page=sup" method="post">';
        while ($r = $s->fetch()) {
            $lien = 'index.php?action=f&page=edit&id=' . $r['id'];
            echo '<p><a href="' . $lien . '">' . $r['id'] . ' - ' . $r['prenom'] . '</a>';
            echo '<input type="hidden" name="id[' . $i . ']" value="' . $r['id'] . '">';
            echo '<input type="checkbox" name="sup[' . $i . ']" value="1"';
            echo '</p>';
            $i++;
        }
        echo '<input type="hidden" name="total" value="' . $i . '">';
        echo '<button>Supprimé un fournisseur</button>';
        echo '</form>';
        break;
        break;

    case 'sup':
        echo '<h3>Pages supprimées</h3>';
        for ($i = 0; $i <= $_POST['total']; $i++) {
            if ($_POST['sup'][$i] == 1) {
                $del = $cnx->prepare("DELETE FROM es_clients WHERE id=?");
                $del->execute([$_POST['id'][$i]]);
            }
        }
        break;

    case 'edit':
        // J'édite ma page dans un formulaire
        $s = $cnx->prepare("SELECT * FROM es_clients WHERE id=?");
        $s->execute([$_GET['id']]);
        $r = $s->fetch();
    ?>
<form action="index.php?action=f&page=update&id=<?php echo $_GET['id']; ?>" method="post">

    <label for="">Nom</label>
    <input type="text" name="nom" value="<?php echo $r['nom']; ?>" required>

    <label for="">Prénom</label>
    <input type="text" name="prenom" value="<?php echo $r['prenom']; ?>" required>

    <label for="">Adresse</label>
    <input type="text" name="adresse" value="<?php echo $r['adresse']; ?>">

    <label for="">Ville</label>
    <input type="text" name="ville" value="<?php echo $r['ville']; ?>">

    <label for="">Cp</label>
    <input type="text" name="cp" value="<?php echo $r['cp']; ?>">

    <label for="">Telephone</label>
    <input type="text" name="tel" value="<?php echo $r['tel']; ?>">

    <label for="">Mail</label>
    <input type="text" name="mail" value="<?php echo $r['mail']; ?>" required>

    <label for="">Login</label>
    <input type="text" name="login" value="<?php echo $r['login']; ?>" required>

    <button>Modifier</button>
</form>
<?php
        break;

    case 'update':
        $req = "UPDATE es_clients SET nom= :nom, prenom= :prenom, mail= :mail, login= :login ";
        // vérifier si les champs sont vides
        if (!empty($_POST['adresse'])) {
            $req .= ", adresse= :adresse";
        }
        if (!empty($_POST['ville'])) {
            $req .= ", ville= :ville";
        }
        if (!empty($_POST['cp'])) {
            $req .= ", cp= :cp";
        }
        if (!empty($_POST['tel'])) {
            $req .= ", tel= :tel";
        }
        if (!empty($_POST['mdp'])) {
            $req .= ", mdp= :mdp";
        }
        $req .= " WHERE id= :id";

        //		echo $req;
        // Je mets à jour ma page dans la BDD
        $upd = $cnx->prepare($req);
        // toutes les variables required
        $upd->bindValue('nom', $_POST['nom']);
        $upd->bindValue('prenom', $_POST['prenom']);
        $upd->bindValue('mail', $_POST['mail']);
        $upd->bindValue('login', $_POST['login']);

        // Variables optionnelles
        if (!empty($_POST['adresse'])) {
            $upd->bindValue('adresse', $_POST['adresse']);
        }
        if (!empty($_POST['ville'])) {
            $upd->bindValue('ville', $_POST['ville']);
        }
        if (!empty($_POST['cp'])) {
            $upd->bindValue('cp', $_POST['cp']);
        }
        if (!empty($_POST['tel'])) {
            $upd->bindValue('tel', $_POST['tel']);
        }
        if (!empty($_POST['mdp'])) {
            $upd->bindValue('mdp', password_hash($_POST['mdp'], PASSWORD_DEFAULT));
        }
        $upd->bindValue('id', $_GET['id']);

        $upd->execute();
        echo ('Votre fournisseur a bien été modifié avec succes!');
        break;
}