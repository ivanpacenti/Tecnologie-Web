@extends('layouts.adminLayout')

@section('title','Profile Page')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile_design.css') }}" >
<!-- questo container contiene tutti i campi presenti nel pannello ed è di tipo felx in modo tale da organizzare meglio le cose
     * 'containerfield' è un altro container che contiene le informazioni che vengono estratti dal database
     * 'imagecontainer' contiene l'immagine di default per il profilo utente
     * 'edit' è un button che collega ad una pannlelo per la modifica dei dati personali (da implementare)-->
<div class="container1">
    <div class="titolo">
        Benvenuto nel tuo profilo!
    </div>
    <div class="imagecontainer">
        <img src="img/shop.jpg" alt="immagine coupon" style="border-radius: 50%;" width=150px height=150px>
    </div>
    <div class="containerfield">
        nome
    </div>
    <div class="containerfield">
        cognome
    </div>
    <div class="containerfield">
        email
    </div>
    <div class="containerfield">
        password
    </div>
    <div class="containerfield">
        nome
    </div>
    <div class="containerfield">
        nome
    </div>
    <div class="containerfield">
        nome
    </div>

    <button class="edit">Modifica dati personali</button>
</div>

@endsection('content')
