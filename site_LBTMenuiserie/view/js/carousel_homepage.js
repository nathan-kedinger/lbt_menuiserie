let counth = 0;
let timerh, speedh, transitionh, elementsh, li, dot, p, i, m;

//there is two carousels scripts I add an h at the end of variables, for "homepage"

window.addEventListener('load', () => {
    counth = 0;
    const carouselh = document.querySelector(".carouselh");

    elementsh = document.querySelector(".elements-homepage");

    li = Array.from(elementsh.children);    

    speedh = carouselh.dataset.speedh;
    transitionh = carouselh.dataset.transitionh;
   
    //change before or after slide
    let nexth = document.querySelector("#righth-nav");
    let previoush = document.querySelector("#lefth-nav");
    nexth.addEventListener("click", slideNexth);
    previoush.addEventListener("click",slidePrevioush);
 
    //We set a timer to switch automaticaly slides
    timerh = setInterval(slideNexth,speedh)

    //By click on a dot we call the function to choose a slide
    let dots = document.querySelector(".carousel-dots");
    dot = Array.from(dots.children);
    for(i = 0; i < dot.length; i++){
        dot[i].addEventListener("click",toTheDot);
    }
    
    //We stop the animation when mouse is over
    carouselh.addEventListener("mouseover", stopTimerh);
    carouselh.addEventListener("mouseout", startTimerh);
})

    //beggining of the carousels functions

    function slideNexth(){
        counth++;

        
        if(counth > li.length-1){
            counth = 0;
        }

        li.forEach((e) =>{
            e.style.opacity = "0";
            e.style.transition = transitionh+"ms linear";
        });
        li[counth].style.opacity= "1";
        
        dot.forEach((e) =>{
            e.style.opacity = "0.5";
        });
        dot[counth].style.opacity = "1";


    }

    function slidePrevioush(){
        counth--;

        if(counth < 0){
            counth = li.length-1;
        }

        li.forEach((e) =>{
            e.style.opacity = "0";
            e.style.transition = transitionh+"ms linear";
        });
        li[counth].style.opacity = "1";

        dot.forEach((e) =>{
            e.style.opacity = "0.5";
        });
        dot[counth].style.opacity = "1";
        
    }

    function stopTimerh(){
        clearInterval(timerh);
    }

    function startTimerh(){
        timerh = setInterval(slideNexth, speedh);
    }

    function toTheDot(evenement){
    //We make all slides invisble
    li.forEach(e => {
        li[counth].style.opacity = "0";
           
        });
    //We get the index of the clicked objet and we asign it te a variable
     p = dot.indexOf(evenement.target);
     counth = p;
     
     //We make all dots in basic opacity
     dot.forEach(e => {
        e.style.opacity = "0.5";
     });

     //the selected dot is opacity 1
     dot[counth].style.opacity = "1";

     //the selected slide is opacity 1 and don't wait the usual transition
     li[counth].style.opacity = "1";
     li.forEach(e => {
     e.style.transitionh = "unset";
     e.style.speedh = "unset";
     });
    }