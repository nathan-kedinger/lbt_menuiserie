<?php
require_once '../view/content/tab/tab_comp.php';

?>
<article class="reveal">
    <h2>Nous réalisons</h2>
    <div class="background"></div>

        <p>L'entreprise est formée à travailler l'ensemble des matériaux du bois et dérivés. Spécialement dans les travaux 
            d'agencement en fabrication artisanale et sur mesure. Comprenant :</p><br>
        <ul class="skills">

            <?php
            foreach($skills as $skill=>$key){
                echo '<li><a href="'.$skills[$skill]['link'].'">'.$skills[$skill]['skill'].'</a></li>';
            }
            ?>

        </ul>
</article>