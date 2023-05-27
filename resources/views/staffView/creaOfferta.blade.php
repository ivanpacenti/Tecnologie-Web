@extends('layouts.pageLayout')

@section('title', 'Crea Offerta')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/form_design.css')}}" >

    {!! Form::open(['route' => 'creaOfferta', 'class' => 'form']) !!}
    <h1>Aggiungi nuova promozione</h1>
    <div class="form-group">
        {!! Form::label('immagine', 'Immagine:') !!}
        <!-- <input type="text" id="image-link" name="image-link"> -->
        {!! Form::text('immagine', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('id', 'Id:') !!}
        {!! Form::text('id', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('modalita', 'Modalità:') !!}
        {!! Form::text('modalita', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('descrizione', 'Descrizione:') !!}
        {!! Form::text('descrizione', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('dataInizio', 'Inizio validità:') !!}
        {!! Form::text('dataInizio', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('dataFine', 'Fine validità:') !!}
        {!! Form::text('dataFine', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('luogoFruizione', 'Luogo di fruizione:') !!}
        {!! Form::text('luogoFruizione', null, ['class' => 'form-input', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Salva', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}
@endsection
