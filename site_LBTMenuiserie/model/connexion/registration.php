<?php 
require_once '../../view/front_const/header_const.php';
$pageTitle = $register;
require_once '../../view/content/connexion/connexion_head.php';
?>
<article class="registration"> 
      
   <h1>INSCRIPTION</h1>
         
      <form action="./valid_register.php" method="post" enctype="multipart/form-data">
         <h1>Registration</h1>

         <label>Nom</label>
         <input type="text" placeholder="Entrez votre nom" name="name" required pattern="^[A-Za-z '-]+$" maxlength="40">

         <label>Prénom</label>
         <input type="text" placeholder="Entrez votre prénom" name="firstName" required pattern="^[A-Za-z '-]+$" maxlength="40">

         <label>Nom d'utilisateur</label>
         <input type="text" placeholder="Choisissez un nom d'utilisateur" name="username" required pattern="^[A-Za-z '-]+$" maxlength="40">

         <label>Adresse mail</label>
         <input type="text" placeholder="Entrez votre adresse email" name="email" required pattern="^[A-Za-z-.'-]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" maxlength="60">  

         <label>Confirmation de l'adresse mail</label>
         <input type="text" placeholder="Confirmez votre adresse email" name="email-confirmation" required pattern="^[A-Za-z-.'-]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" maxlength="60">

         <label>Mot de passe</label>
         <input type="passeword" placeholder="Entrez votre mot de passe" name="password" required>

         <label>Confirmation du mot de passe</label>
         <input  type="passeword"  placeholder="Confirmez votre mot de passe" name="password-confirm" required>

         <label for="tos" class="inline-label"><p>J'accepte les <a href="">conditions générales d'utilisation</a></p></label>
         <input class="grand-checkbox" type="checkbox" name="tos" id="tos" required>

         <button type="submit" id="submit" value="register">s'enregistrer</button>
      </form>
</article>

<?php
require_once '../../view/content/connexion/connexion_footer.php';