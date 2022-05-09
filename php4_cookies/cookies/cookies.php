<?php
setcookie('user_id', '1234');
setcookie('user_pref', 'dark_theme', time() + 3600 * 24, '/', '', true, true);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cours PHP & MySQL</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cours.css">
</head>

<body>
    <h1>Titre principal</h1>
    <?php
    if (isset($_COOKIE['user_id'])) {
        echo 'Votre ID de session est le ' . $_COOKIE['user_id'];
    }
    ?>
    <p>Un paragraphe</p>
</body>

</html>