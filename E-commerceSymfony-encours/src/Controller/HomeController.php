<?php
namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController{

    /**
     * @Route("/", name="home_index")
     */
    public function index(ProductRepository $productRepository){

        $product = $productRepository-> findBy([],['createdAt'=>'DESC']);
        
        
        

        return $this -> render('base.html.twig',[
            'Home' => 'Sunday Morning Aix',
            'product' => $product
        ]);
    }
}