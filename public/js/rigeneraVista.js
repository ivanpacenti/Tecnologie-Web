var checkbox = document.querySelectorAll('#check');
var ids = [];

if(sessionStorage.getItem('firstSession')==null)
{

    sessionStorage.setItem('firstSession',true);
    // Memorizza gli ID dei checkbox selezionati
    for (var i = 0; i < checkbox.length; i++) {
        ids.push(checkbox[i].value);
    }
        for (var i = 0; i < ids.length; i++) {
            if (sessionStorage.getItem(ids[i].toString()) == null) sessionStorage.setItem(ids[i].toString(), false);
        }

}
console.log(sessionStorage);
function checkClick()
{
    var cb=document.getElementById('formCheckbox');
    var asd=document.querySelector('.check:checked');
    sessionStorage.setItem(asd.value.toString(), true);


    cb.submit(); // Esempio di invio del modulo
    sessionStorage.setItem('firstSession',false);

}
window.onload = onPageLoad();

function onPageLoad() {
    var a=document.querySelectorAll('#check');
    for (var i = 0; i < a.length; i++) {
        var check= sessionStorage.getItem([i].toString());
        if (check ==true) {
            a[i].checked=true;
        }
        console.log(check)
    }
}


