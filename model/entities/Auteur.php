<?php
    namespace Model\Entities;

    use App\Entity;


    final class Auteur extends Entity {

        private $id ; 
        private $pseudonyme ; 
        private $motDePasse ; 
        private $email ; 

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
        public function getPseudonyme(){
           return $this->pseudonyme ; 
        }
        public function setPseudonyme($pseudonyme){
            $this->pseudonyme=$pseudonyme ; 
            return $this ;
        }
        public function getMotDePasse(){
           return $this->motDePasse ; 
        }
        public function setMotDePasse($motDePasse){
            $this->motDePasse=$motDePasse ; 
            return $this ;
        }

        public function getEmail(){
            return $this -> email ; 
            
        }
        public function setEmail($email){
            $this -> email =$email ; 
            return $this  ;

        }





    }
















    ?>