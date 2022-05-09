<?php
include('inc/top.php');
if(!isset($_SESSION['login'])) {
	header('location:login.php');
} 
if(isset($_SESSION['titre'])) {
	$titre = $_SESSION['titre'];
} else {
	$titre = "Bienvenue sur la dimitrinistration";
}


?>
</head>
<body>
<?php
include('inc/header.php');
echo 'Bonjour '.$_SESSION['login'];
switch ($_GET['page']) {
	default:
	break;
	case 'creaEtudiant':
		include('inc/creaEtudiant.php');
	break;
	case 'creaMatiere':
		include('inc/creaMatiere.php');
	break;
	case 'creaProf':
		include('inc/creaProf.php');
	break;
	case 'saisieNotes':
		include('inc/saisieNotes.php');
	break;
		
}	
	
	
include('inc/footer.php');
?>

	
	
	
	
	
	
	
	
	