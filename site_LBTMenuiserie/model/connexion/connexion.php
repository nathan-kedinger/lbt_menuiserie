<?php 
require_once '../../view/front_const/header_const.php';
$pageTitle = $connexion;
require_once '../../view/content/connexion/connexion_head.php';
?>

<article class="connexion"> 

   <h1>CONNEXION</h1>

      <form action="valid_connexion.php" method="POST">

         <label>Nom d'utilisateur</label>
         <input type="text" placeholder="Entrez votre nom d'utilisateur" name="username" required>

         <label>Mot de passe</label>
         <input type="passeword" placeholder="Entrez votre mot de passe" name="password" required>

         <input type="submit" id="submit" value="connexion">
      </form>

      <p>Vous n'avez pas encore de compte? Inscrivez-vous :<a href="registration.php"> Inscription</a></p>

</article>

<?php
require_once '../../view/content/connexion/connexion_footer.php';