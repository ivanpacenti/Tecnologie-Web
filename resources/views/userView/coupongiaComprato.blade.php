@extends('layouts.pageLayout')

@section('title','Home')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >
    <div class="coupon-informations">
        <h1> Si è verificato un errore... </h1>
        <h3> {{ Auth::user()->name }}  {{ Auth::user()->surname }} ci dispiace informarla che ha già acquistato questa offerta</h3>
        <h3> Siamo sicuri ne troverà altre di suo gradimento, continui pure su catalogo</h3>
        <button onclick="location.href='{{ route('catalogo') }}'" class="form-button">Torna al catalogo</button>
    </div>
@endsection
