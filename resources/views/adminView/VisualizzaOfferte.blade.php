{{--visualizza tutti i coupon e vedi quanti ne soono stati emessi per ognuno--}}
{{-- pagina admin--}}
@section('title','PaginaAdminOfferte')

@extends('layouts.pageLayout')
{{--dobbiamo pensare come gestire le faq che sono vuote--}}
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
    <h1> elenco delle offerte!</h1>
    <h4> premi sul bottone corrispondente per sapere quanti coupon sono stati emessi per ogni offerta</h4>
    <div class="maincontainer">
        @isset($offerte)
            @foreach($offerte as $offerta)
                <div class="main-box-az"> {{--contenitore per ogni singola azienda--}}
                    <div class="imgslot"> {{--contenitore per l'immagine--}}
                        <img src="{{$offerta->immagine}}" width=100% height=auto>
                    </div>
                    <div class="textslot"> {{--contenitore per il testo--}}
                        <h3>ID: {{$offerta->id}}</h3>
                        <p>modalità: {{$offerta->modalità}},</p>
                        <p> datafine: {{$offerta->dataFine}}</p>
                        <p>luogo fruizione: {{$offerta->luogoFruizione}}</p>
                        <p>Descrizione: {{$offerta->descrizione}}</p>
{{--                        <p>--}}
{{--                        <a href="{{ route('couponOfferta', ['offertaId' => $offerta->id]) }}">Coupon emessi</a>--}}
{{--                        </p>--}}
                    </div>
                </div>
            @endforeach
        @else
            <h1>NON CI SONO OFFERTE </h1>
        @endisset()
    </div>
@endsection('content')
