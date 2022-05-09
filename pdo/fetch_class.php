<?php
class Film
{
    private $titre;

    public function __construct() {
		echo $this->titre = "bla";
    }

    public function monFilm()
    {
        if (isset($this->titre)) {
            echo "<p> {$this->titre}</p>";
        } else {
            echo "I don't have a name yet.\n";
        }
    }
}
require_once('cnx.php');
$s = $cnx->query("SELECT * FROM filmsdiff");
$s->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Film');
$film = $s->fetch();
$film->monFilm();
?>