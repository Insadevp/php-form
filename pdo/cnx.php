<?php
$servername = 'localhost';
$bdd = 'Exo_PDO';
$username = 'root';
$password = '';

//On essaie de se connecter
try{
	$cnx = new PDO("mysql:host=$servername;dbname=$bdd", $username, $password);
	//On définit le mode d'erreur de PDO sur Exception
	$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

/*On capture les exceptions si une exception est lancée et on affiche
 *les informations relatives à celle-ci*/
catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}