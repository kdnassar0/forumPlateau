<h1>liste Categories</h1>
<div class="list">
<?php

$categories = $result["data"]['categories'];


if(App\Session::isAdmin()){
?>


<form action="index.php?ctrl=forum&action=ajouterCategorie&id=>" method="post">
   
    <h1>Ajouter un Categorie</h1>


    <label>

        <span>Message</span> <br>
        <input type="text" name="name"><br><br>
        
    </label>

    <input type="submit" name="submit" value="Ajouter">
                 
</form>

<?php } ?>
<?php
foreach($categories as $categorie ){
    ?>

    <p><a href="index.php?ctrl=forum&action=listTopics&id=<?=$categorie->getId()?>"><?=$categorie->getNomCategorie()?></a></p>

    <?php
}

?>
</div>