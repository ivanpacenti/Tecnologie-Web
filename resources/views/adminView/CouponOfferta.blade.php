@section('title','PaginaAdminOfferte')

@extends('layouts.pageLayout')
{{--dobbiamo pensare come gestire le faq che sono vuote--}}
@section('content')
    <h1>  IL TOTALE DELLE OFFERTE EMESSE IL COUPON SELEZIONATO E'{{$numTotCoupon}}</h1>
    <div class="textslot"> {{--contenitore per il testo--}}
        <h3>ID: {{$offerta->id}}</h3>
        <p>modalità: {{$offerta->modalità}},</p>
        <p> datafine: {{$offerta->dataFine}}</p>
        <p>luogo fruizione: {{$offerta->luogoFruizione}}</p>
        <p>Descrizione: {{$offerta->descrizione}}</p>
@endsection
