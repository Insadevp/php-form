<?php
class maClass
{
    public $g;
    public $j;
    //	 public $rest;
    static private $cnx = null;

    public function __construct()
    {
        try {
            self::$cnx = new PDO("mysql:host=localhost;dbname=json_api", 'root', '');
            self::$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function mavaleur1($g, $j)
    {
        echo $g . " - " . $j;
        $ins = self::$cnx->prepare("INSERT INTO api SET type= ?, datas=?");
        $ins->execute([$g, $j]);
    }
    public function mavaleur2($g, $j)
    {
        // Je supprime la chaine mavaleur de la methode
        $rest = str_replace("mavaleur", "", $g);
        //J'enlève 1 à la valeur restante pour cible la méthode précédente
        $i = $rest - 1;
        // Je récupère les valeurs de la méthode précédente
        $s = self::$cnx->prepare("SELECT * FROM api WHERE type= ?");
        $s->execute(['mavaleur' . $i]);
        $r = $s->fetch();
        // Je décode le json récupérer dans la Bdd
        $ext = json_decode($r['datas'], true);
        // J'extrais les valeurs du json
        foreach ($ext as $line) {
            echo $line;
        }
    }
    public function mavaleur3($g, $j)
    {
        echo $g . " - " . $j;
        $ins = self::$cnx->prepare("INSERT INTO api SET type= ?, datas=?");
        $ins->execute([$g, $j]);
    }
    public function mavaleur4($g, $j)
    {
        $rest = str_replace("mavaleur", "", $g);
        $i = $rest - 1;
        $s = self::$cnx->prepare("SELECT * FROM api WHERE type= ?");
        $s->execute(['mavaleur' . $i]);
        $r = $s->fetch();
        $ext = json_decode($r['datas'], true);
        foreach ($ext as $line) {
            echo $line;
        }
    }
    public function erreur()
    {
        echo 'Ceci est une erreur';
    }
}