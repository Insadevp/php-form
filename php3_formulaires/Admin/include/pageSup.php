<?php
echo '<h2> Supprimer une page</h2>';
switch ($_GET['action']) {
        // On liste les pages à supprimer
    default:
        echo '<h3> Liste des pages à Supprimer</h3>';
        $s = $cnx->prepare("SELECT * FROM cms_pages ORDER BY id DESC");
        $s->execute();
        $i = 0;
        echo '<form action="index.php?page=sup&action=tout" method="post">';
        while ($r = $s->fetch()) {
            $lien = 'index.php?page=sup&action=confirm&id=' . $r['id'];
            echo '<p><a href="' . $lien . '">' . $r['id'] . ' - ' . $r['titre'] . '</a>';
            echo '<input type="hidden" name="id[' . $i . ']" value="' . $r['id'] . '">';
            echo '<input type="checkbox" name="sup[' . $i . ']" value="1">';
            echo  '</p>';
            $i++;
        }
        echo '<input type="hidden" name="total" value="' . $i . '">';
        echo '<button>Supprimer les lignes</button>';
        echo '</form>';

        break;

        // On confirme la suppression
    case 'confirm':
        echo '<h3> Confirmer la suppression</h3>';
        $s = $cnx->prepare("SELECT * FROM cms_pages WHERE id=?");
        $s->execute([$_GET['id']]);
        $r = $s->fetch();
        $lien = 'index.php?page=sup&action=delete&id=' . $r['id'];
        echo '<p><a href="' . $lien . '">Confirmez la suppression de la page ' . $r['id'] . ' - ' . $r['titre'] . '</a></p>';
        break;

        // On supprimer
    case 'delete':
        echo '<h3> Page supprimée</h3>';
        // Je supprime ma page dans la BDD
        $del = $cnx->prepare("DELETE FROM cms_pages WHERE id=?");
        $del->execute([$_GET['id']]);
        break;

        // on confirme la supprission
    case 'tout':
        echo '<h3>pages  supprimées</h3>';
        for ($i = 0; $i <= $_POST['total']; $i++) {
            if ($_POST['sup'][$i] == 1) {
                $del = $cnx->prepare("DELETE FROM cms_pages WHERE id=?");
                $del->execute([$_POST['id'][$i]]);
            }
        }
        break;
}