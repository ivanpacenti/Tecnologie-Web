@extends('layouts.pageLayout')

@section('title','Admin | Edit Agency')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">

    {!! Form::model($azienda, ['route' => ['agencyedit', $azienda['id']],'files' => true, 'class' => 'form']) !!}
    {!! Form::token() !!}
    <h1>Modifica i dati dell'azienda: {{$azienda['id']}}</h1>
    <div class="form-group">
        {!! Form::label('id', 'ID') !!}
        {!! Form::text('id', $azienda['id'], ['class' => 'form-input', 'readonly']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('partitaIva', 'Partita Iva') !!}
        {!! Form::text('partitaIva', $azienda['partitaIva'], ['class' => 'form-input','placeholder' => 'Inserisci partitaIva']) !!}
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
        {!! Form::text('nome', $azienda['nome'], ['class' => 'form-input', 'placeholder' => 'Inserisci nome']) !!}
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
        {!! Form::text('posizione', $azienda['posizione'], ['class' => 'form-input','placeholder' => 'Inserisci posizione']) !!}
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
        {!! Form::text('descrizione', $azienda['descrizione'], ['class' => 'form-input','placeholder' => 'Inserisci descrizione']) !!}
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
        {!! Form::text('tipologia', $azienda['tipologia'], ['class' => 'form-input','placeholder' => 'Inserisci tipologia']) !!}
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
        <div class="form-group-2">
            {!! Form::file('logo', null, ['class' => 'custom-file-input']) !!}
            @if ($errors->first('logo'))
                <ul class="errors">
                    @foreach ($errors->get('logo') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}

@endsection('content')
