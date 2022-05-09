<?php
// Affiche les erreurs de script
require_once('error.php');

// On utilisera require_once au lieu de include afin que l'exécution du script s'arrête
require_once('cnx.php');

$req = "SELECT * FROM filmsdiff WHERE derDiff=? AND nbDiff > ?";
$s = $cnx->prepare($req);
$s->execute([2020, 30]);
while ($r = $s->fetch()) {
	echo '<p>';
	echo $r['titre']. ', diffusé '.$r['nbDiff'].' fois';
	echo '</p>';
}