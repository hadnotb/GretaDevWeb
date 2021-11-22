<?php 

namespace App\Model;

use App\Framework\AbstractModel;

class CategoryModel extends AbstractModel {

    function getCategories(){

        $sql = 'call sp_ReadCategory()';
        $categories = $this ->database ->getAllResults($sql);
      
        return $categories;

    }
    function getBrands(){
        $sql ='call Sp_readBrand()';

        $brands = $this -> database -> getAllResults($sql);
        return $brands;
    }
    function getSizes(){
        $sql ='call Sp_readSize()';

        $sizes = $this -> database -> getAllResults($sql);
        return $sizes;
    }
    function getColors(){
        $sql ='call Sp_readColor()';

        $colors = $this -> database -> getAllResults($sql);
        return $colors;
    }
    function getProductbyColor($id){
        $sql = 'call Sp_readArticlebyColor(:idCol)';
        $colorProducts = $this -> database -> getAllResults($sql,['idCol' =>$id]);
        return $colorProducts;
    
    }
    function getProductbyBrand($id){
        $sql = 'call Sp_readArticlebyBrand(:idBrd)';
        $brandProducts = $this -> database -> getAllResults($sql,['idBrd' =>$id]);
        return $brandProducts;
    
    }

    function getProductbySize($id){
        $sql = 'call Sp_readArticlebySize(:idSze)';
        $sizeProducts = $this -> database -> getAllResults($sql,['idSze' =>$id]);
        return $sizeProducts;
    }
    function getProductbyCat($id){
        $sql = 'call Sp_readArticlebyCat(:idCat)';
        $catProducts = $this -> database -> getAllResults($sql,['idCat' =>$id]);
        return $catProducts;
    }
   function getArticlebySearch($toSearch){
        $sql ='call Sp_brandArtCatsearch(:toSearch)';

        $results = $this -> database -> getAllResults($sql,['toSearch' => $toSearch]);
        return $results;


   }
}