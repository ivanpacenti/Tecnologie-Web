var checkboxes = document.querySelectorAll('.check');
var checkboxIds = [];
if(false)
// Memorizza gli ID dei checkbox selezionati
for (var i = 0; i < checkboxes.length; i++) {
    checkboxIds.push(checkboxes[i].value);

    // Aggiungi un evento di ascolto ai checkbox

}
for (var i = 0; i < checkboxIds.length; i++) {
    var stringa='checkbox_' + [i];
    var check= localStorage.getItem(stringa);


}
function checkClick()
{
    localStorage.setItem('checkbox_' + this.value, true);

    document.getElementById('formCheckbox').submit(); // Esempio di invio del modulo


}
console.log(localStorage)
// Ripristina lo stato dei checkbox al caricamento della pagina
window.addEventListener('DOMContentLoaded', function() {
    for (var i = 0; i < checkboxIds.length; i++) {
        var stringa='checkbox_' + [i];
        var check= localStorage.getItem(stringa);

        if (check === 'true') {
            checkboxes[i].checked=true;
        }
    }
});

