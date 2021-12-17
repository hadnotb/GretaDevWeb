<?php 

namespace App\Controller;

use App\Framework\AbstractController;

class HomeController extends AbstractController {

    public function index()
    {
        // Affichage : inclusion du template
        return $this->render('home', [
            'message' => 'ACCUEIL'
        ]);
    }
}
