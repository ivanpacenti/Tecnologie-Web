// Aggiungi un evento di ascolto ai checkbox
var checkboxes = document.querySelectorAll('.check');
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', handleCheckboxChange);
});

// Funzione per gestire il cambio di stato dei checkbox
function handleCheckboxChange() {
    var checkboxesSelezionati = document.querySelectorAll('.check:checked');
    var idAziendeSelezionate = [];


    checkboxesSelezionati.forEach(function(checkbox) {
        idAziendeSelezionate.push(checkbox.value);
        inviaRichiestaAlServer(idAziendeSelezionate);
    });

    // Invia i nomi delle aziende selezionate al server tramite una richiesta AJAX
   //inviaRichiestaAlServer(idAziendeSelezionate);
    //for (var i=0;i<idAziendeSelezionate.length;i++) document.write(idAziendeSelezionate[i]);
}

// Funzione per inviare una richiesta al server
function inviaRichiestaAlServer(idAziendeSelezionate) {
    var url = '/laraProj5/public/filtraggioAziende_test'; // URL della rotta nel tuo controller che gestisce la richiesta
    var data = { id_aziende_selezionate: idAziendeSelezionate };

    // Esegui una richiesta AJAX
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
        body: JSON.stringify(data)
    })
        .then(function(response) {
            return response.json();

        })
        .then(function(data) {
            // Gestisci la risposta dal server, ad esempio aggiorna la vista con le nuove offerte
            /*data.offerte.forEach(offerta => {
                document.writeln(offerta.descrizione);
                document.writeln(offerta.luogoFruizione);
            })*/

            aggiornaVistaOfferte(data.offerte);
        })
        .catch(function(error) {
            console.error('Si è verificato un errore:', error);
        });
}

// Funzione per aggiornare la vista delle offerte
function aggiornaVistaOfferte(offerte) {
    var elems = document.getElementsByClassName('containerCoupon');
    for(var i=0;i<elems.length;i++) elems[i].style.display='none'

    // Aggiungi le nuove offerte al container
   /* offerte.forEach(function(offerta) {
        var offertaDiv = document.createElement('div');
        offertaDiv.classList.add('containerCoupon');
        offertaDiv.textContent = offerta.descrizione;
        containerOfferte.appendChild(offertaDiv)
    });*/
}


