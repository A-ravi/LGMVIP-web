let Sflag = 0;

function controller(x){
    Sflag = Sflag + x;
    slideshow(Sflag);
}

slideshow(Sflag);

function slideshow(num){
    
    let slides = document.getElementsByClassName('slide');
     console.log(num);
    if(num == slides.length){
        num = 0;
        Sflag = 0;
    }
    if(num < 0){
        num = slides.length - 1;
        Sflag = slides.length - 1;
    }

    for(let y of slides){
        y.style.display = "none";
    }

    slides[num].style.display =  "block";
    
}


let Vflag = 0;

function Vcontroller(x){
    Vflag = Vflag + x;
    Vslideshow(Vflag);
}

Vslideshow(Vflag);

function Vslideshow(num){
    
    let Vslides = document.getElementsByClassName('video');
    
    if(num == Vslides.length){
        num = 0;
        Vflag = 0;
    }
    if(num < 0){
        num = Vslides.length - 1;
        Vflag = Vslides.length - 1;
    }

    for(let y of Vslides){
        y.style.display = "none";
    }

    Vslides[num].style.display =  "block";
    
}