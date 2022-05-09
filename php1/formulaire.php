<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #form{
            display:flex;
            flex-direction: column;
            font-family: sans serif;
            width:600px;
            margin: auto;
            font: size 1.4em;

        }

        #form input{
            padding:5px;
            border-radius: 5px;
            box-shadow: 0 0 5px #ccc;
            border:1px solid #bbb;
            font-size: 1.4em;
        }

        #form textarea{
            min-height:200px;
            padding:5px;
            box-shadow: 0 0 5px #ccc;
            border:1px solid #bbb;
            font-size: 1.4em;
        }


    </style>
</head>
<body>
<?php
// On crée une condition pour afficher le formulaire ou le script de conversion
 switch ($_GET['action']) {
	 // Affichage du formulaire par défaut
	default:
		//  On crée des variables : nom , prenom, email, sujet, msg
	?>
<form id="form" action="formulaire.php?action=envoi" method="post">
		<label for="dossier">Nom </label>
		<input type="text" name="Nom">
        <label for="dossier">Prenom </label>
		<input type="text" name="Prenom">
        <label for="dossier">Email </label>
		<input type="text" name="Email">
        <label for="dossier">Sujet </label>
		<input type="text" name="Sujet">
        <label for="dossier">Message </label>
		
		<textarea name="msg"> </textarea>
        <button>Envoyer</button>
</form>

<?php
break;
case 'envoi':
    		// Remplacez par votre email
		$to = 'insaf.saadaoui83@gmail.com';
		$subject =  'Message de '.$_POST['Prenom'].' '.$_POST['Nom'].'('.$_POST['Sujet'].')';
		$from = $_POST['Email'];

		// Pour envoyer du courrier HTML, l'en-tête Content-type doit être défini.
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Créer les en-têtes de courriel
		$headers .= 'From: '.$_POST['Email']."\r\n".
			'Reply-To: '.$_POST['Email']."\r\n" .
			'X-Mailer: PHP/' . phpversion();

		// Composer un simple message électronique HTML
		$message = '<html><body>';
		$message .= utf8_decode(nl2br($_POST['msg']));
		$message .= '</body></html>';

		// Envoi d'email
		if(mail($to, $subject, $message, $headers)){
			echo 'Votre message a été envoyé avec succès.';
		} else{
			echo 'Impossible d\'envoyer des courriels. Veuillez réessayer.';
		}

    break;
}
?>


        <!-- <form method="post" action="mail.php">
        <label>Tape ton message ici pour m'écrire</label>
        <textarea id="subject" name="subject" rows="10" cols="30" name="message"></textarea>
        <input type="submit">
    </form> -->

      

<!-- // $retour = mail('destinataire@free.fr', 'Envoi depuis la page Contact', $_POST['message'], 'From: webmaster@monsite.fr');
//     if ($retour)
//         echo '<p>Votre message a bien été envoyé.</p>'; -->
        
</body>
</html>