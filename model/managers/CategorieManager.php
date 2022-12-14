<?php
namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\CategoriManager;

    class CategorieManager extends Manager{

        protected $className = "Model\Entities\Categorie";
        protected $tableName = "Categorie";


        public function __construct(){
            parent::connect();
        }


    public function nomCategorie($id){
        $sql = "
        SELECT * FROM ".$this->tableName." 
        WHERE id_categorie = :id ";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
             $this->className );
         
    }


    }


    ?>