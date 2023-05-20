{{--parte di crud per le aziende riservata all'amministratore--}}

@section('title','PaginaAdmin')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
    <h1> Benvenuto!</h1>
    <h4> Da qui puoi gestire le aziende</h4>

    <div class="maincontainer">
        <a {{--href="{{route("agencyCreate")}}"--}} class="buttonbar-add">Aggiungi un' azienda</a>
        @isset($aziende)
            @foreach($aziende as $azienda)

                <div class="main-box-az"> {{--contenitore per ogni singola azienda--}}
                    <h2> Azienda numero: {{$azienda->id}} </h2>
                </div>

            @endforeach
        @else
            <h1>Non ci sono aziende </h1>
            <button class="Aggiungi">Aggiungine una nuova azienda</button>
        @endisset()
    </div>
@endsection('content')
