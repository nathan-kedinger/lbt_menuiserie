//variables globales caroussel header
let counter = 0;    //compteur qui permet de savoir sur quelle image on est caroussel header
let timer, elements, slides, slideWidth, speed, transition;

//variables arrow-up
let arrowTop;

//logo phone
let logoPhone, phoneNumber, appear;
let countHide = 0;

//hide menu
let hideMenu, crossMenu, burgerMenu;

//admin - actualisation automatique galerie
let adminImageGalerie;

window.onload = () => {
    /**
     * 
     * 
     * caroussel header
     * 
     */

    //on récupère le diaporama
    const carousel = document.querySelector(".carousel");
    //on récupère data-speed
    speed = carousel.dataset.speed;
    transition = carousel.dataset.transition;

    elements = document.querySelector(".elements");

    //On clone la première image
    let firstImageClone = elements.firstElementChild.cloneNode(true);

    //On injecte le clone à la fin du diapo
    elements.appendChild(firstImageClone);
    
    //on crée un tableau avec les images
    slides = Array.from(elements.children);

    //on récupère la largeur d'une slide
    slideWidth = carousel.getBoundingClientRect().width;

    //On récupère les flèches
    let next = document.querySelector("#right-nav");
    let previous = document.querySelector("#left-nav");

    //On gère le click
    next.addEventListener("click", slideNext);
    previous.addEventListener("click", slidePrevious);

    // on automatise le défilement
    timer = setInterval(slideNext, speed);

    //On gère l'arret et la reprise
    carousel.addEventListener("mouseover", stopTimer);
    carousel.addEventListener("mouseout", startTimer);

    /**
     * 
     * Arrow-top
     * 
     */

    arrowTop = document.querySelector('.arrow-up');
     
    window.addEventListener('scroll',arrowAppear);

    /**
     * 
     * logo-phone
     * 
     */


    logoPhone = document.querySelector(".phone");
    phoneNumber = document.querySelector(".txt-logo-phone")

    window.addEventListener("scroll", numberDesappear);
    
        logoPhone.addEventListener("mouseout", numberDesappear);
    
        logoPhone.addEventListener("click",numberAppear);
        
    
    appear = phoneNumber.dataset.appear;

    /**
     * 
     * hide menu
     * 
     */

    hideMenu = document.querySelector(".hide-nav");
    crossMenu = document.querySelector(".croix-menu");
    burgerMenu = document.querySelector(".burger-menu");

    burgerMenu.addEventListener("click",showMenu);
    crossMenu.addEventListener("click",hidingMenu);

    /**
     * 
     * slide article
     * 
     */

     const threshold = .1;
     const options = {
       root: null,
       rootMargin: '0px',
       threshold
     };
     
     const handleIntersect = function (entries, observer) {
       entries.forEach(function (entry) {
         if (entry.intersectionRatio > threshold) {
           entry.target.classList.add('reveal-visible')
           observer.unobserve(entry.target)
         }
       })
     }
     
     
       const observer = new IntersectionObserver(handleIntersect, options);
       const targets = document.querySelectorAll('.reveal');
       targets.forEach(function (target) {
         observer.observe(target)
       })


    /**
     * 
     * admin - actualisation automatique galerie
     * 
     */
    adminImageGalerie = document.querySelector("imgGalerie");

    const adminGalerieButton = document.querySelector('#adminGallerieButton');
    
    adminGalerieButton.addEventListener("click",livePicture);

}

/**
 * 
 * functions
 * 
 */


//Cette fonction fait défiler le diaporama vers la droite
function slideNext(){
    //on incrémente le compteur
    counter++;
    
    //on stylise la transition
    elements.style.transition = transition+"ms ease-in-out";

    let decal = -slideWidth * counter;
    elements.style.transform = `translateX(${decal}px)`;

    //On attend la fin de la transition et on rembobine de façon cachée
    setTimeout(function(){
        if(counter >= slides.length - 1){
            counter = 0;
            elements.style.transition = "unset";
            elements.style.transform = "translateX(0)";
        }
    }, transition);
}

    //cette fonction fait défiler le diaporama vers la gauche
    function slidePrevious(){
        //on décrémente le compteur
        counter--;
        elements.style.transition = transition+"ms ease-in-out";

        if(counter < 0){
            counter = slides.length - 1;
            let decal = -slideWidth * counter;
            elements.style.transition = "unset";
            elements.style.transform =`translateX(${decal}px)`;
            setTimeout(slidePrevious, 1);
        }
        
        let decal = -slideWidth * counter;
        elements.style.transform =`translateX(${decal}px)`;

    }
    function stopTimer(){
        clearInterval(timer);
    }
    function startTimer(){
        timer = setInterval(slideNext, speed);
    }

    /**
     * 
     * Arrow-top
     * 
     */

    function arrowAppear(){
        if(window.scrollY < 100){
            arrowTop.style.opacity = "0";
            arrowTop.style.transition = "linear";
        }

        if(window.scrollY > 100){
            arrowTop.style.opacity = "1";
            arrowTop.style.transition = transition+"ms linear";
        }

    }

    /**
     * 
     * phone number
     * 
     */
    function numberAppear(){
        countHide++;
        phoneNumber.style.opacity = "1";
        phoneNumber.style.translate = "-10%";
        phoneNumber.style.transition = appear+"ms ease-in-out";
    }

    function numberDesappear(){
        countHide--;
        phoneNumber.style.opacity = "0";
        phoneNumber.style.translate = "0%";
        phoneNumber.style.transition = appear+"ms ease-in-out";

    }
    
    /**
     * 
     * hide menu
     * 
     */

    function showMenu(){
        hideMenu.style.visibility = "visible";
        burgerMenu.style.visibility = "hidden";
        crossMenu.style.visibility = "visible";
    }

    function hidingMenu(){
        hideMenu.style.visibility = "hidden";
        burgerMenu.style.visibility = "visible";
        crossMenu.style.visibility = "hidden";
    }


    /**
     * 
     * admin - actualisation automatique galerie
     * 
     */

    function livePicture(){
        adminImageGalerie.src ="new";
    }