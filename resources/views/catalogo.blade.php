@extends('layouts.pageLayout')

@section('title','Catalogo')

@section('content')
    @csrf
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >
    <script src="{{asset('js/rigeneraVista.js')}}" async></script>

    @isset($aziende)
        <form action="{{ route('filtroOfferte') }}" method="GET" id="formCheckbox">
            <!--  csfr passa il token della richiesta al controller-->
            @csrf
            <div class="checkboxprincipal">
                <div class="checktitle">Filtra per azienda</div>
                @foreach($aziende as $azienda)
                    <label class="containercheck">{{$azienda->nome}}
                        <input class ="check" type="checkbox" value="{{ $azienda->id }}" id="{{ $azienda->id }}" name="aziende_selezionate[]" onclick="checkClick()">
                        <span class="checkmark">
                    </span>
                    </label>
                @endforeach
                @endisset
            </div>
        </form>
        <div class="container">
            @isset($offerte)
            <div class="container2">
                @foreach($offerte as $offerta)
                <div class="product-card" id="{{$aziende->find($offerta->emissione->azienda)->nome}}">
                    <div class="image-container">
                        <img src="{{asset('img/lacoste_logo.jpeg')}}" alt="Immagine prodotto">
                        @auth
                        <span class="discount">-30%</span>
                        @endauth
                    </div>
                    <div class="description">
                        <p>{{$offerta->descrizione}}</p>
                    </div>
                    <a href="{{ route('offerdetail', ['id' => $offerta->id]) }}" class="btn">Visualizza</a>
                </div>

                @endforeach
            {{--@else
            <h1>Ci dispiace non ci sono offerte al momento<h1>--}}
            </div>
            @endisset
                @if(sizeof($offerte)>1)
                    @include('Pagination.paginator', ['paginator' => $offerte])
                @endif
        </div>




@endsection
