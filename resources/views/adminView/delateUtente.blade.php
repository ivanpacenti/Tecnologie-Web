{{--eliminazione utenti di livello 1--}}

@extends('layouts.pageLayout')

@section('title','eliminazione utenti')

@section('content')
    <div class="maincontainer">
        <h1>Benvenuto nella pagina  per l'eliminazione degli utenti</h1>
        @isset($Users)
            @foreach($Users as $User)
                @if($User->role === 'user')
                <div class="main-box"> {{--contenitore per ogni singola faq--}}
                    <h2> Utente numero: {{$User->id}} </h2>
                    <div class="buttons-container">
                        <a href="{{"delete/".$User['id']}}" class="buttonbar">
                            Elimina</a> {{--<button class="bottoneModifica">Modifica</button>--}}
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
            @endforeach
        @else
            <h1>Non ci sono Utenti </h1>
        @endisset()

    </div>

@endsection('content')
