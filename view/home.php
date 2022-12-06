



<h1>BIENVENUE SUR LE FORUM</h1>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Sit ut nemo quia voluptas numquam, itaque ipsa soluta ratione eum temporibus aliquid, facere rerum in laborum debitis labore aliquam ullam cumque.</p>
<?php

if(App\Session::getUser()){?>

  <a href="index.php?ctrl=forum&action=listCategories"> liste Categorie</a>
  
  
    <a href="/security/viewProfile.html"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()?></a>
    <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
<?php
}else{?>
  <a href="index.php?ctrl=forum&action=listCategories">la liste Categorie</a>
    <a href="index.php?ctrl=security&action=login">Se connecter</a>
    <span>&nbsp;-&nbsp;</span>
    <a href="index.php?ctrl=security&action=ajouterRegister">S'inscrire</a>
   <?php 
}




?>


   



