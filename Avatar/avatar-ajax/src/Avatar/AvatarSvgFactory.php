<?php

namespace App\Avatar;

class AvatarSvgFactory{
    const DEFAULT_SIZE = 4;
    const DEFAULT_NB_COLORS = 2;
    public function createRandomAvatar(int $size, int $nbTabColors, $symetry){
        


        $tableauCouleur = genRandomColors($nbTabColors); 
        $avatar = new Avatar($size,$tableauCouleur,$symetry);
        $transformer = new AvatarSvgTransformer();
        $svg = $transformer ->getSvg($avatar);
        return $svg;
    }

}