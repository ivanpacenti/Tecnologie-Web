{{--parte di crud per le aziende riservata all'amministratore--}}

@section('title','PaginaAdmin')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
    <h1> sezione CRUD delle aziende</h1>
    <h4> Parte riservata all'amministratore</h4>
    <div class="contenitore">
        qui ci sarà una form
        <div class="logo"> qui ci va il logo della azienda</div>
        <div class="logo"> qui ci va il logo della azienda</div>
        <div class="logo"> qui ci va il logo della azienda</div>
        <div class="logo"> qui ci va il logo della azienda</div>
        <div class="logo"> qui ci va il logo della azienda</div>
    </div>

@endsection('content')
