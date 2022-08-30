

<?php 
require_once '../view/front_const/header_const.php';
$pageTitle = $homepage;
require_once '../view/content/head.php';
?>

<body>

    <?php
        require_once '../view/content/header.php';
    ?>

    
    <main>
        <?php
        require_once '../view/content/articles/homepage/presentation.php';
        require '../view/content/articles/separator.php';

        require_once '../view/content/articles/homepage/comp_list.php';
        require '../view/content/articles/separator.php';

        require_once '../view/content/articles/homepage/carousel.php';
        require '../view/content/articles/separator.php';

        require_once '../view/content/articles/homepage/work_method.php';
        require '../view/content/articles/separator.php';

        require_once '../view/content/articles/homepage/ecology.php';
        require '../view/content/articles/separator.php';

        require_once '../view/content/articles/contact/form.php';
        require '../view/content/articles/separator.php';

        require_once '../view/content/articles/homepage/map.php';


        //articles
        
        ?>
    </main>

    <?php require_once '../view/content/footer.php';?>

</body>
