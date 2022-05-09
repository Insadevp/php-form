<?php
$cnx = new PDO("mysql:host=localhost;dbname=cci-cms", "root", "");
$s = $cnx->prepare("SELECT valeur FROM cms_options WHERE titre=?");
$s->execute(['theme']);
$r = $s->fetch();
$theme = $r['valeur'];
$s->execute(['langue']);
$r = $s->fetch();
$langue = $r['valeur'];


if (isset($_GET['id'])) {
    $s = $cnx->prepare('SELECT * FROM cms_pages WHERE id=?');
    $s->execute([$_GET['id']]);
    $r = $s->fetch();
    $titre = $r['titre'];
    $description = $r['description'];
    $contenu = $r['contenu'];
} else {
    $titre = 'Bienvenue sur mon site';
    $description = "c'est le site de mon CMS";
    $contenu = 'voici le contenu';
}

?>


<!DOCTYPE html>
<html lang="<?php echo $langue; ?>">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titre; ?></title>
    <meta name="Description" content="<?php echo $description; ?>">
    <link rel="stylesheet" href="themes/<?php echo $theme; ?>/style.css">
</head>

<body id="post-<?php echo $id; ?>" class="global">
    <header>
        <a href="index.php"><img src="img/logo.jpg" alt="Mon logo"></a>
        <?php
        $s = $cnx->prepare('SELECT id, Menu FROM cms_pages WHERE publier=?');
        $s->execute([1]);
        echo '<nav>';
        echo '<a href="index.php">Accueil</a>';
        while ($r = $s->fetch()) {
            echo '<a href="index.php?id=' . $r['id'] . '">' . $r['Menu'] . '</a>';
        }
        echo '</nav>';

        ?>
        <?php echo $contenu;  ?>
    </header>
    <footer id="footerMain">
        <nav>
            <a href="mentions.php">MentionsLégales.</a>
            <a href="">Eum, numquam.</a>
            <a href="">Velit, illum.</a>
            <a href="">Fuga, ipsa.</a>
        </nav>
    </footer>

</body>

</html>