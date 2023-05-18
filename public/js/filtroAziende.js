// Aggiungi un evento di ascolto ai checkbox
var checkboxes = document.querySelectorAll('.check');

checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', handleCheckboxChange);

});




// Funzione per gestire il cambio di stato dei checkbox
function handleCheckboxChange() {
    var checkboxId = this.id;
    var isChecked = this.checked;

    // Seleziona tutti i div filtrabili
    var divsFiltrabili = document.querySelectorAll('.containerCoupon');

    // Verifica se almeno un checkbox è selezionato
    var isAnyCheckboxChecked = Array.from(checkboxes).some(function(checkbox) {
        return checkbox.checked;
    });

    // Se nessun checkbox è selezionato, mostra tutti i div
    if (!isAnyCheckboxChecked) {
        divsFiltrabili.forEach(function(div) {
            div.style.display = 'block';
        });
        return;
    }

    // Itera sui div filtrabili e controlla se devono essere mostrati o nascosti
    divsFiltrabili.forEach(function(div) {
        var divId = div.id;

        if (isChecked && checkboxId === divId) {
            // Mostra il div se il checkbox è selezionato e il suo id corrisponde al divId
            div.style.display = 'block';
        } else {
            // Nascondi il div se il checkbox non è selezionato o il suo id non corrisponde al divId
            div.style.display = 'none';
        }
    });

}
