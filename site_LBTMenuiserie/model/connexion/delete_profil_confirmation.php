<?php 
session_start();

require_once '../../view/front_const/header_const.php';
$pageTitle = $profil;
require_once '../../view/content/connexion/connexion_head.php';
?>

<body>

    <article>

        <p>Voulez-vous vraiment supprimer votre profil ? Toute suppression est définitive.</p>

        <form method="POST" action="profil_deleted.php"> 
	                    <label>Suppression du compte</label>
	                    <input type="submit" value="valider" name="valider" /> 
	    </form> 
    </article>

    <?php require_once '../../view/content/connexion/connexion_footer.php';?>

</body>
