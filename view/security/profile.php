<?php
$topic = $result ['data']['topics'] ;

?>



<?php
if(App\Session::getUser()){?>
<?php
foreach($topic as $topic1){

    ?>

    <span><?=$topic1->getTitre()
    ?></span>
    
   
<?php
}
}

?>