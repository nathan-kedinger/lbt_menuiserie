<?php 
require_once '../view/front_const/header_const.php';
$pageTitle = $contact;
require_once '../view/content/head.php';
?>

<body>

    <?php
        require_once '../view/content/header.php';
    ?>

    
    <main>
        <?php
        require_once '../view/content/articles/contact/welcome_contact.php';

        require_once '../view/content/articles/contact/form.php';
        require '../view/content/articles/separator.php';

        require_once '../view/content/articles/homepage/map.php';


        //articles
        
        ?>
    </main>

    <?php require_once '../view/content/footer.php';?>

</body>