<?php
include('inc/top.php');
if(!isset($_SESSION['login'])) {
	header('location:login.php?type=e');
} 
if(isset($_SESSION['titre'])) {
	$titre = $_SESSION['titre'];
} else {
	$titre = "Vos notes";
}


?>
</head>
<body>
<?php
include('inc/header.php');
echo 'Bonjour '.$_SESSION['login'];
	// Je sélectionne les notes de l'étudiant connecté
	$s = $cnx->prepare("SELECT * FROM sdn_notes WHERE idEtudiant=?");
	$s->execute([$_SESSION['id']]);
	while ($r = $s->fetch()) {
		// Je récupère le string de la matière
		$t = $cnx->prepare("SELECT nom FROM sdn_matieres WHERE id=?");
		$t->execute([$r['idMatiere']]);
		$u = $t->fetch();
		// J'affiche matière : note
		echo '<p>';
		echo $u['nom'].' : '.$r['note'].'<br>';
		echo '</p>';
	}
include('inc/footer.php');
?>

	
	
	
	
	
	
	
	
	