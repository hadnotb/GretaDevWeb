<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\User;
use DateTimeImmutable;
use App\Entity\Product;
use App\Entity\Category;
use Bluemmb\Faker\PicsumPhotosProvider;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{   
    private $slugger;
    public function __construct(SluggerInterface $slugger, UserPasswordHasherInterface $hash){

        $this->slugger = $slugger;
        $this->hasher = $hash;
    }
    

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
      
     

        // ---------faker---------
        $faker = Factory::create('fr_FR');
        $faker->addProvider(new PicsumPhotosProvider($faker));
        $cat = ['Accessoire','Pull','Veste','Chaussure','T-shirt','Casquette','Pantalon'];
        // -----------------------
        $catStock = [];
        foreach($cat as $cats){
            $category = new Category();
            $category -> setName($cats);
            $category -> setCreatedAt(DateTimeImmutable::createFromMutable( $faker->dateTimeBetween('-3 years', 'now', 'Europe/Paris') ));
            $category -> setSlug($this->slugger->slug($category->getName()));
            $manager ->persist($category);
            array_push($catStock, $category);
        }

        for($i =0; $i<30; $i++){
            $product = new Product();
            $product -> setName($faker->word(3));
            $product -> setCategory($faker -> randomElement($catStock));
            $product -> setPrice($faker->numberBetween(10,250));
            $product -> setDescription($faker->text(2500));
            $product -> setThumbnail($faker->imageUrl(400,200,true));
            $product -> setCreatedAt(DateTimeImmutable::createFromMutable( $faker->dateTimeBetween('-3 years', 'now', 'Europe/Paris') ));
            $product -> setSlug($this->slugger->slug($product->getName()));
            $manager ->persist($product);

        }
       
        for($i =0; $i<30; $i++){
            $user = new User();
            $user -> setFirstname($faker->firstName());
            $user -> setLastname($faker ->lastName());
            $user -> setEmail('user'.$i.'@gmail.com');
            $user -> setPassword($this->hasher->hashPassword($user,'password'));
            $user -> setCreatedAt(DateTimeImmutable::createFromMutable( $faker->dateTimeBetween('-3 years', 'now', 'Europe/Paris') ));
            $manager ->persist($user);
        }
        
        

        $manager->flush();


        
    }
}
