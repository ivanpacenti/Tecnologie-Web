@section('title','Dettagli Offerta')

@extends('layouts.public')

@section('content')

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
