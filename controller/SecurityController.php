<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\AuteurManager;
use Model\Managers\TopicManager;

class SecurityController extends AbstractController implements ControllerInterface
{


    public function index()
    {
    }




 


    public function ajouterRegister()
    {
        $auteurManager = new AuteurManager();

        // Cette partie là est bien dans le Controller (idéalement dans SecurityController)

        // Les méthodes findOneByEmail et findOneByUser sont des méthodes de UserManager (notez bien le " ! " avant les méthodes qui vérifient donc que l'utilisateur n'existe PAS en base de données selon son mail ou selon son pseudo)


        // REGISTER

        // -on filtre les champs de saisie

        // -on vérifie que l'utilisateur n'existe pas (mail)

        // -on vérifie que le pseudo n'existe pas

        // -on vérifie que les 2 passwords correspondent

        // -on hash le password (password_hash)

        // -on ajoute l'user en bdd

        // -on peut imaginer une redirection vers le formulaire de login dans la foulée

        if (isset($_POST['submit'])) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);



            if ($username && $email && $password && $password2) {


                if (!$auteurManager->findOneByEmail($email)) {

                    if (!$auteurManager->findOneByUser($username)) {


                        if (($password == $password2) && strlen($password) >= 8) {

                            $password_hash = password_hash($password, PASSWORD_DEFAULT);


                            $inserer = [
                                "pseudonyme" => $username,
                                "motDePasse" => $password_hash,
                                "email" => $email

                            ];



                            $auteurManager->add($inserer);
                            Session :: addFlash('success','Inscrption reussi');
                        
                        }
                    }
                }
            }else{
            Session :: addFlash('error','Il faut remplir touts les champs');}
        }
        return [
            "view" => VIEW_DIR . "security/register.php",

        ];
    }


    public function login()
    {
        $auteurManager = new AuteurManager();



        if (isset($_POST['submit'])) {

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);


            //si les filters passent
            if ($email && $password) {

                //retrouver le mot de passe de l'utilisateur correspondant au mail 

                $mot = $auteurManager->checkMotDePasse($email);

                //si le mot de passe est retrouvé

                if ($mot) {
                    $hash  = $mot->getMotDePasse();

                    // var_dump('test'); die ;
                    //retrouve l'utilisateur par son mail  
                    $user = $auteurManager->findOneByEmail($email);

                    //copmparison du hash d ela base de donnees et le mot de passe renseigné
                    if (password_verify($password, $hash)) {

                        //placer l'utilisateur en session 
                        Session::setUser($user);
                    }
                }   
            } else{
                Session :: addFlash('error','Il faut remplir touts les champs');}
        }

        return [
            "view" => VIEW_DIR."security/login.php",
           
        ];
    
    }

    public function logout(){
        unset($_SESSION["user"]) ;
        
        return [
            "view" => VIEW_DIR."security/login.php",
           
        ];
    
    }

   




// --on soumet le formulaire
// --on vérifie que les filtres du formulaires sont valides
// --on stocke dans une variable le fait qu'on retrouve le mot de passe de la personne dont l'email est passé en paramètre (retrievePassword)
// --si on retrouve, on récupère le mot de passe haché
// --on retrouve l'utilisateur dont l'email est passé en paramètre
// --on vérifie si le hash récupéré en BDD correspond au hash du mot de passe du formulaire (password_verify)
// --si ça matche --> on stocke le user en session

// [Hier 14:39] Mickael MURMANN - Elan Formation
// J'ai géré le côté "utilisateur banni ou pas" dans ma vérification, vous pouvez évidemment passer cette étape pour le moment 


public function closeTopic(){
    $id=(isset($_GET['id'])) ? $_GET['id'] : null ; 

    $topicManager  = new TopicManager(); 
    

    //on fais passer l'id du topic concerne
    $topicManager->closeTopic($id); 

    $this->redirectTo('forum','listPosts',$id) ;

}

}
