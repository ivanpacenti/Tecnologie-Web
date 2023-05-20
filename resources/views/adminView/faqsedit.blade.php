@extends('layouts.pageLayout')

@section('title','PaginaAdmin|Edit FAQ')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_design.css') }}">

    {!! Form::model($faq, ['route' => ['edit', $faq['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <div class="form-group">
        {!! Form::label('id', 'ID') !!}
        {!! Form::text('id', $faq['id'], ['class' => 'form-input', 'placeholder' => 'Inserisci ID']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('domanda', 'Domanda') !!}
        {!! Form::text('domanda', $faq['domanda'], ['class' => 'form-input', 'placeholder' => 'Inserisci domanda']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('risposta', 'Risposta') !!}
        {!! Form::text('risposta', $faq['risposta'], ['class' => 'form-input','placeholder' => 'Inserisci risposta']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}

@endsection('content')
