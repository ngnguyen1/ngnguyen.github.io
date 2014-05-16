<?php

$captcha = imagecreate(160,56);


$white = imagecolorallocate($captcha, 255, 255, 255);
$black = imagecolorallocate($captcha, 0, 0, 0);
$red = imagecolorallocate($captcha, 208, 29, 9);
$font = 'arial.ttf';
$string = md5(microtime().rand());

$text = substr($string, 0, 5);

imagettftext($captcha, 24, 10, 25, 45, $red, $font, $text);

header('content-type: image/png');
imagepng($captcha);
imagedestroy($captcha);

?>