<?php include('inc/top.php');?>
</head>

<body>
<?php 
include('inc/header.php');

$action = isset($_GET['action']) ? $_GET['action']: "";

switch($action) {
	default:
		include('inc/home.php');
	break;
	case 'p':
		include('inc/produits.php');
	break;
	case 'c':
		include('inc/clients.php');
	break;
	case 'o':
		include('inc/commandes.php');
	break;
	case 'f':
		include('inc/fournisseurs.php');
	break;
}

include('inc/footer.php');?>
