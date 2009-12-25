<?php
session_start();

$alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
// generate the verication code 
$rand = substr(str_shuffle($alphanum), 0, 5);
// choose one of four background images

$image = imagecreatefromjpeg("background3.jpg");
$textColor = imagecolorallocate ($image, 0, 0, 0); 
// write the code on the background image
imagestring ($image, 5, 5, 8, $rand, $textColor); 

// send several headers to make sure the image is not cached 
// taken directly from the PHP Manual

// Date in the past 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
// always modified 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
// HTTP/1.1 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false); 
// HTTP/1.0 
header("Pragma: no-cache"); 

// send the content type header so the image is displayed properly
header('Content-type: image/jpeg');
// send the image to the browser
imagejpeg($image);
// destroy the image to free up the memory
imagedestroy($image);
?>
