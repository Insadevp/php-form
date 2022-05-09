<?php
include('id.php');
try {
	$cnx = new PDO($bddType.':host='.$bddHost.';dbname='.$bddName.';', $bddUser, $bddPw);
} catch(PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>