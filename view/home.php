





<div class="home">
<h1>BIENVENUE SUR LE FORUM</h1>
<?php

if(App\Session::getUser()){?>
  <div class="listCH">
   <a href="index.php?ctrl=forum&action=listCategories">la liste Categorie</a>
  </div>
  <div class="elementsHome">
  <a href="index.php?ctrl=security&action=AfficherProfileUtilisateur&id=<?=$_SESSION['user']->getId()?>"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()?></a>
    <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
   
  </div>
<?php
}else{?>
   <div class="listCH">
  <a href="index.php?ctrl=forum&action=listCategories">la liste Categorie</a>
  </div>
  <div class="elementsHome">
    <a href="index.php?ctrl=security&action=login">Se connecter</a>

    <a href="index.php?ctrl=security&action=ajouterRegister">S'inscrire</a>

   <?php 
}




?>

</div>




