<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;



class AuteurManager extends Manager
{

    protected $className = "Model\Entities\Auteur"; //le nom de classe dans model/entities
    protected $tableName = "auteur"; //le nom de la table dans la base de donnees


    public function __construct()
    {
        parent::connect();
    }

    public function findOneByEmail($email)
    {
        //function pour voir si l'email ne existe pas dans la base de donnees 

        $sql  = "SELECT * FROM $this->tableName
            WHERE email = :email ";



        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );
    }


    public function findOneByUser($username)
    {

        //function pour voir si le pseudo ne existe pas dans la base de donnees 

        $sql  = " SELECT pseudonyme FROM $this->tableName
            WHERE pseudonyme = :pseudonyme ";


        return $this->getOneOrNullResult(
            DAO::select($sql, ['pseudonyme' => $username], false),
            $this->className
        );
    }

    public function profileUtilisateur($id){
        $sql =" SELECT * FROM $this->tableName
        WHERE id_auteur=:id
        " ;
     
         return $this->getOneOrNullResult(
            DAO::select($sql, ['id'=>$id], false),
            $this->className
        );
       

    }


    public function checkMotDePasse($email)
    {

        $sql  = "SELECT * FROM $this->tableName
              WHERE email = :email";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
            
        );
    }

    
    
}

    


// Vérifier qu'un utilisateur existe en BDD selon son email



// Dans UserManager

// --On stocke la requête dans une variable $sql

// --On passe par la méthode "getOneOrNullResult" qui nous renvoie soit un objet User (ce qui voudrait dire que l'utilisateur a été retrouvé en BDD) soit "NULL" (ce qui veut dire qu'il n'a pas été trouvé)

// --dans la méthode "select" de la classe DAO, on fait bien passer un tableau associatif nous permettant d'exécuter la requête dans les bonnes conditions et de ne pas s'exposer à la faille de l'injection SQL
