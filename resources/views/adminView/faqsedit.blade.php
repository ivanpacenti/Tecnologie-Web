@extends('layouts.pageLayout')

@section('title','Admin | Edit FAQ')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">

    {!! Form::model($faq, ['route' => ['edit', $faq['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <div class="form-group">
        {!! Form::label('id', 'ID') !!}
        {!! Form::text('id', $faq['id'], ['class' => 'form-input', 'readonly']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('domanda', 'Domanda') !!}
        {!! Form::text('domanda', $faq['domanda'], ['class' => 'form-input', 'placeholder' => 'Inserisci domanda']) !!}
        @if ($errors->first('domanda'))
            <ul class="errors">
                @foreach ($errors->get('domanda') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('risposta', 'Risposta') !!}
        {!! Form::text('risposta', $faq['risposta'], ['class' => 'form-input','placeholder' => 'Inserisci risposta']) !!}
        @if ($errors->first('risposta'))
            <ul class="errors">
                @foreach ($errors->get('risposta') as $message)
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
