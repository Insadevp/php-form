<?php

$test = "motdepasse";
$mdp = password_hash($test, PASSWORD_DEFAULT);
echo $mdp;
if (password_verify($test, $mdp)) {
    echo '<br>Le mot de passe est valide !';
} else {
    echo 'Le mot de passe est invalide.';
}

?>
</body>

</html>