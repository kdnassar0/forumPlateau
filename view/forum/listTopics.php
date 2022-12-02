<?php

$topics = $result["data"]['topics'];
$categorie=(isset($_GET['id'])) ? $_GET['id'] : null  ;

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php?ctrl=forum&action=ajouterTopic&id=<?= $categorie?>" method="post">
                    <h1>Ajouter un topic</h1>
                    <label>

                        <span>titre</span> <br>
                        <input type="text" name="name"><br><br>
                        
                    </label>
                    <label>

                        <span>Message</span> <br>
                        <input type="text" name="message"><br><br>
                    
                    </label>
                
                    <input type="submit" name="submit" value="ajouter">
                                    
    </form>



    
</body>
</html>

<h1>liste topics</h1>

<?php
foreach($topics as $topic ){
   

    ?>
    <p><a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId()?>"><?=$topic->getTitre()?></a></p>
    <?php

}

  
