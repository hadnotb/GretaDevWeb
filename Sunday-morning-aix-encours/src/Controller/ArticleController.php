<?php

namespace App\Controller;

use App\Model\ArticleModel;

use App\Framework\AbstractController;

class ArticleController extends AbstractController
{

    public function index()
    {


        
        // Si il existe une clef idArticle dans l'url
        if(!isset($_GET["idArticle"])) {
            return;
        }
        // Creatiion d'un objet ArticleModel
        $articleModel = new ArticleModel();
        // Recuperation d'un Article avec l'id de l'url
        
        $article = $articleModel->getOneArticleInfo($_GET["idArticle"]);
       
        
        // On ranges les valeurs des clefs image et couleur dans une variable 
        $images = $article['imgLst'];
        $couleur = $article['listcoul'];
        $taille = $article['artail'];
        // On l'explode pour créer un tableau avec chacune des valeurs
        $couleurArray = explode(';',$couleur);
        $imageArray =explode(';', $images);
        $tailleArray =explode(';', $taille);


        
        
         
        
        return $this->render('article',[

            'article' => $article,
            'images' => $imageArray,
            'couleur' => $couleurArray,
            'taille' => $tailleArray
         ]);

    }
    

}