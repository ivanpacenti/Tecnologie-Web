@extends('layouts.pageLayout')

@section('title','Catalogo')

@section('content')
    @csrf
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >
    <script src="{{asset('js/1rigeneraVista.js')}}" async></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

        $(document).ready(function() {
            $(".check").on('click', function() {
                // Ottieni l'ID dell'azienda selezionata

                var aziendaId = $(this).attr('id');

                // Verifica lo stato della checkbox
                var isChecked = $(this).prop('checked');

                var data={azienda_id: aziendaId}
                console.log(data)

                // Invia una richiesta AJAX solo se la checkbox è selezionata
                if (isChecked) {
                    // Invia una richiesta AJAX per ottenere le offerte filtrate
                    $.ajax({
                        url: '/laraProj5/public/filtroOfferte', // Sostituisci con l'URL corretto per il tuo endpoint di filtraggio
                        type: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            "X-CSRF-Token": document.querySelector('input[name=_token]').value
                        },
                        data: { data },
                        success: function(response) {

                            // Agungi un nuovo div per le offerte filtrate
                            $('.container').html(JSON.stringify(response));
                            var offerteFiltrateDiv = $('<div>').attr('id', 'offerte-filtrate');
                            offerteFiltrateDiv.html(response);

                            // Rimuovi il vecchio div delle offerte filtrate, se presente


                            // Aggiungi il nuovo div delle offerte filtrate al div principale
                            $('#div-offerte').append(offerteFiltrateDiv);
                        },
                        error: function(xhr) {
                            // Gestisci eventuali errori
                        }
                    });

                } else {
                    // Se la checkbox viene deselezionata, rimuovi il div delle offerte filtrate
                    $('#offerte-filtrate').remove();
                }
            });
        });
    </script>


    @isset($aziende)
        <form action="{{ route('filtroOfferte') }}" method="POST" id="formCheckbox">
            <!--  csfr passa il token della richiesta al controller-->
            @csrf
            <div class="checkboxprincipal">
                <div class="checktitle">Filtra per azienda</div>
                @foreach($aziende as $azienda)
                    <label class="containercheck">{{$azienda->nome}}
                        <input class ="check" type="checkbox" value="{{ $azienda->id }}" id="{{ $azienda->id }}" name="aziende_selezionate[]">
                        <span class="checkmark">
                    </span>
                    </label>
                @endforeach
                @endisset
            </div>
        </form>
        <div class="container">
            @isset($offerte)
            <div class="container2">
                @foreach($offerte as $offerta)
                <div class="containerCoupon" id="{{$aziende->find($offerta->emissione->azienda)->nome}}">
                    <div class="image">{{$aziende->find($offerta->emissione->azienda)->nome}}
                        <img src="{{ $offerta->immagine }}" alt="Imagine1" style="border-radius: 20px" width=90% height=90%>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            <div class="testocard">
                            <p>{{$offerta->descrizione}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <h1>supa di più<h1>
            @endisset
@endsection
