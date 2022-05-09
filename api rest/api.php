<?php
/*$json = '{
	"type":"mavaleur4",
	"pouet":"tagada"
}';*/
$json = '{
	"type":"mavaleur3"
}';
// On récupère le json sous forme d'array

$obj = json_decode($json, true);
//$obj = json_decode(file_get_contents("php://input"),true);
//$json = $_POST[1];
// On importe la class
require_once('class.php');
// On instancie la class
$classe = new maClass;
// On récupère toutes les méthodes de la class maClass
$mtds = get_class_methods($classe);
// On met la valeur de la clé type dans une variable
$go = $obj['type'];

// Si la valeur est dans le tableau des méthodes
if (in_array($go, $mtds)) {
	// On exécute la méthode
	$classe->$go($go, $json);
} else {
	// Sinon, on affiche l'erreur
	$classe->erreur();
}

/*switch ($obj['type']) {
	default:
		echo $classe->erreur().'<br>';
	break;
	case 'mavaleur1':
		echo $classe->mavaleur1().'<br>';
	break;
	case 'mavaleur2':
		echo $classe->mavaleur2().'<br>';
	break;
	case 'mavaleur3':
		echo $classe->mavaleur3().'<br>';
	break;
	case 'mavaleur4':
		echo $classe->mavaleur4().'<br>';
	break;
}*/