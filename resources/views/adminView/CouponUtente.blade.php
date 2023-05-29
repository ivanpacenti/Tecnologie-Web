{{--Coupon per ciascun utente--}}

@extends('layouts.pageLayout')

@section('title','Admin | Stats Coupon User')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
    <div class="maincontainer">
        <h1>Il totale dei coupon acquistati è: {{$numTot}}</h1>
        <div class="upper-box"> {{--contenitore per il testo--}}
            <h3>ID: {{$user->id}}</h3>
            <p>Nome: {{$user->name}},</p>
            <p>Cognome: {{$user->surname}}</p>
            <p>Username: {{$user->username}}</p>
            <p>Telefono: {{$user->telefono}}</p>
        </div>
        <a href="{{route('statistiche')}}" class="buttonbarstats">torna indietro</a>
    </div>
@endsection

