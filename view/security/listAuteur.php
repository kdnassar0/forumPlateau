

<?php

$auteurs = $result ['data']['auteur'] ; 


foreach($auteurs as $auteur){
   echo $auteur->getPseudonyme() . "<br>";
}










?>