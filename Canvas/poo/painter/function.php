<?php



function saveCanva($canva){
    $dir = 'canvas';
    if(!file_exists($dir) && !is_dir($dir)){
       mkdir($dir); 
    }
    
    $uniqID = sha1(uniqid(mt_rand(),true)).'.png';

    $fp = fopen('canvas/'.$uniqID,'w');
    fwrite($fp,$canva);
    return $uniqID;
    
}