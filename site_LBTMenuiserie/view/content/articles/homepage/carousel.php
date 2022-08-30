<?php
require_once '../view/content/tab/tab_carousel_homepage.php';
?>
<article  class="reveal article-carousel">
    <h2>Nos réalisations</h2><br>
    <div class="carouselh"  data-transitionh="1000" data-speedh="3500">
        <ul class="elements-homepage">

        <?php   
                foreach ($carousel_homepage as $tab=>$tabInformation){
                   echo '<div class="element-homepage">
                              <li>
                                  <img class="imgHome" src="../view/ressources/images_galeries/images_galerie_header/'.$carousel_homepage[$tab]['link'].'" alt="'.$carousel_homepage[$tab]['alt'].'">
                              </li>
                          </div>';
                }
        ?>
        </ul>
        <div class="carousel-dots">
        <?php 
                foreach ($carousel_homepage as $tab=>$tabInformation){
                    echo'
                            <div class="carousel-dot">
                            </div>';
                }
        ?>
        </div>   
        <i id="lefth-nav" class="las la-chevron-left-noir"><img src="../view/ressources/logo/logo-chevron-gauche-noir.png" alt="chevron"></i>
        <i id="righth-nav" class="las  la-chevron-right-noir"><img src="../view/ressources/logo/logo-chevron-droit-noir.png" alt="chevron"></i>
    </div>
</article>