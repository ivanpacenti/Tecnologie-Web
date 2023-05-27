@extends('layouts.pageLayout')

@section('title','Ricerca')

@section('content')
    @csrf
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ricercaDesign.css') }}" >
    <div class="container">
            @isset($risultati)
                <div class="container2">
                    @if(count($risultati)===0) //anche se la ricerca non dà risultati, l'array esiste.
                                                //quindi per stampare il messaggio controllo che dentro sia vuoto
                    <p style="font-size: 1.8rem;">Spiacenti, la ricerca non ha prodotto alcun risultato.</p>
                    @endif
                    @foreach($risultati as $risultati)
                            <div class="product-card" >
                                <div class="image-container">
                                    @isset($risultati->logo)
                                    <img src="{{$risultati->logo}}" alt="Immagine prodotto">
                                    @endif
                                    @isset($risultati->immagine)
                                        <img src="{{$risultati->immagine}}" alt="Immagine prodotto">
                                            @auth
                                        <span class="discount">-30%</span>
                                    @endauth
                                        @endif
                                </div>
                                <div class="description">
                                    @isset($risultati->nome)
                                    <p>{{$risultati->nome}}</p>
                                    @endisset
                                    @isset($risultati->descrizione)
                                    <p>{{$risultati->descrizione}}</p>
                                    @endisset
                                </div>
                            </div>
                    @endforeach
                </div>
            @endisset

        </div>
        @endsection
