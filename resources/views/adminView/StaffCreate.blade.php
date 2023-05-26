{{--quesa pagina contiene la form della registrazione--}}

@extends('layouts.pageLayout')

@section('title', 'Registrazione staff')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/form_design.css')}}" >

    {!! Form::open(['route' => 'staffcreate', 'class' => 'form']) !!}
    <h1>Aggiungi un nuovo membro staff</h1>
    <div class="form-group">
        {!! Form::label('domanda', 'Domanda:') !!}
        {!! Form::text('domanda', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('risposta', 'Risposta:') !!}
        {!! Form::text('risposta', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Salva', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}
@endsection
