<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


echo "bonjour";
$cnx = new PDO("mysql:host=localhost;dbname=cci-cms", "root", "");
$ins = $cnx->prepare('INSERT INTO cms_pages SET auteur=?, titre=?, description=?, contenu=?, dateCrea=?, 
dateMod=?, publier=?');
//condition ternaire pour 
$publier = isset($_POST['publier']) ? $_POST['publier'] : 0;

$ins->execute([
    $_POST['auteur'], $_POST['titre'], $_POST['description'], $_POST['contenu'],
    date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $_POST['publier']
]);
?>
</body>

</html>