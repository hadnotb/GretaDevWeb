<?php
namespace App\Controller;

use App\Framework\FlashBag;
use App\Framework\AbstractController;
use App\Model\AbonnementLettersModel;
use App\Model\OriginModel;
class AbonnementLettersController extends AbstractController
{
    public function index()
    {
        $AbonnementLetters = new AbonnementLettersModel();
        $originModel = new OriginModel();
        $origins = $originModel->getOrigins();

        
        if(!empty($_POST)){
            
            
            $mail = trim($_POST['email']);
            $origin = $_POST['origins'];
            
            $isSetmail = $AbonnementLetters->getmailUser($mail);


            if(isset($_POST["mail"])){

                FlashBag::addFlash("Votre mail n est pas renseigner",'error');
                
            } else if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){

                FlashBag::addFlash("Entrez une adresse mail valide",'error');
            }


            if(!isset($_POST["origins"]) || empty($_POST["origins"])){

                FlashBag::addFlash("veuillez entre votre provenance !",'error');

            } else if($isSetmail){

                FlashBag::addFlash("email est deja existant",'error');
            }


            if(FlashBag::hasMessages("error") == 0){

                $AbonnementLetters->insert($mail,$origin);
                FlashBag::addFlash("Vous etes bien abonné à la AbonnementLetters ",'success');
                
                // header('Location: ' . buildUrl('accueil'));
            }

        }

        return $this->render('abonnement', [
            'email' => isset($mail)?$mail:'',
            'origins' => $origins??''

        ]);
    }
} 