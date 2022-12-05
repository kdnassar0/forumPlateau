<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\AuteurManager;

class SecurityController extends AbstractController implements ControllerInterface{


    public function index(){}


   

public function afficherRegister(){
    //function pour afficher la fourmulaire de l'inscription 

    return [
        "view" => VIEW_DIR."security/register.php",
       
    ];


}    

public function ajouterRegister(){
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

if(isset($_POST['submit'])){
        $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS) ;
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS) ; 
        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS) ;
        $password2 = filter_input(INPUT_POST,'password2',FILTER_SANITIZE_SPECIAL_CHARS) ;
       


if($username && $email && $password && $password2){
    
    
    if(!$auteurManager->findOneByEmail($email)){

        if(!$auteurManager->findOneByUser($username)){
           
       
          if(($password==$password2) && strlen($password) >= 8){

            $password_hash = password_hash($password,PASSWORD_DEFAULT) ;
          

            $inserer = [ "pseudonyme"=>$username ,
                         "motDePasse"=>$password_hash , 
                         "email" =>$email 

          ];
          
        
       
          $auteurManager -> add($inserer);
        
          }
        }
       }
     
    
   }
   
   header("Location:index.php?action=");
 }
}

}




?>