<?php

namespace App\Controller;

use App\Framework\FlashBag;
use App\Framework\AbstractController;
use App\Model\SubscribersModel;

class SubscribersController extends AbstractController
{

    
    public function index()
    {

        $Subscribers = new SubscribersModel ();
        $mails = $Subscribers->getAllMailUser();

        return $this->render('subscribers', [
            'emails' => ($mails)?$mails:array()
        ]);
    }
    }










