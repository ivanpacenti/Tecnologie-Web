<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
    <head>
        <script src="js/scriptHome.js" async></script>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/footer_design.css') }}" >
    </head>

    <br>
        <div class="footercontainer1">
            <div class="section">
                CHI SIAMO
            </div>

            <div class="section">
                DOVE SIAMO
            </div>

            <div class="section">
                CONTATTACI
            </div>
            </div>

            <div>
                <div class="faqs">
                    <div class="container-faqs">
                        <h2 class="h2"> FAQ'S </h2>
                        <p> Visualizza qui le domande più frequenti:</p>
                        <ul class="faq-list1">
                            <il>1.</il>
                                <div>
                                    domanda 1
                                </div>
                            <il>2.</il>
                                <div>
                                    DOMANDA 2
                                </div>
                            <il>3.</il>
                                <div>
                                    domanda treee
                                </div>
                        </ul>

                        <!-- Aggiunge elementi alla lista -->
                        <script>
                        var counter = n;
                        function addListItem() {
                        var ul = document.getElementById('faq-list1');
                        var li = document.createElement('li');
                        li.appendChild(document.createTextNode('Voce ' + counter));
                        ul.appendChild(li);
                        counter++;
                        }
                        //bottone per visualizzare altre faqs
                        <button id="addOtherF">Visualizza altro</button>

                        // Aggiungi un gestore di eventi al pulsante "Visualizza altro"
                        var addButton = document.getElementById('addOtherF');
                        addButton.addEventListener('click', addListItem);
                        </script>
                       </div>
                </div>
            </div>
    </footer>
</html>

<
