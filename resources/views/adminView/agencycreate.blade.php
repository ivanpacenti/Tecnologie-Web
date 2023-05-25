
@section('title','PaginaAdmin')

@extends('layouts.pageLayout')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/form_design.css')}}" >

    {!! Form::open(['route' => 'agencycreate2', 'class' => 'form']) !!}
    {!! Form::token() !!}
    <h1>Aggiungi una nuova azienda</h1>
    <div class="form-group">
        {!! Form::label('id', 'ID') !!}
        {!! Form::text('id', null, ['class' => 'form-input', 'readonly']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('partitaIva', 'Partita Iva') !!}
        {!! Form::text('partitaIva', null, ['class' => 'form-input','placeholder' => 'Inserisci Partita IVA']) !!}
        @if ($errors->first('partitaIva'))
            <ul class="errors">
                @foreach ($errors->get('partitaIva') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('nome', 'Nome') !!}
        {!! Form::text('nome', null /*$azienda['nome']*/, ['class' => 'form-input', 'placeholder' => 'Inserisci nome']) !!}
        @if ($errors->first('nome'))
            <ul class="errors">
                @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('posizione', 'Posizione') !!}
        {!! Form::text('posizione', null, ['class' => 'form-input','placeholder' => 'Inserisci posizione']) !!}
        @if ($errors->first('posizione'))
            <ul class="errors">
                @foreach ($errors->get('posizione') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('descrizione', 'Descrizione') !!}
        {!! Form::text('descrizione', null, ['class' => 'form-input','placeholder' => 'Inserisci descrizione']) !!}
        @if ($errors->first('descrizione'))
            <ul class="errors">
                @foreach ($errors->get('descrizione') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('tipologia', 'Tipologia') !!}
        {!! Form::text('tipologia', null, ['class' => 'form-input','placeholder' => 'Inserisci tipologia']) !!}
        @if ($errors->first('tipologia'))
            <ul class="errors">
                @foreach ($errors->get('tipologia') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('logo', 'Logo') !!}
        {!! Form::text('logo', null, ['class' => 'form-input','placeholder' => 'Inserisci logo']) !!}
        @if ($errors->first('logo'))
            <ul class="errors">
                @foreach ($errors->get('logo') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('Salva', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}

@endsection
