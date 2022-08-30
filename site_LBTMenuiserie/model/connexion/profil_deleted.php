<?php 
session_start();

require_once '../../view/front_const/header_const.php';
$pageTitle = $profil;
require_once '../../view/content/connexion/connexion_head.php';


require_once '../../controller/functions/connexion/delete_profil_function.php';
?>
<article>

    <h1>Votre compte a bien été supprimé</h1>

        <button><a href='../homepage.php'>retourner vers le site</a></button>
</article>