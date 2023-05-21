var checkboxes = document.querySelectorAll('.check');
var checkboxIds = [];

// Memorizza gli ID dei checkbox selezionati
for (var i = 0; i < checkboxes.length; i++) {
    checkboxIds.push(checkboxes[i].value);

    // Aggiungi un evento di ascolto ai checkbox
    checkboxes[i].addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('formCheckbox').submit(); // Esempio di invio del modulo
            // Salva lo stato selezionato nel localStorage
            localStorage.setItem('checkbox_' + this.value, false);
            this.checked=false;
        }
    });
}
console.log(localStorage)
// Ripristina lo stato dei checkbox al caricamento della pagina
window.addEventListener('DOMContentLoaded', function() {
    for (var i = 0; i < checkboxIds.length; i++) {
        var stringa='checkbox_' + [i];
        var check= localStorage.getItem(stringa);
        console.log(stringa)
        if (check === 'false') {
            checkboxes[i].checked = true;
        }
    }
});

