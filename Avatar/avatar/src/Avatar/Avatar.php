<?php
namespace App\Avatar;

class Avatar{

    private $size;
    private $colors;
    private $grid;
    const DEFAULT_SYMETRY = 'horizontal';
    public function __construct(int $size, array $colors, $symetry){
        $this->size = $size;
        $this->colors = $colors;
        
        $symetry == 'horizontal'? $this->createRandomGridHorizontal() : $this->createRandomGridVertical();
        
    }
    

    public function createRandomGridHorizontal(){
        
        
        $colors = $this->colors;
        $size = $this->size;
        // J'initialise un tableau vide 
        $grid = [];
        
        // Je créer une boucle afin d'y introduire les ligne au nombre de $size
        for ($rowIndex = 0; $rowIndex < $size ; $rowIndex++){
                // array_push($grid,[]); ou Alors
                $grid[$rowIndex]=[];
            // Je créer une boucle afin d'y introduire les collones au nombre de $size
            for ($colIndex = 0; $colIndex < $size; $colIndex++){

                // j'introduit dans la variable $a une clefs au hasard dans le tableau $colors
                $a = array_rand($colors,1);
                // J'introduit dans $RandomColorChoosed la valeur situé a l'indice $a du tableau $color appelé;
                $RandomColorChoosed = $this->colors[$a];
                
                // Je pousse dans mon tableau $grid la valeur corespondante a la clefs tiré au hasarad 
                $grid[$rowIndex][$colIndex] = $RandomColorChoosed;
                // J'introduit l'indice correspondant a la cellule opposé dans $mirroredCellIndex
                $mirroredCellIndexHorizontal = ($size-($colIndex+1));
                $mirroredCellIndexVertical =($size -($rowIndex+1));
                
                
                // j'introduit dans la cellule opposé la valeur de la case initiale
                $grid[$rowIndex][$mirroredCellIndexHorizontal] = $grid[$rowIndex][$colIndex];
                // $grid[$mirroredCellIndexVertical][$colIndex] = $grid[$rowIndex][$colIndex];
            }
        }
        // j'introduit dans l'objet appelant le tableau $grid
        $this->grid = $grid;
    }
    public function createRandomGridVertical(){
        
        
        $colors = $this->colors;
        $size = $this->size;
        // J'initialise un tableau vide 
        $grid = [];
        
        // Je créer une boucle afin d'y introduire les ligne au nombre de $size
        for ($rowIndex = 0; $rowIndex < $size ; $rowIndex++){
                // array_push($grid,[]); ou Alors
                $grid[$rowIndex]=[];
            // Je créer une boucle afin d'y introduire les collones au nombre de $size
            for ($colIndex = 0; $colIndex < $size; $colIndex++){

                // j'introduit dans la variable $a une clefs au hasard dans le tableau $colors
                $a = array_rand($colors,1);
                // J'introduit dans $RandomColorChoosed la valeur situé a l'indice $a du tableau $color appelé;
                $RandomColorChoosed = $this->colors[$a];
                
                // Je pousse dans mon tableau $grid la valeur corespondante a la clefs tiré au hasarad 
                $grid[$rowIndex][$colIndex] = $RandomColorChoosed;
                // J'introduit l'indice correspondant a la cellule opposé dans $mirroredCellIndex
                $mirroredCellIndexHorizontal = ($size-($colIndex+1));
                $mirroredCellIndexVertical =($size -($rowIndex+1));
                
                
                // j'introduit dans la cellule opposé la valeur de la case initiale
                // $grid[$rowIndex][$mirroredCellIndexHorizontal] = $grid[$rowIndex][$colIndex];
                $grid[$mirroredCellIndexVertical][$colIndex] = $grid[$rowIndex][$colIndex];
            }
        }
        // j'introduit dans l'objet appelant le tableau $grid
        $this->grid = $grid;
    }
    public function getSize(){
        return $this->size;
    }
    public function getColors(){
        return $this->colors;
    }
    public function getGrid(){
        return $this->grid;
    }
}
