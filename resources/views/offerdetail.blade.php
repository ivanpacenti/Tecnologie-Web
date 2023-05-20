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
                {{ $offerta->descrizione }}
            </div>

            <div class="modalita">
                {{ $offerta->modalità }}
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
    </div>
</body>
@endsection('content')
