<?php



namespace Model\Entities;

use App\Entity;


final class Post extends Entity {

    private $id ; 
    private $texte ; 
    private $dateCreation ;
    private $topic ; 
    private $auteur ; 


    public function __construct($data){         
        $this->hydrate($data);        
    }


    public function getId(){
        return $this->id ;
    }
    public function setId($id){
        $this->id=$id;
        return $this ;
    }
    public function getTexte(){
        return $this->texte ;
    }
    public function setTexte($texte){
        $this->texte=$texte;
        return $this ;
    }
    public function getDateCreation(){
        return $this->dateCreation ;
    }
    public function setDateCreation($dateCreation){
        $this->dateCreation=$dateCreation;
        return $this ;
    }
    public function getTopic(){
        return $this->topic ;
    }
    public function setTopic($topic){
        $this->topic=$topic;
        return $this ;
    }
    public function getauteur(){
        return $this->auteur ;
    }
    public function setAuteur($auteur){
        $this->auteur=$auteur;
        return $this ;
    }









}





?>