<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
  


 class  PostManager extends Manager {
    //manager dans app (manager.php)

    protected $className = "Model\Entities\Post"; //nom da class entities (post.php)
    protected $tableName = "post"; //nom de table
    
    public function __construct(){
        parent::connect();

    }

        public function listPostParTopics($id){

            $sql = "
            SELECT *
            FROM $this->tableName
            WHERE topic_id = :id
            " ;
        
            
         
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                 $this->className );
              
                 
           

 }



 }


    ?>
