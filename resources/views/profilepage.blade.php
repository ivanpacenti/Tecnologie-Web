@extends('layouts.adminLayout')

@section('title','Profile Page')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile_design.css') }}" >
<div class="container1">
    <h1>Dettagli utente</h1>
    <!-- <p>Nome: {{ $utente->nome }}</p>
    <p>Email: {{ $utente->email }}</p> -->
    <div class="containerfield">
        nome
    </div>
</div>

@endsection('content')