var checkboxes = document.querySelectorAll('.check');

// Ripristina lo stato dei checkbox al caricamento della pagina
window.addEventListener('DOMContentLoaded', function() {
    checkboxes.forEach(function(checkbox) {
        var checkboxId = checkbox.dataset.id;
        var checkboxState = localStorage.getItem('checkbox_' + checkboxId);

        if (checkboxState === 'true') {
            checkbox.checked = true;
        }
    });
});

// Aggiungi un evento di ascolto ai checkbox
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        var checkboxId = this.dataset.id;
        var checkboxState = this.checked;

        // Salva lo stato selezionato nel localStorage
        localStorage.setItem('checkbox_' + checkboxId, checkboxState);

        document.getElementById('formCheckbox').submit(); // Esempio di invio del modulo
    });
});
