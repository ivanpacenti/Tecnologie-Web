@section('title','Dettagli Offerta')

@extends('layouts.pageLayout')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/home_pub_design.css') }}" >
<body>
    <div class="product-details">
        <div class="leftcontainer">
            <div class="product-detailsimg">
                <img src="{{ $offerta->immagine }}"  style="border-radius: 15px">
            </div>
        </div>
        <div class="rightcontainer">
            <div class="descrizione">
                <h3> DESCRIZIONE: {{ $offerta->descrizione }}</h3>
            </div>

            <div class="modalita">
                <h3> MODALITA':   {{ $offerta->modalità }}</h3>
            </div>

{{--            <div class="id">--}}
{{--                {{ $offerta->id }}--}}
{{--            </div>--}}

            <div class="luogofruizione">
                <h3> LUOGO DI FRUIZIONE:  {{ $offerta->luogoFruizione }}</h3>
            </div>

            <div class="dataInizio">
                <h3> DATA INIZIO:  {{ $offerta->dataInizio }}</h3>
            </div>

            <div class="dataFine">

                <h3> DATA FINE:{{ $offerta->dataFine }}</h3>
            </div>
        </div>
    </div>
</body>
@endsection('content')
