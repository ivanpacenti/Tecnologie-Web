{{-- pagina admin--}}
@section('title','PaginaAdmin')

@extends('layouts.pageLayout')
{{--dobbiamo pensare come gestire le faq che sono vuote--}}
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

    <div class="maincontainer">
        <h1>Benvenuto nella pagina di gestione STAFF</h1>
        <a href="{{route("staffcreate")}}" class="buttonbar-add"> Aggiungi un membro dello staff</a>
        @isset($staffs)
            @foreach($staffs as $staff)
                <div class="main-box">
                    <h2>id utente staff : {{$staff->id}} </h2>
                    <h2>nome: {{$staff->name}} </h2>
                    <h2>cognome: {{$staff->surname}} </h2>
                    <h2>email: {{$staff->email}} </h2>
                    <h2>genere: {{$staff->genere}} </h2>
                    <h2>telefono: {{$staff->telefono}} </h2>
                    <h2>Ruolo: {{$staff->role}} </h2>
                    <div class="buttons-container">
                        <a href="{{"ModificaStaff/".$staff['id']}}" class="buttonbar">
                            Modifica</a>
                        <a href="{{"deleteUser/".$staff['id']}}" class="buttonbar">
                            Elimina</a>
                    </div>
                </div>
            @endforeach
        @else
            <h1>Non ci membri dello staff </h1>
        @endisset()
    </div>
@endsection('content')
