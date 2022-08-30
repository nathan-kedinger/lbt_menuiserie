<?php
session_start();
require '../view/content/tab/tab_menu.php';
require '../view/content/tab/tab_galerie_header.php'
?>
<body>
<div id="title"></div>
<div class="background-left"></div>
<div class="background-right"></div> 
<header> 


<div class="carousel" data-speed="5500" data-transition="1000">
  <div class="elements">
<?php

      foreach ($galerie_header as $tab=>$tabInformation){
         echo '<div class="element">
            <img src="../view/ressources/images_galeries/images_galerie_header/'.$galerie_header[$tab]['link'].'" alt="'.$galerie_header[$tab]['alt'].'">
              <h3>'.$galerie_header[$tab]['txt'].'</h3>
          </div>';
      }
?>

  </div>
    <!--flèches-->
    <i id="left-nav" class="las  la-chevron-left"><img class="" src="../view/ressources/logo/logo-chevron-gauche.png" alt="chevron"></i>
    <i id="right-nav" class="las  la-chevron-right"><img class="" src="../view/ressources/logo/logo-chevron-droit.png" alt="chevron"></i>
    <!--points de lien-->

</div>
       
  <h1 class="title"><a href="./homepage.php"><?php echo $headerTitle ?></a></h1>
    <nav>
      <div class="menu">
        <?php

          echo '<ul>';

          foreach ($menu as $tab=>$tabInformation){
            echo '<li class="boutons"><a href="./'.$menu[$tab]['link'].'">'.$menu[$tab]['tab'].'</a></li>';
          }
          echo'</ul>';
        ?>
      </div>

      

      <div class="menu-derroulant">

        <img class="icon-hide-menu burger-menu" src="../view/ressources/logo/logo-burger-menu.png" alt="burger-menu">
        <img class="icon-hide-menu croix-menu" src="../view/ressources/logo/logo-croix-menu.png" alt="croix-menu">

        <?php

          echo '<ul class="hide-nav">';

          foreach ($menu as $tab=>$tabInformation){
            //rajouter ../page?
            echo '<li><a href="./'.$menu[$tab]['link'].'">'.$menu[$tab]['tab'].'</a></li>';
          
          }
          echo'</ul>';
        ?></a>
      </div>
    </nav>  
      
<ul class="logo-list">
    <div class="phone">
      <li><a class="logo-phone"><img class="logo" src="../view/ressources/logo/logo-phone.png" alt="logo-phone"><div class="txt-logo-phone" data-appear ="200"><p>06.22.86.33.09</p></div></a></li>
    </div>

      <li><a class="logo-facebook" href="https://facebook.com/"><img class="logo" src="../view/ressources/logo/logo-facebook.png" alt="logo-facebook"></a></li>
  
      <li><a class="logo-instagram" href="https://www.instagram.com/lbtmenuiserie/"><img class="logo" src="../view/ressources/logo/logo-instagram.png" alt="logo-instagram"></a></li>
      
      <li><a class="logo-mail" href="./contact.php"><img class="logo" src="../view/ressources/logo/logo-mail.png" alt="logo-mail"></a></li>
</ul>


</header>

