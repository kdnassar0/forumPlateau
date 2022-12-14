<?php

use Model\Entities\Topic;

$posts = $result["data"]['post'];
$topic=(isset($_GET['id'])) ? $_GET['id'] : null  ;
$topics =$result['data']['topics'] ;


?>



<?php
if(App\Session::getUser() && $topics['verroier']==0){
  
  
    ?>
    
    <form action="index.php?ctrl=forum&action=ajouterPost&id=<?= $topic?>" method="post">
    
                    <h1>Ajouter un post</h1>

                
                    <label>

                        <span>Message</span> <br>
                        <input class="case" type="text" name="name"><br><br>
                        
                    </label>
                
                    <input type="submit" name="submit" value="Ajouter">
                                 
    </form>


    <?php }else{
        ?> <p>Topic closed</p> <?php
    }
    ?>
    


<h1>liste posts</h1>
<?php if(!App\Session::getUser()){?>
<h2>Pensez-vous à connecter si vous voulez ajouter un message : </h2>
<?php } ?>
<h1>List</h1>
<div class="listPostList">
<?php
if($posts){
foreach($posts as $post ){
    

    ?>
    
    <p><?=$post->getTexte()?></p>
    <p><?=$post->getAuteur()?></p>
    <p><?=$post->getDateCreation()?></p>

    <?php
}
}else{
    echo "Il n'y a pas de posts qui correspondent à cette categorie " ; ?>
    <a href="index.php?ctrl=security&
    action=ajouterRegister">S'inscrire -</a>
    <a href="index.php?ctrl=security&action=login">Se connecter</a>
    <?php

}


//ici il faut comprendre que posts c'est une tableau qui viens de forumController et on fait un foreach pour pouvoir entrer dans la foreach et afficher en utilisant get

?>
</div>
