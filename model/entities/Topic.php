<?php

namespace Model\Entities;

use App\Entity;

final class Topic extends Entity{

        private $id ; 
        private $titre ; 
        private $dateCreation ; 
        private $verroier ; 
        private $categorie ;
        private $auteur ; 

 public function __construct($data){         
                $this->hydrate($data);        
            }

public function getId(){
        return $this->id ;
}
public function setId($id){
         $this->id=$id ;
         return $this ;
}

public function getTitre(){
        return $this->titre ;
}
public function setTitre($titre){
        $this->titre = $titre ;
        return $this ;
}

public function getDateCreation(){
       return $this->dateCreation ;
}
public function setDateCreation($dateCreation){
        $this->dateCreation=$dateCreation ;
        return $this ;
}

public function getVerroier(){
        return $this->verroier ; 
}
public function setVerroier($verroier){
         $this->verroier=$verroier ; 
         return $this ;
}
public function getCategorie(){
        return $this->categorie ; 
}
public function setCategorie($categorie){
         $this->categorie=$categorie; 
         return $this ;
}
public function getAuteur(){
        return $this->auteur ; 
}
public function setAuteur($auteur){
         $this->auteur=$auteur; 
         return $this ;
}

public function __toString()
{
      return  $this->titre ;
}





}


?>