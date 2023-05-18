// Aggiungi un evento di ascolto ai checkbox
var checkboxes = document.querySelectorAll('.check');
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', handleCheckboxChange);
});

// Funzione per gestire il cambio di stato dei checkbox
function handleCheckboxChange() {
    var checkboxId = this.id;

    // Seleziona tutti i div filtrabili
    var divsFiltrabili = document.querySelectorAll('.containerCoupon');

    // Itera sui div filtrabili e controlla se devono essere mostrati o nascosti
    divsFiltrabili.forEach(function(div) {
        // Controlla se il checkbox corrispondente è selezionato
        var checkbox = document.getElementById(checkboxId);
        var divId = div.id;
        if (checkbox.checked && checkboxId === divId) {
            // Mostra il div se il checkbox è selezionato e il suo id corrisponde al divId
            div.style.display = 'block';
        } else {
            // Nascondi il div se il checkbox non è selezionato o il suo id non corrisponde al divId
            div.style.display = 'none';
        }
    });
}
