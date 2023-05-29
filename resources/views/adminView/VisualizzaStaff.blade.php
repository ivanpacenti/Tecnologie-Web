{{-- pagina admin--}}
@section('title','Admin | Staff')

@extends('layouts.pageLayout')
{{--dobbiamo pensare come gestire le faq che sono vuote--}}
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

    <div class="maincontainer">
        <h1>Di seguito ci sono tutti i membri STAFF</h1>
        <a href="{{route("staffcreate")}}" class="buttonbar-add"> Aggiungi un membro</a>
        @isset($staffs)
            @foreach($staffs as $staff)
                <div class="main-box">
                    <h2>ID membro staff: {{$staff->id}} </h2>
                    <div class="upper-box">
                        <p>Nome: {{$staff->name}} </p>
                        <p>Cognome: {{$staff->surname}} </p>
                        <p>Username: {{$staff->username}} </p>
                        <p>Email: {{$staff->email}} </p>
                    </div>
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
