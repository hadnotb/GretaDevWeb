<?php
require '../vendor/autoload.php';
require '../functions.php';
use App\Avatar\Avatar;
use App\Avatar\AvatarSvgFactory;
use App\Avatar\AvatarSvgTransformer;


// $size =4;
// $nbColor=2;

// if(!empty($_POST)){
//     $size = (int)$_POST['size'];
//     $nbColor = (int)$_POST['color'];
// } 
// Syntaxe Alternative 
// if($_POST['symetrie'] == "horizontal"){
//     $this->createRandomGridHorizontal(); 
//  }
//  if($_POST['symetrie']=='vertical'){
//      $this->createRandomGridVertical();
//  }



$symetry = $_POST['symetrie']??Avatar::DEFAULT_SYMETRY;
$size  =$_POST['size']??AvatarSvgFactory::DEFAULT_SIZE;
$nbColor  =$_POST['color']??AvatarSvgFactory::DEFAULT_NB_COLORS;

// TODO : Faire en sorte que la symétrie reste sur celle qui étais 



$action = $_POST['action']??'generate';

switch($action){

    case 'generate':

        $svg = (new AvatarSvgFactory)->createRandomAvatar($size,$nbColor,$symetry);
        break;

    case 'save':
        $svg = $_POST['svg'];
        saveSvg($svg);
        break;

    case 'download':
        $svg = $_POST['download'];
        downloadSvg();
        echo $svg;
        
        exit;

}



include '../index.phtml';