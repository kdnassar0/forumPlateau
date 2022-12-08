<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;


class TopicManager extends Manager
{

    protected $className = "Model\Entities\Topic";
    protected $tableName = "topics";


    public function __construct()
    {
        parent::connect();
    }

    public function listTopicParCategorie($id)
    {
       
        $sql = "
            SELECT titre,id_topic
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
        SELECT titre FROM ".$this->tableName."
        ";
     
        return $this->getMultipleResults(
            DAO::select($sql),
             $this->className);

    }  

   

 
} 


   
// Tous les Managers (dossier Model) hériteront de la classe Manager (dossier App) pour bénéficier des méthodes pré-établies : findAll, findOneById, ...


//className = nom de votre classe du dossier "entites" (ici chez moi Topic)

//tableName = nom de la table en base de données
