function goBack() {
    window.history.back();
}

let slideIndex=1;

function showSlides(n) {
    let index;
    let slides = document.getElementsByClassName("slide");
    if (n > slides.length){
        slideIndex = 1;
    }
    if (n < 1){
        slideIndex = slides.length;
    }
    for (index = 0; index < slides.length; index++){
        if (index===(slideIndex-1)){
            slides[index].style.display = "block";
        }else{
            slides[index].style.display = "none";
        }

    }
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}