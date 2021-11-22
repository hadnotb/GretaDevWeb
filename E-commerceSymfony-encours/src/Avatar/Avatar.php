<?php 

namespace App\Avatar;

class Avatar {

    // CONSTANTES

    // PROPRIETES
    private $size;
    private $colors;
    private $grid;
    
    // Constructeur
    public function __construct(int $size, array $colors)
    {
        // Initilisation des propriétés size et colors
        $this->size = $size;
        $this->colors = $colors;

        // Génération de la grille de l'avatar
        $this->createRandomGrid();
    }    

    // Autres méthodes

    /**
     * Génère la grille de l'avatar de manière aléatoire à partir de sa taille 
     * et du tableau de couleurs
     * 
     * Affecte le résultat à la propriété grid de l'objet courant
     */
    public function createRandomGrid()
    {
        // On crée le tableau qui contiendra la grille
        $grid = [];

        // On commence par créer des lignes... 
        for ($rowIndex = 0; $rowIndex < $this->size; $rowIndex++) {

            // ... avec dans chaque ligne un petit tableau ! 
            $grid[$rowIndex] = []; // ou array_push($grid, []);

            // Ensuite pour chaque colonne... 
            for ($colIndex = 0; $colIndex < $this->size / 2; $colIndex++) {

                // On tire une couleur aléatoire
                $randomIndexColor = mt_rand(0, count($this->colors) - 1);

                /**
                 * Ou bien : $randomIndexColor = array_rand($this->colors);
                 */

                $randomColor = $this->colors[$randomIndexColor];

                // On remplit la case courante (ligne $rowIndex, colonne $colIndex) avec cette couleur
                $grid[$rowIndex][$colIndex] = $randomColor; // ou array_push($grid[$rowIndex], $randomColor)

                // Case miroir pour la symétrie selon un axe vertical
                $grid[$rowIndex][$this->size - 1 - $colIndex] = $randomColor;
            }
        }

        // On stocke notre grille dans la propriété grid 
        $this->grid = $grid;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getColors()
    {
        return $this->colors;
    }

    public function getGrid()
    {
        return $this->grid;
    }

}