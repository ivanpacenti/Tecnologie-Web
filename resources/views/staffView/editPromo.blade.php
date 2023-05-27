@extends('layouts.pageLayout')

@section('title','PaginaStaff|Edit Coupon')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">

    {!! Form::model($offerta, ['route' => ['ModificaOffertaxx', $offerta['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <h1>Modifica un'offerta</h1>
    <div class="form-group">
        {!! Form::label('id', 'id', ['class' => 'form-label']) !!}
        {!! Form::text('id', $offerta['id'], ['class' => 'form-input','readonly']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('modalita', 'modalita', ['class' => 'form-label']) !!}
        {!! Form::text('modalita', $offerta['modalita'], ['class' => 'form-input', 'placeholder' => 'cambia la modalita']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('descrizione', 'descrizione', ['class' => 'form-label']) !!}
        {!! Form::text('descrizione', $offerta['descrizione'], ['class' => 'form-input', 'placeholder' => 'Descrizione']) !!}
    </div>
    <!-- manca immagine -->
    <div class="form-group">
        {!! Form::label('luogoFruizione', 'luogoFruizione', ['class' => 'form-label']) !!}
        {!! Form::text('luogoFruizione', $offerta['luogoFruizione'], ['class' => 'form-input', 'placeholder' => 'Inserisci luogo di fruizione']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('dataInizio', 'dataInizio', ['class' => 'form-label']) !!}
        {!! Form::text('dataInizio', $offerta['dataInizio'], ['class' => 'form-input', 'placeholder' => 'Inserisci data di inizio validazione']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('dataFine', 'dataFine', ['class' => 'form-label']) !!}
        {!! Form::text('dataFine', $offerta['dataFine'], ['class' => 'form-input', 'placeholder' => 'Inserisci data di fine validazione']) !!}

    </div>
    <div class="form-group">
        {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}

@endsection('content')
