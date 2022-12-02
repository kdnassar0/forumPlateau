<?php



$topic = $result ['data']['topics'] ;
?>


<h1>Touts les  Topics</h1>

<?php

foreach($topic as $topic1){
   
    ?>

    <p><?=$topic1->getTitre() ?></p>
    
   
    

<?php
}

?>