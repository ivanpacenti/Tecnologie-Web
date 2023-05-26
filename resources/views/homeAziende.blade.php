@section('title','Aziende')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

    <div class="maincontainer">
        <h1>ECCO TUTTE LE AZINDE DEL NOSTRO SITO</h1>

        <a href="{{asset('agencycreate')}}" class="buttonbar-add">Aggiungi un' azienda</a>
        @isset($aziende)
            @foreach($aziende as $azienda)

                <div class="main-box-az"> {{--contenitore per ogni singola azienda--}}
                    <div class="imgslot"> {{--contenitore per l'immagine--}}
                        <img src="{{$azienda->logo}}" width=100% height=auto>
                    </div>
                    <div class="textslot"> {{--contenitore per il testo--}}
                        <p>Partita Iva: {{$azienda->partitaIva}}</p>
                        <p>Nome: {{$azienda->nome}}, Tipologia: {{$azienda->tipologia}}</p>
                        <p>Posizione: {{$azienda->posizione}}</p>
                        <p>Descrizione: {{$azienda->descrizione}}</p>
                    </div>
                </div>

            @endforeach
        @else
            <h1>Non ci sono aziende </h1>
        @endisset()
    </div>
@endsection('content')
