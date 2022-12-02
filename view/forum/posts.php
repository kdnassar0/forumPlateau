<?php



$post = $result ['data']['post'] ;
?>


<h1>Touts les Posts</h1>

<?php

foreach($post as $post1){
   
    ?>

    <p><?=$post1->getTexte() ?></p>
    <p><?=$post1->getDateCreation() ?></p> <br><br>
    

<?php
}

?>