

<?php

$auteurs = $result ['data']['auteur'] ; 
?>

<p class="titre">profiles</p>
<div class="profile">
<?php
if(App\Session::isAdmin()){
foreach($auteurs as $auteur){?>
 
 <div class="listAuteur">
  
   <?php
   echo "<p>".$auteur->getPseudonyme()."</p>" ;
   echo "<p>". $auteur->getDateInscription()."</p>" ;
   ?></div>
   <?php
}
}
?>


</div>




