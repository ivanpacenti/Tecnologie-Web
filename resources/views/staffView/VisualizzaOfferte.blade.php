@extends('layouts.pageLayout')

@section('title','Staff | Offers')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

    <div class="maincontainer">
        <h1>Offerte</h1>
        <a href="{{route("CreaOfferta")}}" class="buttonbar-add"> Aggiungi un'offerta</a>

        @isset($offerte)
            @foreach($offerte as $offerta)
                <div class="main-box-az">
                    <div class="imgslot">
                        <img src="{{ $offerta->immagine }}" alt="Imagine1" style="border-radius: 20px" width=auto height=40%>
                    </div>
                    <div class="description">
                        <div class="textslot">
                            <h3>ID: {{$offerta->id}}</h3>
                            <p>Descrizione: {{$offerta->descrizione}}</p>
                            <p>Modalità: {{$offerta->modalità}}</p>
                            <p>Luogo di fruizione: {{$offerta->luogoFruizione}}</p>
                            <p> Data Inizio: {{$offerta->dataInizio}}</p>
                            <p>Data Fine: {{$offerta->dataFine}}</p>
                        </div>
                    </div>
                    <div class="buttonslot">
                        <a href="{{"ModificaOfferta/".$offerta['id']}}" class="buttonbar2">Modifica </a>
                        <a href="{{"EliminaOfferta/".$offerta['id']}}" class="buttonbar2">Elimina</a>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>

@endsection



