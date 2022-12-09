<?php
session_start();
$string = $_SESSION["captcha"] ?? "";

$start_x = 0;
$start_y = 0;
$end_x = strlen($string)*30;
$end_y = strlen($string)*10;

$im = imagecreatetruecolor($end_x, $end_y);
$white = imagecolorallocatealpha($im,255,255,255,.5);

imageline($im, 0, rand($start_y, $end_y), $end_x, rand($start_y, $end_y), $white);
imageline($im, 0, rand($start_y, $end_y), $end_x, rand($start_y, $end_y), $white);
imageline($im, 0, rand($start_y, $end_y), $end_x, rand($start_y, $end_y), $white);

for ($i = 0; $i < strlen($string); $i++)
  imagettftext($im, 24, -5, $i*30, rand(20,50), $white, rand()%2? "./centaur.ttf": "./comic.ttf", $string[$i]);

header("Content-type: image/png");
imagepng($im);