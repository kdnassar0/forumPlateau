<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Entities\Categorie;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategorieManager;
    use Model\Managers\AuteurManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

    
        public function index(){}


    //note : le nom de notre function ici c'est le lien qui on dois utiliser  
    
   public function listCategories(){

    $categorieManager = new CategorieManager();

    return [
        "view" => VIEW_DIR."forum/listCategorie.php",
        "data" => [
            "categories" => $categorieManager->findAll(["nomCategorie", "DESC"])
        ]
    ];

}

public function afficherTopics(){
    $afficherTopics = new TopicManager(); 
 

    return [
        "view" => VIEW_DIR."forum/topics.php",
        "data" =>[
            "topics" => $afficherTopics->afficherLesTopics()
           

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

public function afficherLesPost(){
    $afficherPost = new PostManager();

    return [
        "view"=>VIEW_DIR."forum/posts.php",
        "data"=>[
            "post"=>$afficherPost->afficherLesPost()
        ]
        ];
     

}

public function ajouterTopic(){

    $id =(isset($_GET['id']))? $_GET['id'] : null ;

    $ajouterTopic = new TopicManager();
    $priemiereMessage = new PostManager() ;


    
   


    if(isset($_POST['submit'])){

        $titre =filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS) ;
        $message=filter_input(INPUT_POST,"message",FILTER_SANITIZE_SPECIAL_CHARS) ;
       
      
      

        if($titre && $message){

         $ajouter=["titre"=>$titre,
         "categorie_id"=>$id,
         'auteur_id'=>$id];
       
         $ajouterMessage=$ajouterTopic->add($ajouter);
        

         $ajouter =["texte"=>$message,"topic_id"=>$ajouterMessage,
         'auteur_id'=>$id];


         $priemiereMessage->add($ajouter);
         

        }
   


    }    
    
    }



    public function ajouterPost(){
        $id =(isset($_GET['id']))? $_GET['id'] : null ;

        $ajouterPost = new PostManager() ; 

        if(isset($_POST['submit'])){
            $texte =filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS) ;
            if($texte){
                $ajouter=["texte"=>$texte ,"topic_id"=>$id,"auteur_id"=>3];
                $ajouterPost->add($ajouter);
            }
        }

        header("Location:index.php?action=");





    }

   
    }




//  ici on se trouve des functions qui faitent le lien entre les raquetes qui on a fait dans la model/managers 

// on fait return dans le view/forum/nom du fichier et on prepare un tableau qui on vq la traiter dans cheque list 

//faudra aussi comprendre que la méthode "findAll" est une méthode générique qui provient de l'AbstractController (dont hérite chaque controller de l'application)

   
?>




     

   
