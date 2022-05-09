<?php
class film {
	
	// On déclare la variable titre en private
	private $titre;
    
	// On appelle la méthode listeFilms automatiquement
	public function __construct() {
        $this->listeFilms();
    }

    public function listeFilms() {
        // Si une donnée est transmise de la BDD, On l'affiche
		if (isset($this->titre)) {
			echo '<p>';
            echo $this->titre;
			echo '</p>';
		  // Si non
        } else {
            echo "Pas de film enregistré.\n";
        }
    }
}
// connexion à la BDD
require_once('cnx.php');
// On crée la requête
$req = "SELECT * FROM filmsdiff WHERE derDiff=?";
// On la prépare
$s = $cnx->prepare($req);
// Crée une instance de la class film
$s->setFetchMode(PDO::FETCH_CLASS, 'film');
// On passe la variable dans l'exécute
$s->execute([2017]);
// On récupère toutes les données en fonction de la clause WHERE
$films = $s->fetchall();