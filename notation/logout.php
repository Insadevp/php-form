<?php 
    // On démarre la session
    session_start();
    // On supprime la variable de session
    unset($_SESSION['login']);
    unset($_SESSION['id']);
    unset($_SESSION['niveau']);
    setcookie("login");
    setcookie("mdp");
    // On redirige vers la connexion
    header('Location:index.php');
?>