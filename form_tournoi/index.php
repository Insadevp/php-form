<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document sans titre</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
	switch ($_GET['action']) {
		default:
	?>
    <form id="playoff" action="index.php?action=creer" method="post">
        <h2>Cochez les cases nécessaires à la création des playoffs</h2>
        <?php
				// On crée un tableau avec les valeurs que l'on veut passer
				$data = [90, 64, 32, 16, 8, 4, 2, 1];
				// On créer une boucle pour créer le formulaire
				for ($i = 0; $i < count($data); $i++) {
					// Si je suis sur 90 ou 1, je remplace les titres par barrages et finale
					if ($data[$i] == 90) {
						$titre = 'Barrages';
					} else if ($data[$i] == 1) {
						$titre = 'Finale';
					} else {
						$titre = '1/' . $data[$i];
					}
					// J'écris chaque ligne de mon formulaire avec des noms de variable de type array afin qu'elles soient uniques
					echo '  
		<label>' . $titre . '</label>
		<input type="checkbox" name="po[' . $i . ']" value="' . $data[$i] . '">
		<label>A/R</label>
		<input type="checkbox" name="ar[' . $i . ']">
		<input type="date" name="date[' . $i . ']">
		<hr>
		';
				}
				?>
        <button>Créer les phases</button>
        <?php
			break;
		case 'creer':
			// Boucle pour vérifier les cases cochées du formulaire (8 entrées)
			for ($i = 0; $i <= 7; $i++) {
				// Si la case checkbox PO est cochée
				if (isset($_POST['po'][$i])) {
					// J'écris le titre
					echo '1/' . $_POST['po'][$i] . '<br>';
					// Je lance une boucle avec le nombre de matches définis par la variable PO[]
					for ($n = 1; $n <= $_POST['po'][$i]; $n++) {
						// On met la date en Français
						echo date('d/m/Y', strtotime($_POST['date'][$i])) . ' - match ' . $n . '<br>';
						// Si j'ai coché la case A/R
						if (isset($_POST['ar'][$i])) {
							// J'affiche le match retour
							// On met la date à 7 jours
							$retour = date('d/m/Y', strtotime($_POST['date'][$i] . '+ 7 days'));
							echo $retour . ' - match retour ' . $n;
						}
						// Je trace une ligne
						echo '<hr>';
					}
				}
			}
			break;
	}

		?>
    </form>

</body>

</html>