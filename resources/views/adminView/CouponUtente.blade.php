{{--Coupon per ciascun utente--}}

@extends('layouts.pageLayout')

@section('title','eliminazione utenti')

@section('content')
    <h1>  IL TOTALE DEI COUPON EMESSI  E'{{$numTot}}</h1>
    <div class="textslot"> {{--contenitore per il testo--}}
        <h3>ID: {{$user->id}}</h3>
        <p>nome: {{$user->name}},</p>
        <p> cognome: {{$user->surname}}</p>
        <p> username: {{$user->username}}</p>
        <p> telefono: {{$user->telefono}}</p>
@endsection

