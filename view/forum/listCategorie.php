<h1>liste Categories</h1>

<?php

$categories = $result["data"]['categories'];



?>





<div class="list">
<?php
foreach($categories as $categorie ){
    ?>

    <p><a href="index.php?ctrl=forum&action=listTopics&id=<?=$categorie->getId()?>"><?=$categorie->getNomCategorie()?></a></p>

    <?php
}

?>
</div>
<?php if(App\Session::isAdmin()){?>
<form action="index.php?ctrl=forum&action=ajouterCategorie&id=>" method="post">
<div class="borderList">
    <h1>Ajouter un Categorie</h1>


    <label>

        <span>Message</span> <br>
        <input type="text" name="name"><br><br>
        
    </label>

    <input type="submit" name="submit" value="Ajouter">
</div>            
</form>

<?php
}

?>