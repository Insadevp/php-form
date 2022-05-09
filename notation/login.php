<?php 
include('inc/top.php'); ?>
</head>

<body>
    <?php
	if(isset($_GET['type'])) {
		$page = 'etudiant';
		$table = 'etudiants';
		$type = '&type=e';
	} else {
		$page = 'admin';
		$table = 'users';
		$type = '';
	}
    // On cree une condition pour ce connecter 
    switch ($_GET['action']) {
            // Affichage par default (le formulaire)
        default:
			echo $table. ' '.$page;
    ?>
            <form action="login.php?action=verif<?php echo $type;?>" method="post" class="formulaire-login">

                <label for="login">Login</label>
                <input type="text" id="login" name="login" required>

                <label for="mdp">Password</label>
                <input type="password" id="mdp" name="mdp" required>

                <label for="cookie">Rester connecté</label>
                <input type="checkbox" name="cookie" id="cookie" checked value="1">

                <button class="btn-connexion">Connexion</button>

            </form>
    <?php
            break;
            // Quand on valide le formulaire n varrive sur cette partie 
        case 'verif':
            // On se connecte a la bdd
            // On prepare la requete de verification du plugin transmis par le formulaire
			echo $table;
            $s = $cnx->prepare("SELECT * FROM sdn_".$table." WHERE mail=? ");
            // on execute la requete
           $s->execute([$_POST['login']]);
            // Si le login n'est pas bon (on verifie en comptant le nb de résultat)
            if ($s->rowCount() == 0) {
                echo "Pas le bon login";
				echo $_POST['login'].' ';
                 echo $_SESSION['id'].' ';
                   echo $_SESSION['login'].' ';
                   echo $_SESSION['niveau'].' ';
				
            } else {
                //  Si le login est bon
                $r = $s->fetch();
                // On vérifie le mdp crypté dans la bdd
               if (password_verify($_POST['mdp'], $r['mdp'])) {
                    // Si j'ai coché la case rester connecté
                    if ($_POST['cookie'] == "1") {
                        // Je crée mes 2 cookies (ici valable une heure)
                        setcookie("login", $r['mail'], time() + 3600);
                        setcookie("mdp", $r['mdp'], time() + 3600);
                    }
                    // Si c'est bon on crée le variable de session
                    $_SESSION['id'] = $r['id'];
                    $_SESSION['login'] = $r['mail'];
                    $_SESSION['niveau'] = $r['niveau'];
					header('Location:'.$page.'.php');
                } else {
                    // Sinon on laisse un msg
                    echo "Pas le bon mot de passe";
                };
            };

            break;
    }
    ?>

    <?php include('inc/footer.php'); ?>