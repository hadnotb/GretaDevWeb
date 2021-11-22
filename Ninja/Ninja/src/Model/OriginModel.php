<?php 

namespace App\Model;

use App\Framework\AbstractModel;

class OriginModel extends AbstractModel {

    function getOrigins(){
        $sql = "SELECT * 
        from origins";

        return $this->database->getAllResults($sql);
    }
}