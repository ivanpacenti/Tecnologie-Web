
@section('title','Admin | Stats')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
    <div class="maincontainer">
        <h1>Scegli quale statistica vuoi visualizzare:</h1>
        <a href="{{route('NumeroCoupon')}}" class="buttonbarstats">numero totale di coupon emessi</a>
        <a href="{{route('VisualizzaOfferteS')}}"class="buttonbarstats">coupon emessi per ogni offerta</a>
        <a href="{{route("visualizzaUtente")}}" class="buttonbarstats">coupon emessi per utente</a>
    </div>
@endsection
