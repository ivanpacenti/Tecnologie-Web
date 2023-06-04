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
                        <h2> ID Utente: {{$User->id}} </h2>
                        <div class="upper-box">
                            <p><b>Nome:</b> {{$User->name}}</p>
                            <p><b>Cognome:</b> {{$User->surname}}</p>
                            <p><b>Username:</b> {{$User->username}}</p>
                            <p><b>Email:</b> {{$User->email}}</p>
                        </div>
                        <div class="buttons-container">
                            <a href="{{"deleteUser/".$User['id']}}" class="buttonbar">Elimina</a>
                            <a href="{{"CouponUtente".$User['id']}}" class="buttonbar">Coupon acquistati</a>
                        </div>
                    </div>
                @endif

            @endforeach
        @endisset()

    </div>
@endsection('content')
