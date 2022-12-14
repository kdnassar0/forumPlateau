<?php
$details = $result ['data']['details'] ;

?>



<?php
if(App\Session::getUser()){?>
<?php

  echo '<p>'. $details->getPseudonyme() .'</p>'  ;
  echo '<p>'.$details->getDateInscription() .'</p>';
  echo '<p>'.$details->getEmail() .'</p>';
  echo'<p>'. $details->getRole().'</p>';

}

?>