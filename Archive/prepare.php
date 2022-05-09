<?php
// Affiche les erreurs de script
require_once('error.php');

// On utilisera require_once au lieu de include afin que l'exécution du script s'arrête
require_once('cnx.php');
$req = "SELECT * FROM filmsdiff ORDER BY nbDiff=?";
$s = $cnx->prepare($req);
$s->execute([2020]);
while ($r = $s->fetch()) {
    echo '<p>';
    echo $r['titre'] . ', diffusé ' . $r['nbDiff'] . ' fois';
    echo '</p>';
}
// methode habituelle : on peut utiliser bindValue ou bindParam(prepare1)