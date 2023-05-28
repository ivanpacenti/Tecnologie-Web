@extends('layouts.pageLayout')

@section('title','PaginaStaff|Edit Coupon')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">
    <!--{!! Form::open(['route' => 'ModificaOffertaxx', 'class' => 'form', 'files' => true]) !!} -->
    {!! Form::model($offerta, ['route' => ['ModificaOffertaxx', $offerta['id']], 'class' => 'form'])!!}
    {!! Form::token() !!}
    <h1>Modifica un'offerta</h1>
    <div class="form-group">
        {!! Form::label('immagine', 'Immagine:') !!}
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
    </div><div class="form-group">
        {!! Form::label('id', 'id', ['class' => 'form-label']) !!}
        {!! Form::text('id', $offerta['id'], ['class' => 'form-input','readonly']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('modalita', 'modalita', ['class' => 'form-label']) !!}
        {!! Form::text('modalita', $offerta['modalita'], ['class' => 'form-input', 'placeholder' => 'cambia la modalita']) !!}
        @if ($errors->first('modalita'))
            <ul class="errors">
                @foreach ($errors->get('modalita') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('descrizione', 'descrizione', ['class' => 'form-label']) !!}
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
        {!! Form::label('luogoFruizione', 'luogoFruizione', ['class' => 'form-label']) !!}
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
        {!! Form::label('dataInizio', 'dataInizio', ['class' => 'form-label']) !!}
        {!! Form::text('dataInizio', $offerta['dataInizio'], ['class' => 'form-input', 'placeholder' => 'Inserisci data di inizio validazione']) !!}
        @if ($errors->first('dataInizio'))
            <ul class="errors">
                @foreach ($errors->get('dataInizio') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('dataFine', 'dataFine', ['class' => 'form-label']) !!}
        {!! Form::text('dataFine', $offerta['dataFine'], ['class' => 'form-input', 'placeholder' => 'Inserisci data di fine validazione']) !!}
        @if ($errors->first('dataFine'))
            <ul class="errors">
                @foreach ($errors->get('dataFine') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}

    </div>
    {!! Form::close() !!}
@endsection('content')
