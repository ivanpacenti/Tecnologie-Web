@extends('layouts.pageLayout')

@section('title', 'Saff | Create Offer')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/form_design.css')}}" >

    {!! Form::open(['route' => 'CreaOfferta', 'class' => 'form', 'files' => true]) !!}
    <h1>Aggiungi una nuova promozione</h1>

    <div class="form-group">
        {!! Form::label('modalità', 'Modalità') !!}
        {!! Form::text('modalità', null, ['class' => 'form-input', 'required']) !!}
        @if ($errors->first('modalità'))
            <ul class="errors">
                @foreach ($errors->get('modalità') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('descrizione', 'Descrizione') !!}
        {!! Form::text('descrizione', null, ['class' => 'form-input', 'required']) !!}
        @if ($errors->first('descrizione'))
            <ul class="errors">
                @foreach ($errors->get('descrizione') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('dataInizio', 'Inizio') !!}
        {!! Form::date('dataInizio', null, ['class' => 'form-input-date', 'required']) !!}
        @if ($errors->first('dataInizio'))
            <ul class="errors">
                @foreach ($errors->get('dataInizio') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('dataFine', 'Scadenza') !!}
        {!! Form::date('dataFine', null, ['class' => 'form-input-date', 'required']) !!}
        @if ($errors->first('dataFine'))
            <ul class="errors">
                @foreach ($errors->get('dataFine') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('luogoFruizione', 'Luogo di fruizione') !!}
        {!! Form::text('luogoFruizione', null, ['class' => 'form-input', 'required']) !!}
        @if ($errors->first('luogoFruizione'))
            <ul class="errors">
                @foreach ($errors->get('luogoFruizione') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('azienda', 'Azienda relativa') !!}
        {!! Form::select('azienda', $aziende, null, ['class' => 'form-input-select', 'required']) !!}
        @if ($errors->first('azienda'))
            <ul class="errors">
                @foreach ($errors->get('azienda') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>


    <div class="form-group">
        {!! Form::label('immagine', 'Immagine') !!}
        <div class="form-group-2">
            {!! Form::file('immagine', ['class' => 'form-file-input']) !!}
            @if ($errors->first('immagine'))
                <ul class="errors">
                    @foreach ($errors->get('immagine') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Salva', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}
@endsection
