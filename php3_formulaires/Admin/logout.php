<?php
// On démarre la session
session_start();
// On supprime la variable de session
unset($_SESSION['login']);
// On redirige vers la connexion
header('Location:login.php');

?>