<?php
    namespace Model\Entities;

    use App\Entity;
    use App\Session ;


    final class Auteur extends Entity {

        private $id ; 
        private $pseudonyme ; 
        private $motDePasse ; 
        private $email ; 
        private $dateInscription ; 
        private $role ; 



        public function __construct($data){         
            $this->hydrate($data);       
        }


        public function getDateInscription(){
           return $this->dateInscription;
        }
        public function setDateInscription($dateInscription){
            $this-> dateInscription = $dateInscription ;
            return $this ;
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
        public function getRole(){
            return $this->role ; 
        }
        public function setRole($role){
          $this ->role=$role ;
          return $this ;
        }

        public function hasRole($role){
            if(Session :: getUser()->getRole()==$role){
                return true ;
            }


        }


        public function __toString()
        {
            return $this->pseudonyme;
            return $this->id;
        }



    }
















    ?>