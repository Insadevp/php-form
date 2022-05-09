<?php
// Affiche les erreurs de script
require_once('error.php');

// On utilisera require_once au lieu de include afin que l'exécution du script s'arrête
require_once('cnx.php');

// On met la table dans une variable
$table = 'filmsdiff';

//Requête simple avec query
$req = "SELECT * FROM $table ORDER BY nbDiff DESC LIMIT 20";
$s = $cnx->query($req)->fetchall();

foreach($s as $r) {
	echo '<p>';
	echo $r['titre']. ', diffusé '.$r['nbDiff'].' fois';
//	echo $r[1]. ', diffusé '.$r[6].' fois';
//	echo $r->titre. ', diffusé '.$r->nbDiff.' fois';
	echo '</p>';
	
//Ré-essayer le fetchall avec les différents états PDO::
}
?>