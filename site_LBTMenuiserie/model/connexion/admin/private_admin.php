<?php
session_start();
require_once '../../../view/front_const/header_const.php';
$pageTitle = 'ADMIN';
require_once '../../../view/content/connexion/admin_connexion_head.php';

echo "<h1>Bonjour ".$_SESSION['username']."</h1>";
?>
<article>
    <h2>Bienvenus dans la partie administration. Vous pouvez choisir les actions à effectuer sur le site</h2>

    <p>Vous pouver modifer les images et leur ordre</p>
    <button><a href="admin_pictures.php">Images</a></button>

    <p>Vous pouvez consulter les messages envoyés par vos potentiels clients</p>
    <button><a href="admin_message.php">Messagerie</a></button>
    
    <p>Vous pouvez consulter les statistiques des utilisateurs</p>
    <button><a href="admin_stats.php">Statistiques</a></button>
</article>