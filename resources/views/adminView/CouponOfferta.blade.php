@section('title','PaginaAdminOfferte')

@extends('layouts.pageLayout')
{{--dobbiamo pensare come gestire le faq che sono vuote--}}
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
    <div class="maincontainer">
        <h1>Il totale di coupon emessi per questa offerta è: {{$numTotCoupon}}</h1>
        <div class="upper-box"> {{--contenitore per il testo--}}
            <h3>ID: {{$offerta->id}}</h3>
            <p>Modalità: {{$offerta->modalità}},</p>
            <p>Scadenza: {{$offerta->dataFine}}</p>
            <p>Luogo di fruizione: {{$offerta->luogoFruizione}}</p>
            <p>Descrizione: {{$offerta->descrizione}}</p>
        </div>
        <a href="{{route('statistiche')}}" class="buttonbarstats">torna indietro</a>
    </div>
@endsection
