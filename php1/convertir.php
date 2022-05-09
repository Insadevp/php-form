<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document sans titre</title>
</head>

<body>
    <?php
	// On crée une condition pour afficher le formulaire ou le script de conversion
	switch ($_GET['action']) {
			// Affichage du formulaire par défaut
		default:
			// On crée 3 variables : nom du dossier, taux de compression, suppression des fichiers originaux
	?>
    <form action="convertir.php?action=convertir" method="post">
        <label for="dossier">Nom du dossier</label>
        <input type="text" name="dossier">
        <label for="ratio">Taux de compression</label>
        <select name="ratio">
            <?php
					// Boucle pour créer les options du taux de compression sur le SELECT 
					for ($i = 100; $i > 10; $i -= 10) {
						echo '<option value="' . $i . '">' . $i . '</option>';
					}
					?>
        </select>
        <label for="sup">Supprimer les fichiers originaux</label>
        <input type="checkbox" name="sup" value="1">
        <button>Convertir</button>
    </form>
    <?php
			break;
			// A l'envoi du formulaire, on lance le script de conversion des images
		case 'convertir':
			// On scanne le dossier ciblé
			$scandir = scandir($_POST['dossier'] . '/');
			// On récupère chaque fichier du dossier
			foreach ($scandir as $fichier) {
				// On récupère l'extension du fichier 
				$extension = strtolower(pathinfo($fichier, PATHINFO_EXTENSION));
				// Si l'extension est png ou jpg, on lance la conversion
				if (($extension == 'png') || ($extension == 'jpg')) {
					// Si png, on récupère la méthode de conversion du fichier en png
					if ($extension == 'png') {
						$crea = imagecreatefrompng;
					}
					// Si jpg, on récupère la méthode de conversion du fichier en jpg
					if ($extension == 'jpg') {
						$crea = imagecreatefromjpeg;
					}
					// On initialise le fichier dans son format d'origine
					$im = $crea($_POST['dossier'] . '/' . $fichier);
					// On remplace son extension par webp
					$newImagePath = str_replace($extension, "webp", $_POST['dossier'] . '/' . $fichier);
					// On récupère le taux de compression défini dans le formulaire
					$quality = $_POST['ratio'];
					// On convertit en webp
					imagewebp($im, $newImagePath, $quality);
					// On affiche le résultat
					echo $fichier . " converti<br/>";
					// Si on a coché la case suppression des fichiers originaux
					if ($_POST['sup'] == 1) {
						// On supprime le fichier
						$sup = $_POST['dossier'] . '/' . $fichier;
						unlink($sup);
					}
				}
			}
			break;
	}
	?>

</body>

</html>