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

class ForumController extends AbstractController implements ControllerInterface
{


    public function index()
    {
    }


    //note : le nom de notre function ici c'est le lien qui on dois utiliser  

    public function listCategories()
    {

        $categorieManager = new CategorieManager();

        return [
            "view" => VIEW_DIR . "forum/listCategorie.php",
            "data" => [
                "categories" => $categorieManager->findAll(["nomCategorie", "DESC"])
            ]
        ];
    }

    public function afficherTopics()
    {
        $afficherTopics = new TopicManager();


        return [
            "view" => VIEW_DIR . "forum/topics.php",
            "data" => [
                "topics" => $afficherTopics->afficherLesTopics()


            ]

        ];
    }


    public function listTopics()
    {


        $topicManager = new TopicManager();
        $categorieManager=new CategorieManager();
        $id = (isset($_GET["id"])) ? $_GET["id"] : null;



        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->listTopicParCategorie($id),"categorie"=>$categorieManager->nomCategorie($id)
            ]

        ];
    }
    public function listPosts()
    {

        $topicManager = new TopicManager();
        $postManager = new PostManager();
        $id = (isset($_GET["id"])) ? $_GET["id"] : null;

        // var_dump($topicManager->topicParId($id)) ;die;

        return [
            "view" => VIEW_DIR . "forum/listPosts.php",
            "data" => [
                "post" => $postManager->listPostParTopics($id), "topics" => $topicManager->topicParId($id)
            ]

        ];
    }

    public function ajouterCategorie()
    {


        $ajouterCategorie = new CategorieManager;

        if (isset($_POST['submit'])) {

            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
            if ($name) {
                $ajouter = [
                    'nomCategorie' => $name

                ];
                $ajouterCategorie->add($ajouter);
                
              
            }
        }
        $this->redirectTo('forum', 'listCategories');
       
    }


    public function afficherLesPost()
    {
        $afficherPost = new PostManager();

        return [
            "view" => VIEW_DIR . "forum/posts.php",
            "data" => [
                "post" => $afficherPost->afficherLesPost()
            ]
        ];
    }

    public function ajouterTopic($id)
    {

        $id = (isset($_GET['id'])) ? $_GET['id'] : null;

        $user = \App\Session::getUser()->getId();

        $ajouterTopic = new TopicManager();
        $priemiereMessage = new PostManager();

        if (isset($_POST['submit'])) {

            $titre = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
            $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);

            if ($titre && $message) {

                $ajouter = [
                    "titre" => $titre,
                    "categorie_id" => $id,
                    'auteur_id' => $user
                ];

                $ajouterMessage = $ajouterTopic->add($ajouter);


                $ajouter = [
                    "texte" => $message, "topic_id" => $ajouterMessage,
                    'auteur_id' => $user
                ];


                $priemiereMessage->add($ajouter);

                $this->redirectTo('forum', 'listTopics', $id);
            }
        }
    }



    public function ajouterPost($id)
    {


        $id = (isset($_GET['id'])) ? $_GET['id'] : null;
        $user = $_SESSION['user']->getId();
        $ajouterPost = new PostManager();

        if (isset($_POST['submit'])) {
            $texte = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            if ($texte) {
                $ajouter = ["texte" => $texte, "topic_id" => $id, "auteur_id" => $user];
                $ajouterPost->add($ajouter);
            }
        }

        $this->redirectTo('forum', 'listPosts', $id);
    }
}




//  ici on se trouve des functions qui faitent le lien entre les raquetes qui on a fait dans la model/managers 

// on fait return dans le view/forum/nom du fichier et on prepare un tableau qui on vq la traiter dans cheque list 

//faudra aussi comprendre que la m??thode "findAll" est une m??thode g??n??rique qui provient de l'AbstractController (dont h??rite chaque controller de l'application)
