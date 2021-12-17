<?php
namespace App\Controller;

use App\Entity\User;
use App\Entity\Review;
use DateTimeImmutable;
use App\Entity\Product;
use App\Form\ReviewType;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\ReviewRepository;
use App\Repository\ProductRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

class ProductController extends AbstractController{


    /**
    * @Route("/product/{slug}", name="product_show")
    */
    public function show(string $slug, ProductRepository $productRepository, Request $request, EntityManagerInterface $manager, ReviewRepository $reviewRepository){

        $product = $productRepository-> findOneBy(['slug'=> $slug]);
        $review = new Review();
        $us = $this-> getUser(); 

        if($us){
            $review -> setNickname($us->getFullname());
        }
        
        $form = $this ->createForm(ReviewType::class,$review);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid()){
            
            
            $dateTime = new DateTimeImmutable();
            $review -> setProduct($product);
            $review -> setCreatedAt($dateTime);
            $review -> setUser($us);
            $manager ->persist($review);
            $manager->flush();
            //Flash
            $this->addFlash('Success','Votre avis..');
            //Redicrection
            return $this -> redirectToRoute('product_show',['slug'=>$product->getSlug()]);
            
        }

        
        $rev = $reviewRepository -> findBy(array('product' => $product));

        return $this-> render('article.html.twig',['product' => $product,
                                                    'form' => $form->createView(),
                                                    'rev' => $rev
                                                ]);

    }

}