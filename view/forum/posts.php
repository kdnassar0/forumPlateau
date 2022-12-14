<?php



$post = $result ['data']['post'] ;
?>


<h1>Touts les Posts</h1>

<div class="listPosts">
<?php


foreach($post as $post1){
   
    ?>
  
    <span > Message : <?=$post1->getTexte() ?></span>
    <span > Date :<?=$post1->getDateCreation() ?></span>
  

<?php
}
?>
   </div>  