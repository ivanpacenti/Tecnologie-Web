@extends('layouts.pageLayout')

@section('title','Home')

@section('content')
    <h1> benvenuto    {{ Auth::user()->name }}  {{ Auth::user()->surname }} </h1>
    <h3> Ci dispiace informarla che ha già acquistato questa offerta</h3>

    <h3> Siamo sicuri ne troverà altre di suo gradimento, continui pure su catalogo</h3>

@endsection
