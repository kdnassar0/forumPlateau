

<?php

$auteurs = $result ['data']['auteur'] ; 


if(App\Session::isAdmin()){
foreach($auteurs as $auteur){
   echo "<p>".$auteur->getPseudonyme()."</p>" ;
   echo "<p>". $auteur->getDateInscription()."</p>" ;
}



}
?>