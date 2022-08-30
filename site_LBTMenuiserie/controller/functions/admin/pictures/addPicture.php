<?php
//function insertion de photos


$pictureName = $_POST['pictureName'];
$pictureDescription = $_POST['pictureDescription'];
$pictureAlt = $_POST['pictureAlt'];


if ($_FILES['pictureFile']['error']) {
    switch ($_FILES['pictureFile']['error']){
      case 1: // UPLOAD_ERR_INI_SIZE
        echo "Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";
        break;
      case 2: // UPLOAD_ERR_FORM_SIZE
        echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !";
        break;
      case 3: // UPLOAD_ERR_PARTIAL
        echo "L'envoi du fichier a été interrompu pendant le transfert !";
        break;
      case 4: // UPLOAD_ERR_NO_FILE
        echo "Le fichier que vous avez envoyé a une taille nulle !";
        break;
    }
  }else{
    $nom = $_FILES['pictureFile']['tmp_name'];
    $nomdestination = '../../../view/ressources/images_galeries/images_galerie/'.$pictureName.'';
    move_uploaded_file($nom, $nomdestination);
  }


try{


$addPicture = $pdo->prepare("
INSERT INTO `base_pictures` (`pictureName`, `pictureDescription`, `pictureAlt`) 
VALUES (:pictureName, :pictureDescription, :pictureAlt)
");
$addPicture->bindParam(':pictureName', $pictureName);
$addPicture->bindParam(':pictureDescription', $pictureDescription);
$addPicture->bindParam(':pictureAlt', $pictureAlt);
$addPicture->execute();






}
catch(PDOException $e){
    die('<p> Erreur : '.$e->getMessage().'</p>');
}