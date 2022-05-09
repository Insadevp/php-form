<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Document sans titre</title>
</head>

<body>
	<?php
	switch($_GET['action']) {
		default:
			?>
	<form action="?action=save" method="post">
		<label for="">email</label>
		<input type="text" name="mail">
		<button>Z'envoyer</button>
	</form>
			<?php
		break;
		case 'save':
			$token = sha1(random_bytes(20));
			?>
	<script>
			localStorage.setItem('toto', '<?php echo $token;?>')
	</script>
			<?php
			$cnx = new PDO("mysql:host=localhost;dbname=Exo_PDO", 'root', 'root');
			$ins = $cnx->prepare("INSERT INTO tokenTable SET token=?, email=?, date=?");
			$ins->execute([$token, $_POST['mail'], date('Y-m-d h:i:s')]);
			echo $token;
		break;
	}
	?>
</body>
</html>