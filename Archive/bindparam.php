<?php
// Affiche les erreurs de script
require_once('error.php');

// On utilisera require_once au lieu de include afin que l'exécution du script s'arrête
require_once('cnx.php');

// On met la table dans une variable
$table = 'filmsdiff';
$annee = 2010;
$nb = 10;
//Requête simple avec query
$req = "SELECT * FROM $table WHERE annee < :annee AND nbDiff > :nb ORDER BY nbDiff DESC";
$s = $cnx->prepare($req);
$s->bindParam('annee', $annee, PDO::PARAM_INT);
$s->bindParam('nb', $nb, PDO::PARAM_INT);
// Ceci montre la différence entre bindParam et bindValue. En changeant la valeur ci-dessous celle-ci sera prise en compte par bindParam mais pas par bindValue
$nb = 20;
$s->execute();

while($r = $s->fetch()) {
	echo '<p>';
	echo $r['titre']. ', diffusé '.$r['nbDiff'].' fois';
	echo '</p>';
	}

//Essayer en mettant la date 2010 avec des guillements et en remplaçant PDO::PARAM_INT par PDO::PARAM_STR (la différence est que la date ser traitée comme un entier INT ou une chaine de caractère STR)


?>