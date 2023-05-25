
@section('title','PaginaAdmin')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
    <div class="maincontainer">
        <h1>Scegli quale statistica vuoi visualizzare:</h1>
        <a href="{{route('NumeroCoupon')}}" class="buttonbarstats">numero totale di coupon emessi</a>
        <a href="{{route('VisualizzaOfferte')}}"class="buttonbarstats">coupon emessi per ogni azienda</a>
        <a href="{{route("visualizzaUtente")}}" class="buttonbarstats">coupon acquistati per utente</a>
    </div>
@endsection