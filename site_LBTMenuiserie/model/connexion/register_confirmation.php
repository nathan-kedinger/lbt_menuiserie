<?php
require_once '../../view/front_const/header_const.php';
$pageTitle = $logout;
require_once '../../view/content/connexion/connexion_head.php';
?>
<article>
<?php require_once '../../controller/functions/connexion/register_confirmation_function.php';?>

<button><a href="connexion.php">Retour à la page de connexion</a></button>
</article>

<?php
require_once '../../view/content/connexion/connexion_footer.php';
