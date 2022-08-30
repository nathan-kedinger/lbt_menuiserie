<?php
session_start();
?>

<article>

<?php
if (session_destroy()) {
    echo 'Vous êtes maintenant déconnecté.';
} else {
    echo 'Oups ! une erreur s\'est produite...';
}
?>

<form action="../homepage.php">
<input type="submit" id="submit" value="Retour au site">

</form>
</article>
