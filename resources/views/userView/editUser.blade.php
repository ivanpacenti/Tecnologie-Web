{{--questa pagina modifica le area riservate--}}
@extends('layouts.pageLayout')

@section('title','Pagina modifca dati user')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_design.css') }}">

    {!! Form::model($User, ['route' => ['editx', $User['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <div class="form-group">
        {!! Form::label('id', 'ID', ['class' => 'form-label']) !!}
        {!! Form::text('id', $User['id'], ['class' => 'form-input', 'placeholder' => '']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'name', ['class' => 'form-label']) !!}
        {!! Form::text('name', $User['name'], ['class' => 'form-input', 'placeholder' => 'cambia il tuo nome']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('surname', 'surname', ['class' => 'form-label']) !!}
        {!! Form::text('surname', $User['surname'], ['class' => 'form-input', 'placeholder' => 'cognome']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'password', ['class' => 'form-label']) !!}
        {!! Form::text('password', $User['password'], ['class' => 'form-input', 'placeholder' => 'password']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'email', ['class' => 'form-label']) !!}
        {!! Form::text('email', $User['email'], ['class' => 'form-input', 'placeholder' => 'Inserisci la tua email']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('età', 'età', ['class' => 'form-label']) !!}
        {!! Form::text('età', $User['età'], ['class' => 'form-input', 'placeholder' => 'Inserisci la tua età']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}

@endsection('content')
