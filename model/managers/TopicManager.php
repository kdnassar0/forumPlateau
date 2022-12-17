<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;


class TopicManager extends Manager
{

    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";


    public function __construct()
    {
        parent::connect();
    }

    public function listTopicParCategorie($id)
    {
       
        $sql = "
            SELECT *
            FROM ".$this->tableName."
            WHERE categorie_id = :id
            ";

            return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }


    public function afficherLesTopics(){

        $sql = "
        SELECT * FROM ".$this->tableName."
        ";
     
        return $this->getMultipleResults(
            DAO::select($sql),
             $this->className);

    }  


    public function closeTopic($id){
        $sql  = "UPDATE ".$this->tableName."
        set verroier = 1
        WHERE id_topic = :id
        " ;
      
        return $this->getSingleScalarResult(
            DAO::select($sql,['id'=>$id]),
            $this->className
        );

    }
    public function openTopic($id){
        $sql  = "UPDATE ".$this->tableName."
        set verroier = 0
        WHERE id_topic = :id
        " ;
      
        return $this->getSingleScalarResult(
            DAO::select($sql,['id'=>$id]),
            $this->className
        );

    }




    //function pour recuperer toute les elements dans le topic et on l'appele dans forum/controller/listPOST et aprés dans la listPosts 
    public function topicParId($id){
        $sql = "
        SELECT * FROM ".$this->tableName."
        
        WHERE id_topic = :id
    
        " ; 
        return $this->getSingleScalarResult(
            DAO::select($sql,['id' => $id]),
            $this->className
        );

    }

    public function findTopicsByUser($id)
    {
        $sql = "
        SELECT titre FROM ".$this->tableName."
        WHERE auteur_id = :id 

        Order by dateCreation DESC 
        limit 5
        " ;
        
        
        return $this->getMultipleResults(
            DAO::select($sql,['id'=>$id]),
            $this->className
        );
      
    }
    
    
   

    
    
   

 
} 
 
// Tous les Managers (dossier Model) hériteront de la classe Manager (dossier App) pour bénéficier des méthodes pré-établies : findAll, findOneById, ...


//className = nom de votre classe du dossier "entites" (ici chez moi Topic)

//tableName = nom de la table en base de données
