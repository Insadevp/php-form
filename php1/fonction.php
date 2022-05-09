<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $fruit = 'orange';
    $legume='zemmour';
function fraise($bam, $boum) {
    echo $bam.' '.$boum;
}
fraise($fruit, $legume);
if($fruit == $legume){
echo 'ratatouille';
}else {
    echo 'purée';
}

$film = ['Tik Tik boom', 'spiderman', 'superman', 'Aquaman','Ironman'];
for ($i=0;$i < count($film); $i++){
    echo $film[$i].'<br>';
}
class test {
    public $a;
    public $b;
    public function affiche($a, $b) {
        echo $a.' '.$b;
    }


}
$moi = new test;
$moi-> affiche('olivier','allegret')


    ?>
</body>
</html>