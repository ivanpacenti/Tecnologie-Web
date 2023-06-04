@extends('layouts.pageLayout')

@section('title','Catalogo')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >

    @isset($aziende)

        <form action="{{ route('filtroOfferte') }}" method="POST">
            <div class="checkboxprincipal">
                <div class="checkboxprincipal">Filtra per azienda</div>
                @foreach($aziende as $azienda)
                    <label class="containercheck">{{$azienda->nome}}
                        <input class ="check" type="checkbox" id="{{$azienda->nome}}" name="aziende_selezionate[]">
                        <span class="checkmark">
                    </span>
                    </label>
                @endforeach
                <button type="submit">Filtra</button>
                @endisset
            </div>
        </form>
        <div class="container">
            @isset($offerte)
                <div class="container2">
                    @foreach($offerte as $offerta)
                        <div class="containerCoupon" id="{{$aziende->find($offerta->emissione->azienda)->nome}}">
                            <div class="image">
                                <img src="{{ $offerta->immagine }}" alt="Imagine1" style="border-radius: 20px" width=90% height=90%>
                            </div>
                        </div>
                    @endforeach
                    @endisset
@endsection('content')
