<?php
$bddType = 'mysql';
$bddHost = 'localhost';
$bddName = 'CCI_Notes';
$bddUser = 'root';
$bddPw = '';
try {
	$cnx = new PDO($bddType.':host='.$bddHost.';dbname='.$bddName.';', $bddUser, $bddPw);
} catch(PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}