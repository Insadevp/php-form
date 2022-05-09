<?php include('include/header.php'); ?>
</head>

<body>
    <?php
    // On crée une condition pour se connecter
    switch (isset($_GET['action'])) {
            // Affichage par défaut (le formulaire)
        default:
    ?>
    <form action="login.php?action=verif" method="post">
        <label for="tralala">Login</label>
        <input type="text" id="tralala" name="tsointsoin">
        <label for="pouet">Mot de passe</label>
        <input type="text" id="pouet" name="gloup">
        <input type="checkbox" name="cookie" value="1"><label for="">Rester connecté</label>
        <button>Se connecter</button>
    </form>
    <?php
            break;
            // Quand on valide le formulaire, on arrive sur cette partie
        case 'verif':
            //			echo $_POST['cookie'];
            // On se connecte à la BDD
            $cnx = new PDO("mysql:host=localhost;dbname=cci-cms", "root", "");
            // On prépare la requête de vérification du login transmis par le formulaire
            $s = $cnx->prepare('SELECT * FROM cms_users WHERE login=?');
            // On exécute la requête
            $s->execute([$_POST['tsointsoin']]);
            // Si le login n'est pas bon (on vérifie en comptant le nb de résultat)
            if ($s->rowCount() == 0) {
                echo "Pas le bon login";
            } else {
                // Si le login est bon
                $r = $s->fetch();
                // On vérifie le mdp crypté dans la BDD
                if (password_verify($_POST['gloup'], $r['mdp'])) {
                    // Si j'ai coché la case rester connecté
                    if ($_POST['cookie'] == "1") {
                        // Je crée mes 2 cookies (ici valable une heure)
                        setcookie("login", $r['login'], time() + 3600);
                        setcookie("mdp", $r['mdp'], time() + 3600);
                    }

                    // Si c'est bon on crée la variable de session
                    $_SESSION['login'] = $r['login'];
                    // Et on se redirige vers la page index.php
                    header('Location:index.php');
                } else {
                    // Sinon on laisse un msg
                    echo "Pas le bon mot de passe";
                }
            }
            break;
    }
    ?>
    <?php include('include/footer.php'); ?>