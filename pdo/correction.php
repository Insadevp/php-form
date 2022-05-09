<?php
$sql = 'mysql';
$host = 'localhost';
$bdd = 'Exo_PDO';
$user = 'root';
$mdp = '';

$cnx = new PDO("$sql:host=$host;dbname=$bdd", $user, $mdp);

$req = "SELECT * FROM filmsdiff ORDER BY nbDiff DESC LIMIT 10";

$s = $cnx->query($req);
while($r = $s->fetch(PDO::FETCH_LAZY)) {
	echo '<p>';
//	echo $r['titre']. ' '.$r['nbDiff'];
//	echo $r[1]. ' '.$r[6];
	echo $r->titre. ' '.$r->nbDiff;
	echo '</p>';
}