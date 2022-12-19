<?php
$details = $result ['data']['details'] ;

?>


<div class="profilePersonne">
<?php
if(App\Session::getUser()){?>
<?php
 
  echo '<p> Nom : ' . $details->getPseudonyme() .'</p>'  ;
  echo '<p> Date inscription : '.$details->getDateInscription() .'</p>';
  echo '<p>E-mail : '.$details->getEmail() .'</p>';
  echo'<p> '. $details->getRole().'</p>';

}

?>
</div>