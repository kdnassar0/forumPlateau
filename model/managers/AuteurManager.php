<?php
namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    


    class AuteurManager extends Manager{

        protected $className = "Model\Entities\Auteur"; //le nom de classe dans model/entities
        protected $tableName = "auteur"; //le nom de la table dans la base de donnees


        public function __construct(){
            parent::connect();
        }


    }


    ?>