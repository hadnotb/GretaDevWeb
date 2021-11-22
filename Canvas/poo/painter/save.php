<?php
require 'function.php';


$img = $_POST['canva'];


$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);




$fileName = SaveCanva($fileData);



echo $fileName;




