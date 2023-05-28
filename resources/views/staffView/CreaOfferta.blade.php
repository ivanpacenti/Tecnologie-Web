@extends('layouts.pageLayout')

@section('title', 'Crea Offerta')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/form_design.css')}}" >

    {!! Form::open(['route' => 'CreaOfferta', 'class' => 'form', 'files' => true]) !!}
    <h1>Aggiungi nuova promozione</h1>
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
         </div>
     </div>
    <div class="form-group">
        {!! Form::label('modalita', 'Modalità:') !!}
        {!! Form::text('modalita', null, ['class' => 'form-input', 'required']) !!}
        @if ($errors->first('modalita'))
            <ul class="errors">
                @foreach ($errors->get('modalita') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('descrizione', 'Descrizione:') !!}
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
        {!! Form::label('dataInizio', 'Inizio validità:') !!}
        {!! Form::text('dataInizio', null, ['class' => 'form-input', 'required']) !!}
        @if ($errors->first('dataInizio'))
            <ul class="errors">
                @foreach ($errors->get('dataInizio') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('dataFine', 'Fine validità:') !!}
        {!! Form::text('dataFine', null, ['class' => 'form-input', 'required']) !!}
        @if ($errors->first('dataFine'))
            <ul class="errors">
                @foreach ($errors->get('dataFine') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('luogoFruizione', 'Luogo di fruizione:') !!}
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
        {!! Form::submit('Salva', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}
@endsection
