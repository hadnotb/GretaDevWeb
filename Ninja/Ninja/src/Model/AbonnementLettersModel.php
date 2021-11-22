<?php 

namespace App\Model;

use App\Framework\AbstractModel;

class AbonnementLettersModel extends AbstractModel {

    function insert($email,$origin){
        $sql = "INSERT INTO suscriber(createdAt,email,origin_id)
        VALUES (NOW(),?,? )";
        $this->database->executeQuery($sql,[$email,$origin]);
    }

    function getmailUser($mail){
        $sql = "SELECT * 
        from suscriber where email = ?";
        return $this->database->getOneResult($sql,[$mail]);
    }
}

