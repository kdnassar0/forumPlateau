<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategorieManager;
    use Model\Managers\AuteurManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

    
        public function index(){}


      
    
   public function listCategories(){

    $categorieManager = new CategorieManager();

    return [
        "view" => VIEW_DIR."forum/listCategorie.php",
        "data" => [
            "categories" => $categorieManager->findAll(["nomCategorie", "DESC"])
        ]
    ];

}

  
public function listTopics(){


    $topicManager = new TopicManager();
    $id=(isset($_GET["id"])) ? $_GET["id"] : null;
    


    return [
        "view" => VIEW_DIR."forum/listTopics.php",
        "data" => [
            "topics" => $topicManager->listTopicParCategorie($id)
        ]
    ];


}
public function listPosts(){ 


    $postManager = new PostManager();
    $id=(isset($_GET["id"])) ? $_GET["id"] : null;
    


    return [
        "view" => VIEW_DIR."forum/listPosts.php",
        "data" => [
            "post" => $postManager->listPostParTopics($id)
        ]
        
    ];



}




   }



//  ici on se trouve des functions qui faitent le lien entre les raquetes qui on a fait dans la model/managers 

// on fait return dans le view/forum/nom du fichier et on prepare un tableau qui on vq la traiter dans cheque list 

//faudra aussi comprendre que la méthode "findAll" est une méthode générique qui provient de l'AbstractController (dont hérite chaque controller de l'application)



     

   
