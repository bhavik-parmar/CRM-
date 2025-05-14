<?php
header('Content-type: image/jpg');

// Font file (make sure the path is correct)
$font = "MillionFeeling.otf"; // Place this file in the same folder or update the path

// Certificate background
$image = imagecreatefromjpeg("certificate.jpg");

// Font color (dark gray/black)
$color = imagecolorallocate($image, 19, 21, 22);

// Name to be printed
$name = "Bhavik Parmar";

// Draw name on image
imagettftext($image, 70, 0, 700, 800, $color, $font, $name);

// Output image
imagejpeg($image);

// Cleanup
imagedestroy($image);
?>
