<?php



$topic = $result ['data']['topics'] ;
?>


<h1>Touts les  Topics</h1>
<div class="topics">

<?php

foreach($topic as $topic1){
   
    ?>
  
   <span><a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic1->getId() ?>"><?=$topic1->getTitre() ?></a></span> 
    
   
    

<?php
}

?>

</div>

