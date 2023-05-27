let slideIndex = 0;
showSlides();

function showSlides() {
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

function initMap() {
    var latLng = { lat: 43.58690331062659, lng: 13.516659369608051 }; // Posizione specifica sulla mappa

    var mapOptions = { // Opzioni della mappa
        center: latLng,
        zoom: 13
    };

    var map = new google.maps.Map(document.getElementById('map'), mapOptions); // Crea una nuova istanza della mappa

    var marker = new google.maps.Marker({ // Aggiungi un marker per la posizione specifica
        position: latLng,
        map: map,
        title: 'La nostra posizione'
    });
}


