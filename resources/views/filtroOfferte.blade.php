@extends('layouts.pageLayout')

@section('title','Catalogo')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @isset($aziende)

        <form action="{{ route('filtroOfferte') }}" method="POST">
            <div class="checkboxprincipal">
                <div class="checkboxprincipal">Filtra per azienda</div>
                @foreach($aziende as $azienda)
                    <label class="containercheck">{{$azienda->nome}}
                        <input class ="check" type="checkbox" id="{{$azienda->nome}}" name="aziende_selezionate[]">
                        <span class="checkmark">
                    </span>
                    </label>
                @endforeach
                <button type="submit">Filtra</button>
                @endisset
            </div>
        </form>
        <div class="container">
            @isset($offerte)
                <div class="container2">
                    @foreach($offerte as $offerta)
                        <div class="containerCoupon" id="{{$aziende->find($offerta->emissione->azienda)->nome}}">
                            <div class="image">
                                <img src="{{ $offerta->immagine }}" alt="Imagine1" style="border-radius: 20px" width=90% height=90%>
                                <?php
                                    $id_azienda_filtrata=$aziende->find($offerta->emissione->azienda)->nome;
                                    ?>
                            </div>
                        </div>
                    @endforeach
                    @endisset
                        <script>
                            function abilitaCheckboxDaArray(numeri) {
                                numeri.forEach(function(numero) {
                                    //abilita le checkbox in base alle aziende per cui lo staff è abilitato
                                    var checkbox = $('#' + numero);
                                    checkbox.prop('checked', true);
                                });
                            }

                            // funzione da eseguire quando la apgina è pronta
                            $(document).ready(function() {
                                // prende l'array di numeri dal PHP e lo converte in JavaScript

                                abilitaCheckboxDaArray({{$id_azienda_filtrata}});
                            });
                        </script>
@endsection('content')
