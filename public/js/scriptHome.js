// restituisce la % di scorrimento da 1 a 99
const progressBarEl = document.getElementById('progress-bar');
window.addEventListener('scroll',() => {
    let height=document.body.scrollHeight- window.innerHeight;
    let scrollPosition=document.documentElement.scrollTop;
    let width =(scrollPosition / height) * 99.6;
    progressBarEl.style.width = width + "%";
});

let slideIndex = 0;
showSlides();

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 2000);
}