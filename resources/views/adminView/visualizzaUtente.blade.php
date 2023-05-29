{{--eliminazione utenti di livello 1--}}
@extends('layouts.pageLayout')

@section('title','Admin | Users')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
    <div class="maincontainer">
        <h1>Di seguito ci sono tutti gli utenti registrati</h1>
        @isset($Users)
            @foreach($Users as $User)
                @if(str_contains($User->role, 'user'))
                    <div class="main-box"> {{--contenitore per ogni singolo utente--}}
                        <h2> Utente numero: {{$User->id}} </h2>
                        <div class="buttons-container">
                            <a href="{{"deleteUser/".$User['id']}}" class="buttonbar">Elimina</a>
                            <a href="{{"CouponUtente".$User['id']}}" class="buttonbar">Coupon acquistati</a>
                        </div>
                        <div class="upper-box">
                            <h2>nome utente:</h2>
                            <h4>{{$User->name}}</h4>
                        </div>
                        <div class="inner-box">
                            <h2>cognome utente:</h2>
                            <h4>{{$User->surname}}</h4>
                        </div>
                        <div class="inner-box">
                            <h2>Username Utente:</h2>
                            <h4>{{$User->username}}</h4>
                        </div>
                    </div>
                @endif

            @endforeach
        @endisset()

    </div>
@endsection('content')
