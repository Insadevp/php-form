<?php
switch ($_GET['action']) {
    default:
        $s = $cnx->query("SELECT * FROM cms_options");
        echo '<form action="index.php?page=options&action=modif"
 method="post"  enctype="multipart/form-data" >';
        echo '<input type="file" name="img">';
        $i = 0;

        // on scanne le dossier theme avec un array_slice 
        $files = array_slice(scandir('../themes/'), 2);

        // on fait la boucle qui recupere les valeurs dans la table options
        while ($r = $s->fetch()) {
            // on affiche les valeurs au champ titre
            echo '<label>' . $r['titre'] . '</label>';
            // si le champ titre est egal au theme
            if ($r['titre'] == "theme") {
                // on recuper l'array-slice pour faire un selectavec les valeurs 
                echo '<select name="val[' . $i . ']">';
                // on integre les valeurs du tableau  $files 
                foreach ($files as $file) {
                    if ($file == $r['valeur']) {
                        $select = "SELECTED";
                    } else {
                        $select = "";
                    }

                    echo '<option value="' . $file . '">' . $file . '</option>';
                }
                echo '</select>';
            } else {
                // si ce n'est pas theme , on met les valeurs dans inputs
                echo '<input type="text" name="val[' . $i . ']" value="' . $r['valeur'] . '">';
            }



            // on transmettre l'id de l'option
            echo '<input type="hidden" name="id[' . $i . ']" value="' . $r['id'] . '">';
            echo '<br>';
            $i++;
        }
        // on recupere la valeur finale de l'increment pour transmettre à la boucle 
        echo '<input type="hidden" name="total" value="' . $i . '">';
        echo '<button>Modifier</button>';
        echo '</form>';
        break;
    case 'modif':
        for ($i = 0; $i <= $_POST['total']; $i++) {
            $mod = $cnx->prepare("UPDATE cms_options SET valeur=? WHERE id=?");
            $mod->execute([$_POST['val'][$i], $_POST['id'][$i]]);
        }
        if (isset($_FILES['img']['name'])) {
            // on recupere l'extention
            $extension = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
            // on enregistre le fichier
            move_uploaded_file($_FILES["img"]["tmp_name"], "../img/logo." . $extension);
        }
        break;
}