<header>
	<nav>
		
		<a href="admin.php">Home</a>
		<?php 
		
		if(isset($_SESSION['niveau'])&&($_SESSION['niveau']==0)) {?>
		<a href="admin.php?page=creaEtudiant">Création étudiant</a>
		<a href="admin.php?page=creaMatiere">Création Matière</a>
		<a href="admin.php?page=creaProf">Création Professeur</a>
		<?php }
		if(isset($_SESSION['niveau'])) {?>
		<a href="admin.php?page=saisieNotes">Noter</a>
		<?php }?>
		<a href="logout.php">Déconnexion</a>
	</nav>
</header>