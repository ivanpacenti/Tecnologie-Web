@extends('layouts.pageLayout')

@section('title','PaginaStaff|CrudPromozioni')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

    <div class="maincontainer">
        <h1> PROMOZIONI</h1>
        <button class="buttonbar2">Aggiungi Promozioni</button>

        @isset($offerte)
                @foreach($offerte as $offerta)
               <div class="main-box-az">
                    <div class="imgslot">
                            <img src="{{ $offerta->immagine }}" alt="Imagine1" style="border-radius: 20px" width=auto height=40%>
                    </div>
                        <div class="description">
                                    <div class="testocard">
                                        <p>
                                            <a href="{{ route('offerdetail', ['id' => $offerta->id]) }}">Descrizione: {{$offerta->descrizione}}</a> <br>
                                            <a href="{{route('offerdetail',['id' => $offerta->id] )}}">Modalità: {{$offerta->modalità}}</a> <br>
                                            <a href="{{route('offerdetail',['id' => $offerta->id] )}}">Luogo di fruizione: {{$offerta->luogoFruizione}}</a> <br>
                                            <a href="{{route('offerdetail',['id' => $offerta->id] )}}"> Data Inizio: {{$offerta->dataInizio}}</a> <br>
                                            <a href="{{route('offerdetail',['id' => $offerta->id] )}}">Data Fine: {{$offerta->dataFine}}</a>
                                        </p>
                                        <div class="buttonslot">
                                             <a href="{{"ModificaOfferta"}}" class="buttonbar">Modifica </a>
                                            <a href="{{"EliminaOfferta/".$offerta['id']}}" class="buttonbar">
                                                Elimina</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        @endisset
    </div>    </div>
                        <div class="buttonslot">
                            <button class="buttonbar2">Crea Promozione</button>
                        </div>


                    </div>
@endsection



