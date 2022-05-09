<?php
class film {
	
	public $cnx;
	private $req;
	private $s;
	private $r;
	private $e;
	private $a;
	
	// On appelle la méthode listeFilms automatiquement
	public function __construct() {
		//On essaie de se connecter
		try{
			$this->$cnx = new PDO("mysql:host=localhost;dbname=Exo_PDO", 'root', '');
			//On définit le mode d'erreur de PDO sur Exception
			$this->$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		/*On capture les exceptions si une exception est lancée et on affiche
		 *les informations relatives à celle-ci*/
		catch(PDOException $e){
		  echo "Erreur : " . $e->getMessage();
		}
    }

    public function listeFilms() {
		//Requête simple avec query
		$req = "SELECT * FROM filmsdiff ORDER BY nbDiff DESC LIMIT 20";
		$s = $this->$cnx->query($req)->fetchall();

		foreach($s as $r) {
			echo '<p>';
			echo $r['titre']. ', diffusé '.$r['nbDiff'].' fois';
			echo '</p>';
		}
    }
	public function listeAnnee($a) {
			$req = "SELECT * FROM filmsdiff WHERE annee = :tralala ORDER BY nbDiff DESC";
			$s = $this->$cnx->prepare($req);
			$s->bindParam('tralala', $a);
			$s->execute();
		foreach($s as $r) {
			echo '<p>';
			echo $r['titre']. ', diffusé '.$r['nbDiff'].' fois';
			echo '</p>';
		}

	}
}
$films = new film;
$films->listeAnnee(1995);