// Aggiungi un evento di ascolto ai checkbox
var checkboxes = document.querySelectorAll('.check');
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', handleCheckboxChange);
});

// Funzione per gestire il cambio di stato dei checkbox
function handleCheckboxChange() {
    var checkboxesSelezionati = document.querySelectorAll('.check:checked');
    var nomiAziendeSelezionate = [];

    checkboxesSelezionati.forEach(function(checkbox) {
        nomiAziendeSelezionate.push(checkbox.id);
        //inviaRichiestaAlServer(nomiAziendeSelezionate);
    });

    // Invia i nomi delle aziende selezionate al server tramite una richiesta AJAX
   inviaRichiestaAlServer(nomiAziendeSelezionate);
    //for (var i=0;i<nomiAziendeSelezionate.length;i++) document.write(nomiAziendeSelezionate[i]);
}

// Funzione per inviare una richiesta al server
function inviaRichiestaAlServer(nomiAziendeSelezionate) {
    var url = '/updateCatalogo'; // URL della rotta nel tuo controller che gestisce la richiesta
    var data = { nomi_aziende_selezionate: nomiAziendeSelezionate };

    // Esegui una richiesta AJAX
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
        .then(function(response) {
            return response.json();

        })
        .then(function(data) {
            // Gestisci la risposta dal server, ad esempio aggiorna la vista con le nuove offerte
            aggiornaVistaOfferte(data.offerte);

        })
        .catch(function(error) {
            console.error('Si è verificato un errore:', error);
        });
}

// Funzione per aggiornare la vista delle offerte

function aggiornaVistaOfferte(offerte) {
    var containerOfferte = document.getElementById('containerCoupon');

    // Rimuovi tutte le offerte presenti nel container
    while (containerOfferte.firstChild) {
        containerOfferte.firstChild.remove();
    }

    // Aggiungi le nuove offerte al container
    offerte.forEach(function(offerta) {
        var offertaDiv = document.createElement('div');
        offertaDiv.classList.add('offerta');
        offertaDiv.textContent = offerta.titolo;
        containerOfferte.appendChild(offertaDiv);
    });
}

