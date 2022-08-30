<?php
session_start();
require_once '../../../view/front_const/header_const.php';
$pageTitle = 'ADMIN';
require_once '../../../view/content/connexion/admin_connexion_head.php';
require_once '../../../controller/bdd/connexion_bdd_local.php'; 

//créer un fichier dans les "functions"
?>

<article>
<h2>Ajouter une photo</h2>
        <form method="post" action=""  enctype="multipart/form-data">
            <div class="add-picture">
            <label for="pictureName"><p>Nom de la photo : ne doit pas comporter d'espace ni d'accents et doit se terminer par l'extension exemple : "barriere-pin.jpg" Le nom doit être identique au nom du fichier</p></label>
            <input type="text" name="pictureName" id="pictureName" placeholder="nom de la photo"  pattern="^[A-Za-z-.'-]+$" maxlength="30">
            </div>

            <div class="add-picture">
            <label for="pictureDescription"><p>Déscription de la photo</p></label>
            <input type="text" name="pictureDescription" id="pictureDescription" placeholder="Saisissez une déscription" required maxlength="150">
            </div>

            <div class="add-picture">
            <label for="pictureAlt"><p>Texte alternatif en cas de problème d'affichage</p></label>
            <input type="test" name="pictureAlt" id="pictureAlt" placeholder="Saisissez un texte alternatif" required maxlength="50">
            </div>

            <div class="add-picture">
            <input type="hidden" name="MAX_FILE_SIZE" value="800000">
            <label for="addPicture"><p>Sélectionnez l'image à ajouter</p></label>
            <input type="file" name="pictureFile" id="pictureFile" placeholder="fichier" required>
            </div>

            <div class="add-picture">
            <button id="adminGallerieButton" type="submit"><p>Déposer la photo</p></button>
            </div>
        </form>
</article>



<article>
<?php
//function affichage de la galerie : récupération des données



$pictures = $pdo->query("
SELECT * FROM base_pictures
");

while($picture = $pictures-> fetch(PDO::FETCH_ASSOC)){
    echo '  <div class="galerie-realisation">
                <li>
                    <img class="imgGalerie" src="../../../view/ressources/images_galeries/images_galerie/'.$picture['pictureName'].'" alt="'.$picture['pictureAlt'].'">
                    <p class="galerieTxt">'.$picture['pictureDescription'].'</p>
                </li>
            </div>';
}

$pictures->closeCursor();


?>
</article>


<?php
//suppression de photo
require_once '../../../controller/functions/admin/pictures/deletePicture.php';
require_once '../../../controller/functions/admin/pictures/addPicture.php';


