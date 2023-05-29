{{--visualizza tutti i coupon e vedi quanti ne soono stati emessi per ognuno--}}
{{-- pagina admin--}}
@section('title','Admin | Offers')

@extends('layouts.pageLayout')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

    <div class="maincontainer">
        <h1> Elenco delle offerte!</h1>
        <h3> Clicca sul link corrispondente per sapere quanti coupon sono stati emessi per ogni offerta</h3>
        @isset($offerte)
            @foreach($offerte as $offerta)
                <div class="main-box-az"> {{--contenitore per ogni singola azienda--}}
                    <div class="imgslot"> {{--contenitore per l'immagine--}}
                        <img src="{{$offerta->immagine}}" width=100% height=auto>
                    </div>
                    <div class="textslot"> {{--contenitore per il testo--}}
                        <h3>ID: {{$offerta->id}}</h3>
                        <p>Modalità: {{$offerta->modalità}}</p>
                        <p>Scadenza: {{$offerta->dataFine}}</p>
                        <p>Luogo di fruizione: {{$offerta->luogoFruizione}}</p>
                        <p>Descrizione: {{$offerta->descrizione}}</p>
                        <p><a href="{{ route('CouponOfferta', ['id' => $offerta->id]) }}", class="coloredlink">Coupon emessi</a></p>
                    </div>
                </div>
            @endforeach
        @else
            <h1>Siamo spiacenti, non ci sono offerte!</h1>
        @endisset()
    </div>
@endsection('content')
