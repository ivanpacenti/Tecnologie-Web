@extends('layouts.pageLayout')

@section('title','Ricerca')

@section('content')
    @csrf
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ricercaDesign.css') }}" >
    <div class="container">
            @isset($offerte)
                <div class="container2">
                    @foreach($offerte as $offerta)
                            <div class="product-card" >
                                <div class="image-container">
                                    <img src="{{asset('img/lacoste_logo.jpeg')}}" alt="Immagine prodotto">
                                    @auth
                                        <span class="discount">-30%</span>
                                    @endauth
                                </div>
                                <div class="description">
                                    <p>{{$offerta->descrizione}}</p>
                                </div>
                                <a href="{{ route('offerdetail', ['id' => $offerta->id]) }}" class="btn">Visualizza</a>
                            </div>

                    @endforeach
                </div>
            @endisset
                @isset($aziende)
                    <div class="container2">
                        @foreach($aziende as $azienda)
                            <div class="product-card" >
                                <div class="image-container">
                                    <img src="{{asset('img/Nike_logo.png')}}" alt="Immagine azienda">
                                    @auth
                                        <span class="discount">-30%</span>
                                    @endauth
                                </div>
                                <div class="description">
                                    <p>{{$azienda->nome}}</p>
                                </div>
                                <a href="{{ route('offerdetail', ['id' => $offerta->id]) }}" class="btn">Visualizza</a>
                            </div>

                        @endforeach
                    </div>
                @endisset

        </div>
        @endsection
