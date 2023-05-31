@extends('layouts.pageLayout')

@section('title','Staff | Edit Offer')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">
    {!! Form::model($offerta, ['route' => ['ModificaOffertaxx', $offerta['id']],'files' => true, 'class' => 'form'])!!}
    {!! Form::token() !!}

    <h1>Modifica un'offerta</h1>

    <div class="form-group">
        {!! Form::label('id', 'ID', ['class' => 'form-label']) !!}
        {!! Form::text('id', $offerta['id'], ['class' => 'form-input','readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('modalità', 'Modalità', ['class' => 'form-label']) !!}
        {!! Form::text('modalità', $offerta['modalità'], ['class' => 'form-input', 'placeholder' => 'cambia la modalità']) !!}
        @if ($errors->first('modalità'))
            <ul class="errors">
                @foreach ($errors->get('modalità') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('descrizione', 'Descrizione', ['class' => 'form-label']) !!}
        {!! Form::text('descrizione', $offerta['descrizione'], ['class' => 'form-input', 'placeholder' => 'Descrizione']) !!}
        @if ($errors->first('descrizione'))
            <ul class="errors">
                @foreach ($errors->get('descrizione') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('luogoFruizione', 'Luogo di fruizione', ['class' => 'form-label']) !!}
        {!! Form::text('luogoFruizione', $offerta['luogoFruizione'], ['class' => 'form-input', 'placeholder' => 'Inserisci luogo di fruizione']) !!}
        @if ($errors->first('luogoFruizione'))
            <ul class="errors">
                @foreach ($errors->get('luogoFruizione') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('dataInizio', 'Inizio', ['class' => 'form-label']) !!}
        {!! Form::date('dataInizio', $offerta['dataInizio'], ['class' => 'form-input', 'placeholder' => 'Inserisci data di inizio validazione']) !!}
        @if ($errors->first('dataInizio'))
            <ul class="errors">
                @foreach ($errors->get('dataInizio') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('dataFine', 'Scadenza', ['class' => 'form-label']) !!}
        {!! Form::date('dataFine', $offerta['dataFine'], ['class' => 'form-input', 'placeholder' => 'Inserisci data di fine validazione']) !!}
        @if ($errors->first('dataFine'))
            <ul class="errors">
                @foreach ($errors->get('dataFine') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('azienda', 'Azienda relativa') !!}
        {!! Form::select('azienda', $aziende, null, ['class' => 'form-input', 'required']) !!}
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
            {!! Form::file('immagine', ['class' => 'custom-file-input']) !!}
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
        {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}

    </div>
    {!! Form::close() !!}
@endsection('content')
