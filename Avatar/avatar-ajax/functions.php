<?php
    
    function genHexaColor(){
        return '#' . str_pad(dechex(mt_Rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT); 
    }
    function genRgbColor(){
        $red = mt_rand(0.235);
        $green = mt_rand(0.235);
        $blue = mt_rand(0.235);
        return "rgb($red,$green,$blue)";
    }

    $couleur = genHexaColor();
    
    
    function genRandomColors(int $int){
        $tableauCouleur = [];
        
        for($i =0; $i<$int; $i++){
            
            $tableauCouleur[] = genHexaColor();
            // $tableauCouleur[] = genRgbColor();

        }
        return $tableauCouleur;
    }

    function saveSvg($svg){
        $dir = 'avatar';
        if(!file_exists($dir) && !is_dir($dir)){
           mkdir($dir); 
        }
        
       
        $uniqID = sha1(uniqid(mt_rand(),true));

        $fp = fopen('avatar/'.$uniqID.'.svg','w');
        fwrite($fp,$svg);
    }


    function downloadSvg(){

        header('Content-Type: image/svg+xml');
        header('Content-Disposition: attachment; filename=Avatar.svg');

    }