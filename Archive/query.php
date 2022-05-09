<?php
// Affiche les erreurs de script
require_once('error.php');

// On utilisera require_once au lieu de include afin que l'exécution du script s'arrête
require_once('cnx.php');

// On met la table dans une variable
$table = 'filmsdiff';

//Requête simple avec query
$s = $cnx->query("SELECT * FROM $table ORDER BY nbDiff DESC LIMIT 10");

//Par défaut fetch permet de récupérer la ligne suivante d'un jeu de résultats PDO
echo '<h1>Différents types de fetch</h1>';
while ($r = $s->fetch(PDO::FETCH_OBJ)) {
	echo '<p>';
	// echo $r['titre'] . ', diffusé ' . $r['nbDiff'] . ' fois';
	// echo $r[1] . ', diffusé ' . $r[6] . ' fois';
	echo $r->titre . ', diffusé ' . $r->nbDiff . ' fois';
	echo '</p>';
}

/*
Test n°1
Commenter la ligne 18 et décommenter la ligne 19

Résultat : on peut utiliser les deux méthodes avec PDO::FETCH_BOTH

Ensuite copiez PDO::FETCH_BOTH dans la parenthèse de $s->fetch()

PDO::FETCH_BOTH : retourne un tableau indexé par les noms de colonnes et aussi par les numéros de colonnes, commençant à l'index 0, comme retournés dans le jeu de résultats



Test n°2 : PDO::FETCH_ASSOC
Commenter la ligne 19 et décommenter la ligne 18

Ensuite copiez PDO::FETCH_ASSOC dans la parenthèse de $s->fetch()
Cela fonctionne à la ligne 18 mais pas à la ligne 19.

PDO::FETCH_ASSOC: retourne un tableau indexé par le nom de la colonne comme retourné dans le jeu de résultats



Test n°3 : PDO::FETCH_OBJ
Commenter les lignes 18 et 19 et décommenter la ligne 20

Ensuite copiez PDO::FETCH_OBJ dans la parenthèse de $s->fetch()
Cela fonctionne à la ligne 20 mais pas à la ligne 19 ni 18.

PDO::FETCH_OBJ : retourne un objet anonyme avec les noms de propriétés qui correspondent aux noms des colonnes retournés dans le jeu de résultats



Test n°4 : PDO::FETCH_NUM
Commenter les lignes 18 et 20 et décommenter la ligne 19

Ensuite copiez PDO::FETCH_NUM dans la parenthèse de $s->fetch()
Cela fonctionne à la ligne 20 mais pas à la ligne 18 ni 20.

PDO::FETCH_NUM : retourne un tableau indexé par le numéro de la colonne comme elle est retourné dans votre jeu de résultat, commençant à 0



Test n°5 : PDO::FETCH_LAZY
Décommenter les lignes 18, 19, 20

Ensuite copiez PDO::FETCH_LAZY dans la parenthèse de $s->fetch()
Cela fonctionne avec toutes les lignes.

PDO::FETCH_LAZY : combine PDO::FETCH_BOTH et PDO::FETCH_OBJ, créant ainsi les noms des variables de l'objet, comme elles sont accédées

*/