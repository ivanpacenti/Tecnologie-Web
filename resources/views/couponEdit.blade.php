@extends('layouts.pageLayout')

@section('title','PaginaStaff|CrudPromozioni')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_design.css') }}" >

    <div class="maincontainer">
        <h1> CRUD PROMOZIONI</h1>
<button class="buttonbar"> Aggiungi Promozione</button>
    </div>
    <div class="main-box-az">
        <h2>Modifica Promozioni</h2>
    </div>
    <div class="container1">
@isset($offerte)
    <form action="{{ route('filtroOfferte') }}" method="POST" id="formCheckbox">
        <!--  csfr passa il token della richiesta al controller-->
        @csrf
         <div class="checkboxprincipal">
             <!-- aggiungere filtro? -->
           <!-- <div class="checktitle">Filtra per azienda</div>
            @foreach($aziende as $azienda)
                <label class="containercheck">{{$azienda->nome}}
                    <input class ="check" type="checkbox" value="{{ $azienda->id }}" id="{{ $azienda->id }}" name="aziende_selezionate[]" onclick="checkClick()">
                    <span class="checkmark">
                    </span>
                </label>
            @endforeach-->
            @endisset
        </div>
    </form>
    </div>
    <div class="container">
        @isset($offerte)
           <div class="container2">
                @foreach($offerte as $offerta)
                        <div class="imgslot">{{$aziende->find($offerta->emissione->azienda)->nome}}
                            <div class="main-box-az" id="{{$aziende->find($offerta->emissione->azienda)->nome}}">
                            <img src="{{ $offerta->immagine }}" alt="Imagine1" style="border-radius: 20px" width=10% height=10%>
                        </div>
                        <div class="textslot">
                            <div class="description">
                                <div class="testocard">
                                    <p>
                                        <a href="{{ route('offerdetail', ['id' => $offerta->id]) }}">{{$offerta->descrizione}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="buttonslot">
                        <button class="buttonbar2">Modifica Promozione</button>
                            <button class="buttonbar2">Elimina Promozione</button>
                    </div>

                @endforeach
                @else
@endisset
<div class="buttonslot">
     <button class="buttonbar2">Crea Promozione</div>
           </div>
@endsection







