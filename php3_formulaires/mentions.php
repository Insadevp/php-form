<?php

$cnx = new PDO("mysql:host=localhost;dbname=cci-cms", "root", "");
$s = $cnx->prepare("SELECT valeur FROM cms_options WHERE titre=?");

$s->execute(['theme']);
$r = $s->fetch();
$theme = $r['valeur'];

$s->execute(['langue']);
$r = $s->fetch();
$langue = $r['valeur'];


?>
<!doctype html>
<html lang="<?php echo $langue; ?>">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titre; ?></title>
    <meta name="Description" content="<?php echo $description; ?>">
    <link rel="stylesheet" href="themes/<?php echo $theme; ?>/style.css">
</head>

<body>
    <?php
    $cnx = new PDO("mysql:host=localhost;dbname=cci-cms", "root", "");
    $s = $cnx->query("SELECT valeur FROM cms_options");
    $i = 1;
    while ($r = $s->fetch()) {
        $ml[$i] = $r['valeur'];
        $i++;
    }
    ?>
    <header id="menu">
        <a href="index.php"><img src="images/logo.png" alt="Mon logo"></a>
        <?php
        $s = $cnx->prepare("SELECT id, titreMenu FROM cms_pages WHERE publier=?");
        $s->execute([1]);
        echo '<nav>';
        echo '<a href="index.php">Accueil</a>';
        while ($r = $s->fetch()) {
            echo '<a href="index.php?id=' . $r['id'] . '">' . $r['titreMenu'] . '</a>';
        }
        echo '</nav>';
        ?>
    </header>

    <h1>Mentions Légales</h1>
    <p>Site édité par <?php echo  $ml[4]; ?> au capital de 10 euros, <?php echo  $ml[9]; ?>, <?php echo  $ml[10]; ?>
        <?php echo  $ml[11]; ?></p>
    <p>Siret : 853 070 019 00015</p>
    <p>Directeur de publication : <?php echo  $ml[6]; ?> <?php echo  $ml[5]; ?> : <?php echo  $ml[8]; ?>,
        <?php echo  $ml[7]; ?></p>
    <p>Site hébergé par OVH, 2 rue Kellermann - 59100 Roubaix, tél : 1007</p>
    <p>Ce site n'utilise pas les cookies</p>
    <p>Votre mail est collecté dans le seul but de répondre à une demande transmise par la rubrique contact. Il n'est en
        aucun cas transmis à un tiers sans votre consentement.</p>
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