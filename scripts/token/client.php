<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Document sans titre</title>
</head>

<body>
<h1>Mon email est</h1>
<p id="test"></p>
<?php
	switch ($_GET['action']) {
		default: 
		?>
			<form action="?action=login" method="post">
				<label for="">email</label>
				<input type="text" name="mail">
				<button>Z'envoyer</button>
			</form>
		<?php
		break;
		case 'login':
			echo $_SESSION['mail'];
			?>
			<p id="email"></p>
			<script>
			let email = new XMLHttpRequest(); 
			email.open("GET", "token.php?token=" + localStorage.toto + "&mail=<?php echo $_POST['mail'];?>", true); 
			email.send();
			email.onreadystatechange = function() { 
				if(email.readyState == 4) {
					let mail = email.responseText
					document.querySelector('#email').innerHTML = mail
				}
			} 
			email.send(null); 
		</script>

			<?php
		break;
	}
?>
</body>
</html>