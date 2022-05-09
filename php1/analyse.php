<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bonjour</h1>
    <?php
     $cnx = new PDO("mysql:host=localhost;dbname=cci-test", "root", "");
     $s = $cnx->prepare("INSERT INTO etudiant SET nomEtudiant = ?, prenomEtudiant = ?");

    //  $s->execute([$_POST['badaboum'], $_POST['splash']]);

    //  echo $_POST['badaboum'].' '. $_POST['splash'];


    // echo $_POST['scales'].' '. $_POST['scales'];

    /* echo $_POST['trip-start'].' '. $_POST['trip-start'];

     echo $_POST['prodId'].' '. $_POST['prodId'];

     echo $_POST['userId'];
     echo $_POST['username'];
      */
    ?>

   
</body>
</html>