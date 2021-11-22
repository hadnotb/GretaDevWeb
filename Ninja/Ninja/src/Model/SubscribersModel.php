<?php



namespace App\Model;

use App\Framework\AbstractModel;

class SubscribersModel extends AbstractModel {

    function getAllMailUser(){
        $sql = "SELECT * 
        from suscriber";
        return $mails = $this->database->getAllResults($sql,[]);
    }
}