<?php include('include/header.php'); ?>
<link rel="stylesheet" href="../themes/theme1/style.css">
</head>

<body>

    <?php

    // On vérifie les connexions permanentes (Cookie)
    if (isset($_COOKIE['login'])) {
        // On vérifie que les cookies correspondent aux données dans la table user
        $cnx = new PDO("mysql:host=localhost;dbname=cci-cms", "root", "");
        $s = $cnx->prepare('SELECT * FROM cms_users WHERE login=? AND mdp=?');
        $s->execute([$_COOKIE['login'], $_COOKIE['mdp']]);
        // Si ce n'est pas le cas, direction login.php
        if ($s->rowCount() == 0) {
            header('Location:login.php');
        }
        // Si c'est le cas, on crée une session
        else {
            $_SESSION['login'] = $_COOKIE['login'];
        }
    }
    // Si nous sommes connectés, la variable de session a été créée, on affiche Bonjour
    if (isset($_SESSION['login'])) {
    ?>
    <header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="?page=creer">Créer une page</a>
            <a href="?page=modif">Modifier une page</a>
            <a href="?page=sup">Supprimer une page</a>
            <a href="?page=options">options</a>
            <a href="logout.php">Déconnexion</a>
        </nav>
    </header>



    <?php
        $cnx = new PDO("mysql:host=localhost;dbname=cci-cms", "root", "");
        switch ($_GET['page']) {
            default:
                echo '<h1> Bienvenue sur le CMS</h1>';
                break;
            case 'creer':
                echo '<h1> Créer une page</h1>';
                include('include/pageCrea.php');
                break;
            case 'modif':
                echo '<h1> Modifier une page</h1>';
                include('include/pageModif.php');
                break;
            case 'sup':
                echo '<h1> Supprimer une page</h1>';
                include('include/pageSup.php');
                break;
            case 'options':
                echo '<h1> Options </h1>';
                include('include/options.php');
                break;
        }
    } else {
        // Si on n'est pas connecté, on renvoie à la page login
        header('Location:login.php');
    }


    ?>
    <script src="js/ckeditor.js"></script>
    <script src="js/ckeditorConfig.js"></script>

    <?php include('include/footer.php'); ?>