<?php
$cnx = new PDO("mysql:host=localhost;dbname=exo_pdo", 'root', '');

$s = $cnx->query("SELECT * FROM filmsdiff ORDER BY nbDiff DESC LIMIT 10 ");
while ($r = $s->fetch()) {
    echo '<p>';
    echo $r['titre'] . ' ' . $r['nbDiff'];
    echo '</p>';
}