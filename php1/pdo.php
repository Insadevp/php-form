<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //on se connecte à la base 
    $cnx = new PDO("mysql:host=localhost;dbname=cci-test", "root", "");

//on prepare la requete
    $s = $cnx->prepare("SELECT * FROM etudiant WHERE prenomEtudiant = ?");
    //on execute la requete
    $s->execute(['insaf']);
    //on recuoere les donnees
    echo '<ul>';
    while($r = $s->fetch()){
        echo '<li>'.$r[1].' '.$r['prenomEtudiant'].'</li>';
    }
   echo '</ul>';
    ?>
</body>
</html>