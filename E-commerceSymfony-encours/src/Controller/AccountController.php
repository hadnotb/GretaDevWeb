<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use DateTimeImmutable;
use App\Avatar\AvatarSvgFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AccountController extends AbstractController{
    public const AVATAR_FOLDER = 'avatars';
    private $filesystem;

    public function __construct(UserPasswordHasherInterface $hash,EntityManagerInterface $manager,Filesystem $filesystem){

       $this -> filesystem = $filesystem;
        $this -> hash = $hash;
        $this -> manager = $manager;

    }

    public function saveSvg($svg){
        
        // $dir = 'avatar';
        // if(!file_exists($dir) && !is_dir($dir)){
        //    mkdir($dir); 
        // }
        
       
        // $uniqID = sha1(uniqid(mt_rand(),true));

        // $fp = fopen('avatar/'.$uniqID.'.svg','w');
        // fwrite($fp,$svg);
        $filename = sha1(uniqid(mt_rand(), true)) . '.svg';
        $filepath = self::AVATAR_FOLDER . '/' . $filename;

        $this->filesystem->mkdir(self::AVATAR_FOLDER);
        $this->filesystem->touch($filepath);
        $this->filesystem->appendToFile($filepath, $svg);

        return $filename;
    }



    /**
    * @Route("/signup", name="account_signup")
    */
    public function signUp(Request $request, UserPasswordHasherInterface $hash,EntityManagerInterface $manager,AvatarSvgFactory $avatarSvgFactory){

        
        $user = new User();
        $form = $this -> createForm(UserType::class,$user);
        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isValid()){
           

            $dateTime = new DateTimeImmutable();
            $password = $hash->hashPassword($user,$form->get('plainPassword')->getData());
        
            $user -> setPassword($password);
            $user -> setCreatedAt($dateTime);
            $user -> setEmail($form->get('email')->getData());

            $this->addFlash('Success','Votre Compte a bien été ajouté');
            $svgRecup = $request->request->get('svg');
            $filename = $this-> saveSvg($svgRecup);
            $user -> setSvg($filename);

            $manager ->persist($user);
            $manager->flush();


            return $this-> redirectToRoute('home_index');
        }

        
        $size = $request->request->get('size', AvatarSvgFactory::DEFAULT_SIZE);
        $nbColors = $request->request->get('nb-colors', AvatarSvgFactory::DEFAULT_NB_COLORS);
        $svg = $avatarSvgFactory->createRandomAvatar($size,$nbColors);
       

         

     
        return $this-> render('account/signup.html.twig',[
            'userForm'=> $form -> createView(),
            'svg' => $svg

        ]);

    }

}