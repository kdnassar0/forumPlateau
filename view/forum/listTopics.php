<?php

$topics = $result["data"]['topics'];
$categorie=(isset($_GET['id'])) ? $_GET['id'] : null  ;


?>


    <form action="index.php?ctrl=forum&action=ajouterTopic&id=<?= $categorie?>" method="post">
     <div class="borderList">
                    <h1>Ajouter un topic</h1>
                    <label>

                        <span>Titre</span> <br>
                        <input type="text" name="name"><br><br>
                        
                    </label>
                    <label>

                        <span>Message</span> <br>
                        <input type="text" name="message"><br><br>
                    
                    </label>
                
                    <input type="submit" name="submit" value="Ajouter">
          </div>                          
    </form>



    <h1>liste topics</h1> 



<div>
<?php
foreach($topics as $topic ){
   

    ?>
    <p><a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId()?>"><?=$topic->getTitre()?></a></p>
    <?php

}

  
?>
