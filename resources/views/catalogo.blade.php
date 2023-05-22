@extends('layouts.pageLayout')

@section('title','Catalogo')

@section('content')
    @csrf
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >
    <script src="{{asset('js/rigeneraVista.js')}}" async></script>



    @isset($aziende)
        <form action="{{ route('filtroOfferte') }}" method="POST" id="formCheckbox">
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
                <div class="containerCoupon" id="{{$aziende->find($offerta->emissione->azienda)->nome}}">
                    <div class="image">{{$aziende->find($offerta->emissione->azienda)->nome}}
                        <img src="{{ $offerta->immagine }}" alt="Imagine1" style="border-radius: 20px" width=90% height=90%>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            <div class="testocard">
                            <p>
                                <a href="{{ route('offerdetail', ['id' => $offerta->id]) }}">{{$offerta->descrizione}}</a>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <h1>Ci dispiace non ci sono offerte al momento<h1>

            @endisset
@endsection
