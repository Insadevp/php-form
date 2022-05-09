<?php
$imagePath = 'test.jpg';

$im = imagecreatefromjpeg($imagePath);

$newImagePath = str_replace("jpg", "webp",$imagePath);

$quality = 50;

imagewebp($im, $newImagePath, $quality);

echo '<img src="test.jpg" style="width:1000px;">';
echo '<p>Taille jpg : '.round(filesize('test.jpg')/1024).' ko</p>';
echo '<img src="test.webp" style="width:1000px;">';
echo '<p>Taille webp : '.round(filesize('test.webp')/1024).' ko</p>';