<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document sans titre</title>
</head>

<body>
    <?php
    $cnx = new PDO("mysql:host=localhost;dbname=cci-cms", "root", "");
    switch ($_GET['action']) {
        default:
            $s = $cnx->prepare("SELECT * FROM cms_pages ORDER BY id DESC");
            $s->execute();
            while ($r = $s->fetch()) {
                $lien = 'modif.php?action=edit&id=' . $r['id'];
                echo '<p><a href="' . $lien . '">' . $r['id'] . ' - ' . $r['titre'] . '</a></p>';
            }
            break;
        case 'edit':
            // J'édite ma page dans un formulaire
            $s = $cnx->prepare("SELECT * FROM cms_pages WHERE id=?");
            $s->execute([$_GET['id']]);
            $r = $s->fetch();
    ?>
    <form action="modif.php?action=update&id=<?php echo $_GET['id']; ?>" method="post">
        <label for="">Auteur</label>
        <input type="text" name="auteur" value="<?php echo $r['auteur']; ?>">
        <label for="">Balise titre</label>
        <input type="text" name="titre" value="<?php echo $r['titre']; ?>" required>
        <label for="">Meta description</label>
        <input type="text" name="description" value="<?php echo $r['description']; ?>">
        <label for="">Contenu</label>
        <textarea name="contenu" id="contenu"><?php echo $r['contenu']; ?></textarea>
        <input type="checkbox" name="publier" value="1" <?php if ($r['publier'] == 1) {
                                                                    echo "checked";
                                                                } ?>><label for="">Publier</label>
        <button>Modifier les données</button>
    </form>
    <script src="ckeditor.js"></script>

    <script>
    ClassicEditor
        .create(document.querySelector('#contenu'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
    </script>

    <?php

            break;
        case 'update':
            // Je mets à jour ma page dans la BDD
            $upd = $cnx->prepare("UPDATE cms_pages SET auteur=?, titre=?, description=?, contenu=?, dateMod=?, publier=? WHERE id=?");
            // Condition ternaire pour vérifier la publication
            $publier = isset($_POST['publier']) ? $_POST['publier'] : 0;

            $upd->execute([$_POST['auteur'], $_POST['titre'], $_POST['description'], $_POST['contenu'], date("Y-m-d H:i:s"), $publier, $_GET['id']]);

            break;
    }
    ?>
</body>

</html>