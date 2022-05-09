<?php

$titre = "ma page d'accueil";
$description = "ma description de ma page d'accueil";

include('includs/header.php'); 
$_SESSION['patatra'] = "ceci est ma variable de session";
?>

</head>
<body>

<?php include('includs/menu.php'); ?>
<h1>
       <?php echo $titre;?>
    </h1> 
<?php include('includs/footer.php'); ?>
