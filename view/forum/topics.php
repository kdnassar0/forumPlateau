<?php



$topic = $result ['data']['topics'] ;
?>


<h1>Touts les  Topics</h1>
<div class="listTopic">

<?php

foreach($topic as $topic1){
   
    ?>

    <span><?=$topic1->getTitre() ?></span>
    
   
    

<?php
}

?>

</div>