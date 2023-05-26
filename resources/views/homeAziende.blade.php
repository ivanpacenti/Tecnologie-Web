@section('title','Aziende')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

    <div class="maincontainer">
        <h1>ECCO TUTTE LE AZINDE DEL NOSTRO SITO</h1>
        @isset($aziende)
            @foreach($aziende as $azienda)

                <div class="main-box-az"> {{--contenitore per ogni singola azienda--}}
                    <div class="imgslot"> {{--contenitore per l'immagine--}}
                        <img src="{{$azienda->logo}}" width=100% height=auto>
                    </div>
                    <div class="textslot"> {{--contenitore per il testo--}}
                        <h3>Partita Iva: {{$azienda->partitaIva}}</h3>
                        <h2>Nome: {{$azienda->nome}}</h2>
                        <h3>  Tipologia: {{$azienda->tipologia}}</h3>
                        <h3>Posizione: {{$azienda->posizione}}</h3>
                        <h4>Descrizione: {{$azienda->descrizione}}</h4>
                    </div>
                </div>

            @endforeach
        @else
            <h1>Non ci sono aziende </h1>
        @endisset()
    </div>
@endsection('content')
