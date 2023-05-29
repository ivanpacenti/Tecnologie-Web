@section('title','Home | Agencies')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

    <div class="maincontainer">
        <h1>LE NOSTRE AZIENDE</h1>
        @isset($aziende)
            @foreach($aziende as $azienda)

                <div class="main-box-az"> {{--contenitore per ogni singola azienda--}}
                    <div class="imgslot"> {{--contenitore per l'immagine--}}
                        <img src="{{$azienda->logo}}" width=100% height=auto>
                    </div>
                    <div class="textslot"> {{--contenitore per il testo--}}
                        <h3>ID: {{$azienda->id}}</h3>
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
