<?php
echo '<h1> Modifier une page</h1>';
switch ($_GET['action']) {
        // On liste les pages à modifier
    default:
        echo '<h1> Liste des pages à modifier</h1>';
        $s = $cnx->prepare("SELECT * FROM cms_pages ORDER BY id DESC");
        $s->execute();
        while ($r = $s->fetch()) {
            $lien = 'index.php?page=modif&action=edit&id=' . $r['id'];
            echo '<p><a href="' . $lien . '">' . $r['id'] . ' - ' . $r['titre'] . '</a></p>';
        }
        break;
        // Edition de la page
    case 'edit':
        echo '<h1> Et marcel</h1>';
        // J'édite ma page dans un formulaire
        $s = $cnx->prepare("SELECT * FROM cms_pages WHERE id=?");
        $s->execute([$_GET['id']]);
        $r = $s->fetch();
?>
<form action="index.php?page=modif&action=update&id=<?php echo $_GET['id']; ?>" method="post">


    <label for="">Auteur</label>
    <input type="text" name="auteur" value="<?php echo $r['auteur']; ?>">
    <label for="">Balise titre</label>
    <input type="text" name="titre" value="<?php echo $r['titre']; ?>" required>
    <label for="">Meta description</label>
    <input type="text" name="description" value="<?php echo $r['description']; ?>">
    <label for="">Menu</label>
    <input type="text" name="menu" value="<?php echo $r['menu']; ?>">

    <label for="">Contenu</label>
    <textarea name="contenu" id="contenu"><?php echo $r['contenu']; ?></textarea>
    <input type="checkbox" name="publier" value="1" <?php if ($r['publier'] == 1) {
                                                                echo "checked";
                                                            } ?>>
    <label for="">Publier</label>
    <button>Modifier les données</button>
</form>
<?php
        break;
        // On enregistre les modifications
    case 'update':
        echo '<h1> Page mise à jour</h1>';
        // Je mets à jour ma page dans la BDD
        $upd = $cnx->prepare("UPDATE cms_pages SET auteur=?, titre=?, description=?, menu=?, contenu=?, dateMod=?, publier=? WHERE id=?");
        // Condition ternaire pour vérifier la publication
        $publier = isset($_POST['publier']) ? $_POST['publier'] : 0;

        $upd->execute([$_POST['auteur'], $_POST['titre'], $_POST['description'], $_POST['menu'], $_POST['contenu'], date("Y-m-d H:i:s"), $publier, $_GET['id']]);
        break;
}

?>