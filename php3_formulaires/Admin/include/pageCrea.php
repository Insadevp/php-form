<?php
switch (isset($_GET['action'])) {
        // On affiche le formulaire pour créer la page
    default:
?><form action="index.php?page=creer&action=save" method="post">

    <label for="">Auteur</label>
    <input type="text" name="auteur">
    <label for="">Balise titre</label>
    <input type="text" name="titre" required>
    <label for="">Meta description</label>
    <input type="text" name="description">
    <label for="">Menu</label>
    <input type="text" name="menu">
    <label for="">Contenu</label>
    <textarea name="contenu" id="contenu"></textarea>
    <input type="checkbox" name="publier" value="1"><label for="">Publier</label>
    <button>Enregistrer</button>
</form>
<script src="../build/ckeditor.js"></script>
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
        // On enregistre la page dans la BDD
    case 'save':
        echo '<h2>Page enregistrée</h2>';
        $ins = $cnx->prepare("INSERT INTO cms_pages SET auteur=?, titre=?, description=?, menu=?, contenu=?, dateCrea=?, dateMod=?, publier=? ");
        // Condition ternaire pour vérifier la publication
        $publier = isset($_POST['publier']) ? $_POST['publier'] : 0;

        $ins->execute([$_POST['auteur'], $_POST['titre'], $_POST['description'], $_POST['menu'], $_POST['contenu'], date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $publier]);
        break;
}