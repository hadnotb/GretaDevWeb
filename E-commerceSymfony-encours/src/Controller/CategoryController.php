<?php
namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController{

    /**
    * @Route("/category/{slug}", name="category_show")
    */
    public function show(string $slug, Category $category){
        
        
        $productbyCat = $category -> getProducts(); 
        


        return $this -> render('category.html.twig',[
            'productByCat' => $productbyCat
        ]);
    }


}