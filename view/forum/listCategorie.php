<h1>liste Categories</h1>
<div class="list">
<?php

$categories = $result["data"]['categories'];
    
?>


<?php
foreach($categories as $categorie ){
    ?>

    <p><a href="index.php?ctrl=forum&action=listTopics&id=<?=$categorie->getId()?>"><?=$categorie->getNomCategorie()?></a></p>

    <?php
}
?>
</div>