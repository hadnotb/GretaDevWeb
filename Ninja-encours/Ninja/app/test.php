<?php

 class test {

     private $ville;
     private $nom;

     /**
      * @return mixed
      */
     public function getVille()
     {
         return $this->ville;
     }

     /**
      * @param mixed $ville
      */
     public function setVille($ville)
     {
         $this->ville = $ville;
     }

     /**
      * @return mixed
      */
     public function getNom2()
     {
         return $this->nom;
     }

     /**
      * @param mixed $nom
      */
     public function setNom($nom)
     {
         $this->nom = $nom;
     }

     /**
      * @return mixed
      */
     public function getAdresse()
     {
         return $this->adresse;
     }

     /**
      * @param mixed $adresse
      */
     public function setAdresse($adresse)
     {
         $this->adresse = $adresse;
     }

     private $prenom;
     private $adresse;

 }