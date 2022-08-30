<?php

require_once '../../view/front_const/header_const.php';
$pageTitle = $valid_register;
require_once '../../view/content/connexion/connexion_head.php';
require '../../controller/functions/connexion/register_function.php';
?>

<article>
    <p>Merci de vous être enregistré, et bienvenus !<br> Vous allez recevoir un mail de validation.  
        Merci d'aller vérifier vos emails et de cliquer sur le lien de validation pour pouvoir vous connecter. <br>
        N'oubliez pas de vérifier vos SPAMS</p>

    <button ><a href="../homepage.php"> Retourner vers le site</a></button>
</article>

<?php
require_once '../../view/content/connexion/connexion_footer.php';
