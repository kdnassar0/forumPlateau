<?php

use Model\Entities\Topic;

$topics = $result["data"]['topics'];
$categorie = (isset($_GET['id'])) ? $_GET['id'] : null;
$nomCategorie = $result["data"]['categorie'];

foreach ($nomCategorie as $nom) {
?> <p class="nomCategorie"><?= $nom->getNomCategorie() ?></p>

<?php
}
?>





<h1>liste topics</h1>
<?php if (!App\Session::getUser()) { ?>
    <h2>Pensez à vous connecter si vous voulez ajouter un topic : </h2>
<?php } ?>




<?php if ($topics) {
   
   
    foreach ($topics as $topic) {
       
?> <div class='listTopic'> <?php ?>
        
       
            <p><a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic->getId() ?>"><?= $topic->getTitre() ?></a></p>
            <p>By : <?= $topic->getAuteur() ?><br> <?= $topic->getDateCreation() ?></p>

       
        
            <?php
        //   ici on compare l'id de ce utilisateur avec l'id de l'auteur de ce topic 
          if (App\Session::isAdmin() || App\Session::getUser()->getId() == $topic->getAuteur()->getId()  )
           {

                if ($topic->getVerroier() == 0) {

            ?><p><a href="index.php?ctrl=security&action=closeTopic&id=<?= $topic->getId() ?>&idCateg=<?= $topic->getCategorie()?>">close</a></p>




                <?php    } else {
                ?> <p> <a href="index.php?ctrl=security&action=openTopic&id=<?= $topic->getId() ?>&idCateg=<?= $topic->getCategorie()?>">open</a> </p><?php
                                ?>
                      <?php
                }

                ?>           
                    <?php
                    
                    if (App\Session::isAdmin() || App\Session::getUser()->getId() == $topic->getAuteur()->getId()  )
                     { ?>


                        <p><a href="index.php?ctrl=security&action=supprimerUnTopic&id=<?= $topic->getId() ?>&idCateg=<?= $topic->getCategorie()?>">supprimer</a></p>

                       
                    <?php
                    
                    }

                  

                    ?>
            
       

   </form>
        <?php
           
            }
           ?> </div><?php
        }
      
    } else {
        ?>
        <div class="vide">
    <p>Il n'y a pas de topics qui correspondent à cette categorie </p>
       
 
        <a href="index.php?ctrl=security&
     action=ajouterRegister">S'inscrire -</a>
        <a href="index.php?ctrl=security&action=login">Se connecter</a>
        </div>
    <?php
    }
?>

    <?php if (App\Session::getUser()) { ?>

        <form action="index.php?ctrl=forum&action=ajouterTopic&id=<?= $categorie ?>" method="post">
    
            <div class="borderList">
                <h1>Ajouter un topic</h1>
                <label>
    
                    <span>Titre</span> <br>
                    <input type="text" name="name" ><br><br>
    
                </label>
                <label class="zoneMessage">
    
                    <span>Message</span> <br>
                    <textarea class="case" type="text" name="message"></textarea>
    
                </label>
    
                <input type="submit" name="submit" value="Ajouter"><br>
    
    
    
            </div>
        </form>
    
    
    
    <?php } ?>


  