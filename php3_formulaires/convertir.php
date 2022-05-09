<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    switch ($_GET['action']) {
            // Affichage du formulaire par défaut
        default:
    ?>
    <form action="convertir.php?action=convertir" method="post" enctype="multipart/form-data">

        <input type="file" name="img">

        <button>Envoyer</button>
    </form>
    <?php
        case 'convertir':
            echo $_FILES['img']['name'] . '<br>';
            echo $_FILES['img']['type'] . '<br>';
            echo $_FILES['img']['size'] . '<br>';
            echo $_FILES['img']['tmp_name'] . '<br>';
            // on recupere l'extention
            $extention = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
            // on enregistre le fichier
            move_uploaded_file($_FILES["img"]["tmp_name"], "img/ressoci.png" . $_FILES['img']['name']);
            break;
    }
    ?>
</body>

</html>