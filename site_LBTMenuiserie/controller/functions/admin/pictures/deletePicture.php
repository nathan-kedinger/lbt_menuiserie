<?php
//function suppression une photo

$pictures = $pdo->query("
SELECT * FROM base_pictures
");

?>
<article>
    <h2>Supprimer Une photo</h2>
    <form method="post" action=""  enctype="multipart/form-data">
        <label for="deletePicture">supprimer la photo :</label>
            <select name='deletePicture'>
                <?php while($picture = $pictures-> fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value = '".$picture['pictureDescription']."'>".$picture['pictureDescription']."</option>";
            }?>
            </select>
        <input type = "submit" value="Supprimer l'image">
    </form>
</article>
<?php

$pictureDescription = $_POST['deletePicture'];

$deletePicture = $pdo->prepare("
DELETE FROM `base_pictures` WHERE pictureDescription = :pictureDescription
");
$deletePicture->bindParam(':pictureDescription', $pictureDescription);
$deletePicture->execute();

$pictures->closeCursor();