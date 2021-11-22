<?php
namespace App\Avatar;
class AvatarSvgTransformer{

    
    public function getSvg(Avatar $avatar)
    {
        $size = $avatar->getSize();
        $grid = $avatar ->getGrid();
        
        
        ob_start();
         include __DIR__."/../../avatar.svg.php";
        return ob_get_clean(); 
        
        

    }

}