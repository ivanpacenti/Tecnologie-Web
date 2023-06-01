{{--questa è la pagina di stampa--}}
@extends('layouts.pageLayout')

@section('title','Home')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >
    <div class="coupon-informations">
        <div class="info-slot">
            <h2>Dettagli del Coupon</h2>
            <p>ID univoco: {{ $stringa }}</p>
            {{--<p>ID del coupon: {{ $offertaa->id }}</p>--}}
            <p>Data di inizio: {{ $offertaa->dataInizio }}</p>
            <p>Data di fine: {{ $offertaa->dataFine }}</p>
            <p>Descrizione: {{ $offertaa->descrizione }}</p>
            <p>Luogo di fruizione: {{ $offertaa->luogoFruizione }}</p>
            <p>Azienda: {{ $azienda->nome }}</p>
        </div>
        <div class="info-slot">
            <h2>Dettagli dell'utente</h2>
            <p> {{ Auth::user()->name }}</p>
            <p>{{ Auth::user()->surname }}</p>
            <p>{{ Auth::user()->email }}</p>
            <p>{{ Auth::user()->telefono }}</p>
        </div>
        <button onclick="location.href='{{ route('catalogo') }}'" class="form-button">Torna al catalogo</button>
    </div>

@endsection
