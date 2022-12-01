<?php

$posts = $result["data"]['post'];
    
?>

<h1>liste posts</h1>

<?php

foreach($posts as $post ){

    ?>
    <p><?=$post->getTexte()?></p>

    <?php
}

//ici il faut comprendre que posts c'est une tableau qui viens de forumController et on fait un foreach pour pouvoir entrer dans la foreach et afficher en utilisant get

?>