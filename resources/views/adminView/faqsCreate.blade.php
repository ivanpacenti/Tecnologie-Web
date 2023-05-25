
@section('title','PaginaAdmin')

@extends('layouts.pageLayout')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/form_design.css')}}" >

    {!! Form::open(['route' => 'faqsCreate2', 'class' => 'form']) !!}
    <h1>Aggiungi una nuova FAQ</h1>
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
