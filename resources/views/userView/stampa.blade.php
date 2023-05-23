{{--questa è la pagina di stampa--}}
@extends('layouts.pageLayout')

@section('title','Home')

@section('content')
    <h2>Campi del coupon</h2>
    <p>ID univoco: {{ $stringa }}</p>
    <p>ID del coupon: {{ $offertaa->id }}</p>
    <p>Data di inizio: {{ $offertaa->dataInizio }}</p>
    <p>Data di fine: {{ $offertaa->dataFine }}</p>
    <p>Descrizione: {{ $offertaa->descrizione }}</p>
    <h2>Campi dell'utente</h2>
    <p> {{ Auth::user()->name }}</p>
    <p>{{ Auth::user()->surname }}</p>
    <p>{{ Auth::user()->email }}</p>
    <p>{{ Auth::user()->telefono }}</p>


@endsection
