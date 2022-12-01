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


    }


    ?>