<?php

$posts = $result["data"]['post'];
$topic=(isset($_GET['id'])) ? $_GET['id'] : null  ;
    
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
    <form action="index.php?ctrl=forum&action=ajouterPost&id=<?= $topic?>" method="post">
                    <h1>Ajouter un post</h1>
                    <label>

                        <span>Message</span> <br>
                        <input type="text" name="name"><br><br>
                        
                    </label>
                
                    <input type="submit" name="submit" value="Ajouter">
                                    
    </form>



    
</body>
</html>

<h1>liste posts</h1>

<?php

foreach($posts as $post ){
    

    ?>
    <p><?=$post->getTexte()?></p>

    <?php
}

//ici il faut comprendre que posts c'est une tableau qui viens de forumController et on fait un foreach pour pouvoir entrer dans la foreach et afficher en utilisant get

?>