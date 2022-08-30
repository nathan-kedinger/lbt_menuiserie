
<?php
    require_once '../view/content/tab/tab_galerie_realisation.php';
    require_once '../controller/bdd/connexion_bdd_local.php'; 

?>

    <div class="galerie-realisations">
        <h2>Quelle menuiserie voulez-vous pour votre habitat?</h2>

        <ul class="galerie-photos">
<?php
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pictures = $pdo->query("
    SELECT * FROM base_pictures
    ");
    
    while($picture = $pictures-> fetch(PDO::FETCH_ASSOC)){
        echo '  <div class="galerie-realisation">
                    <li>
                        <img class="imgGalerie" src="../view/ressources/images_galeries/images_galerie/'.$picture['pictureName'].'" alt="'.$picture['pictureAlt'].'">
                        <p class="galerieTxt">'.$picture['pictureDescription'].'</p>
                    </li>
                </div>';
    }
?>
        </ul>
    </div>

<?php


/*$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pictures = $pdo->query("
SELECT * FROM base_pictures
");

while($picture = $pictures-> fetch(PDO::FETCH_ASSOC))
{
  echo "<p>Image numéro : ".$picture['ID']."</p> <img src='../../../view/ressources/images_galeries/images_galerie/".$picture['pictureName']."'
   alt='".$picture['pictureAlt']."' ><p>description : ""</p>";
}

$pictures->closeCursor();*/