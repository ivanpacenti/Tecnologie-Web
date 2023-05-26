{{--quesa pagina contiene la form della registrazione--}}

@extends('layouts.pageLayout')

@section('title', 'Registrazione staff')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/form_design.css')}}" >

    {!! Form::open(['route' => 'staffcreate', 'class' => 'form']) !!}
    <h1>Aggiungi un nuovo membro staff</h1>
    <div class="form-group">
        {!! Form::label('name', 'name:') !!}
        {!! Form::text('name', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('surname', 'surname:') !!}
        {!! Form::text('surname', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'email:') !!}
        {!! Form::text('email', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('username', 'username:') !!}
        {!! Form::text('username', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role', 'role:') !!}
        {!! Form::text('role', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('genere', 'genere:') !!}
        {!! Form::text('genere', null, ['class' => 'form-input', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefono', 'telefono:') !!}
        {!! Form::text('telefono', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Salva', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}
@endsection
