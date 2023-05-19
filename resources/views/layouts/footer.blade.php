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

<body>
            <div>
                <div class="faqs">
                    <div class="container-faqs">
                        <h1>FAQ'S</h1>
                        <p> Visualizza qui le domande più frequenti:</p>
                        <a href="{{route("faqsCreate")}}" class="addOtherF"> Visualizza altro</a>

                          @isset($faqs)
                               @foreach($faqs as $faq)
                                   @if(!empty($faq->domanda))
                                   <div class="main-box"> {{--contenitore per ogni singola faq--}}
                                       <h2> FAQ numero: {{$faq->id}} </h2>

                                       <div class="upper-box">
                                           <h2>Domanda:</h2>
                                           <h4>{{$faq->domanda}}</h4>
                                       </div>
                                       <div class="inner-box">
                                           <h2>Risposta:</h2>
                                           <h4>{{$faq->risposta}}</h4>

                                       </div>
                                   </div>


                                    @endif
                                @endforeach
                                    @else

                                    @endisset()

                        <!-- Aggiunge elementi alla lista -->
                     <!--   <script>
                        var counter = n;
                        function addListItem() {
                        var ul = document.getElementById('faq-list1');
                        var li = document.createElement('li');
                        li.appendChild(document.createTextNode('Voce ' + counter));
                        ul.appendChild(li);
                        counter++;
                        }

                        //bottone per visualizzare altre faqs
                        <button class="addOtherF">Visualizza altro</button>

                        /*<form method="post" action="">
                            <button type="submit" name="addOtherF">Visualizza altro</button>
                                </form>*/

                        // Aggiungi un gestore di eventi al pulsante "Visualizza altro"
                        var addButton = document.getElementById('addOtherF');
                        addButton.addEventListener('click', addListItem);
                        </script> -->


                           <!-- <h1>Non ci sono Faq </h1>
                            <button class="Aggiungi">Aggiungine una Faq</button> -->



                    </div>
                </div>
            </div>
</body>
    </footer>
</html>


