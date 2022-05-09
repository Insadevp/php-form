<?php
session_start();
$cnx = new PDO("mysql:host=localhost;dbname=Exo_PDO", 'root', 'root');

$s = $cnx->prepare("SELECT * FROM tokenTable WHERE token=? AND email=?");
$s->execute([$_GET['token'], $_GET['mail']]);
$r = $s->fetch();
//if(($_GET['token']==$r['token'])&&($_GET['mail']==$_r['mail'])) {
	$_SESSION['mail']= $r['email'];
	echo $r['email'];
/*} else {//
	echo 'Erreur identifiants';
}*/


?>