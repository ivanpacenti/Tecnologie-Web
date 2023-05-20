var checkboxes = document.querySelectorAll('.check');
var checkboxIds = [];

// Memorizza gli ID dei checkbox selezionati
for (var i = 0; i < checkboxes.length; i++) {
    var checkboxId = checkboxes[i].value;

    checkboxIds.push(checkboxId);

    // Aggiungi un evento di ascolto ai checkbox
    checkboxes[i].addEventListener('change', function() {
        var checkboxId = this.value;
        var checkboxState = this.checked;
        if (checkboxState) {
            document.getElementById('formCheckbox').submit(); // Esempio di invio del modulo
            // Salva lo stato selezionato nel localStorage
            localStorage.setItem('checkbox_' + checkboxId, checkboxState);
        }
    });
}

// Ripristina lo stato dei checkbox al caricamento della pagina
window.addEventListener('DOMContentLoaded', function() {
    for (var i = 0; i < checkboxIds.length; i++) {
        var checkboxId = checkboxIds[i];
        var checkboxState = localStorage.getItem('checkbox_' + checkboxId);

        var checkbox = document.querySelector('[data-id="' + checkboxId + '"]');
        if (checkboxState === 'true') {
            checkbox.checked = true;
        }
    }
});

