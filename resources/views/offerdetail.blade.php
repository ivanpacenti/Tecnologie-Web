@section('title','Dettagli Offerta')

@extends('layouts.pageLayout')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >
<body>
    <div class="product-details">
        <div class="leftcontainer">
            <div class="product-detailsimg">
                <img src="{{asset($offerta->immagine)}}" class="img_detail">
            </div>
        </div>
        <div class="rightcontainer">
            <div class="id">
                <p> ID: {{ $offerta->id }}</p>
            </div>
            <div class="descrizione">
                <p> DESCRIZIONE: {{ $offerta->descrizione }}</p>
            </div>

            <div class="modalita">
                <p> MODALITA': {{ $offerta->modalità }}</p>
            </div>

            <div class="luogofruizione">
                <p> LUOGO DI FRUIZIONE: {{ $offerta->luogoFruizione }}</p>
            </div>
            <div class="scadenza">
                <div class="dataInizio">
                    <p> DATA INIZIO: {{ $offerta->dataInizio }}</p>
                </div>

                <div class="dataFine">
                    <p> DATA FINE: {{ $offerta->dataFine }}</p>
                </div>
            </div>
            @can('isUser')
                <button onclick="location.href='{{ route('stampa', ['coupon_id' => $offerta->id, 'user_id' => Auth::id()]) }}'" class="form-button">Acquista</button>
            @endcan
        </div>
    </div>

</body>

@endsection('content')
