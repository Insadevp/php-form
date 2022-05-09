<?php


// afficher img en webp
$imagePath = 'test.png';

$im = imagecreatefrompng($imagePath);

$newImagePath = str_replace("png", "webp",$imagePath);

$quality = 50;

imagewebp($im, $newImagePath, $quality);

echo '<img src="test.png" style="width:1000px;">';
echo '<p>Taille png : '.round(filesize('test.png')/1024).' ko</p>';
echo '<img src="test.png" style="width:1000px;">';
echo '<p>Taille webp : '.round(filesize('test.webp')/1024).' ko</p>';