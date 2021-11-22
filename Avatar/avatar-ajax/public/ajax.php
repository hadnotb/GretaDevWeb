<?php
require '../vendor/autoload.php';
require '../functions.php';
use App\Avatar\Avatar;
use App\Avatar\AvatarSvgFactory;




$symetry = $_POST['symetrie']??Avatar::DEFAULT_SYMETRY;
$size  =$_POST['size']??AvatarSvgFactory::DEFAULT_SIZE;
$nbColor  =$_POST['color']??AvatarSvgFactory::DEFAULT_NB_COLORS;





$action = $_POST['action']??'generate';

switch($action){

    case 'generate':

        $svg = (new AvatarSvgFactory)->createRandomAvatar($size,$nbColor,$symetry);
        echo $svg;
        exit;

    case 'save':
        $svg = $_POST['svg'];
        saveSvg($svg);
        break;

    case 'download':
        $svg = $_POST['svg'];
        dump($svg);
        downloadSvg();
        echo $svg;
        
        exit;

}


