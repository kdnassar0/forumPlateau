<?php

$posts = $result["data"]['post'];
$topic=(isset($_GET['id'])) ? $_GET['id'] : null  ;
    
?>



    <form action="index.php?ctrl=forum&action=ajouterPost&id=<?= $topic?>" method="post">
                    <h1>Ajouter un post</h1>
                    <label>

                        <span>Message</span> <br>
                        <input type="text" name="name"><br><br>
                        
                    </label>
                
                    <input type="submit" name="submit" value="Ajouter">
                                    
    </form>



    


<h1>liste posts</h1>

<?php

foreach($posts as $post ){
    

    ?>
    <p><?=$post->getTexte()?></p>

    <?php
}

//ici il faut comprendre que posts c'est une tableau qui viens de forumController et on fait un foreach pour pouvoir entrer dans la foreach et afficher en utilisant get

?>