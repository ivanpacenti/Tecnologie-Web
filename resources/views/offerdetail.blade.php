@section('title','Dettagli Offerta')

@extends('layouts.public')

@section('content')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >--}}
    <div class="product-details">
        <div class="descrizione">
            {{ $offerta->descrizione }}
        </div>

        <div class="modalita">
            {{ $offerta->modalità }}
        </div>

        <div class="immagine">
            {{ $offerta->immagine }}
        </div>

        <div class="id">
            {{ $offerta->id }}
        </div>

        <div class="luogofruizione">
            {{ $offerta->luogoFruizione }}
        </div>

        <div class="dataInizio">
            {{ $offerta->dataInizio }}
        </div>

        <div class="dataFine">
            {{ $offerta->dataFine }}
        </div>
    </div>
@endsection('content')
