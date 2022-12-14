<?php

use Model\Entities\Topic;

$topics = $result["data"]['topics'];
$categorie = (isset($_GET['id'])) ? $_GET['id'] : null;
$nomCategorie = $result["data"]['categorie'];

foreach($nomCategorie as $nom){
    ?> <p><?=$nom->getNomCategorie()?></p>

    <?php
}
?>


<?php if (App\Session::getUser()) { ?>

    <form action="index.php?ctrl=forum&action=ajouterTopic&id=<?= $categorie ?>" method="post">

        <div class="borderList">
            <h1>Ajouter un topic</h1>
            <label>

                <span>Titre</span> <br>
                <input type="text" name="name"><br><br>

            </label>
            <label class="zoneMessage">

                <span>Message</span> <br>
                <input type="text" name="message"><br><br>

            </label>

            <input type="submit" name="submit" value="Ajouter">
        </div>
    </form>


<?php } ?>


<h1>liste topics</h1>
<?php if (!App\Session::getUser()) { ?>
    <h2>Pensez-vous à connecter si vous voulez ajouter un topic : </h2>
<?php } ?>





<?php if ($topics) {

    foreach ($topics as $topic) {
?> <div class="tableau"> <?php ?>
            <div class="one">
                <p class="titre"><a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic->getId() ?>"><?= $topic->getTitre() ?></a></p>
                <p class="datail">By : <?= $topic->getAuteur() ?> <?= $topic->getDateCreation() ?></p>

            </div>

            <div class="tow">

                <?php

                if ($topic->getVerroier() == 0) {

                ?><p><a href="index.php?ctrl=security&action=closeTopic&id=<?= $topic->getId() ?>">close</a></p>




                <?php    } else {
                ?> <p>closed</p><?php
                                ?>

            </div>
    </div>
    
    <?php
                }

    ?>



<?php


    }
} else {
    echo "Il n'y a pas de topics qui correspondent à cette categorie "; ?>
<a href="index.php?ctrl=security&
     action=ajouterRegister">S'inscrire -</a>
<a href="index.php?ctrl=security&action=login">Se connecter</a>
<?php
}


?>