

<?php

$auteurs = $result ['data']['auteur'] ; 


foreach($auteurs as $auteur){
   echo "<p>".$auteur->getPseudonyme()."</p>" ;
   echo "<p>". $auteur->getDateInscription()."</p>" ; 
}










?>