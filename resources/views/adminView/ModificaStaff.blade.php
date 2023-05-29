@extends('layouts.pageLayout')

@section('title','Admin | Edit User')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">

    {!! Form::model($staff, ['route' => ['ModificaStaff', $staff['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <h1>Modifica i dati di {{$staff['username']}}</h1>
    <div class="form-group">
        {!! Form::label('id', 'id', ['class' => 'form-label']) !!}
        {!! Form::text('id', $staff['id'], ['class' => 'form-input','readonly']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('name', 'name', ['class' => 'form-label']) !!}
        {!! Form::text('name', $staff['name'], ['class' => 'form-input', 'placeholder' => 'cambia il tuo nome']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('cognome', 'cognome', ['class' => 'form-label']) !!}
        {!! Form::text('surname', $staff['surname'], ['class' => 'form-input', 'placeholder' => 'cognome']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('username', 'username', ['class' => 'form-label']) !!}
        {!! Form::text('username', $staff['username'], ['class' => 'form-input', 'placeholder' => 'username']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('password', 'password', ['class' => 'form-label']) !!}
        {!! Form::password('password',['value' => $staff['password'], 'class' => 'form-input', 'placeholder' => 'password']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'email', ['class' => 'form-label']) !!}
        {!! Form::text('email', $staff['email'], ['class' => 'form-input', 'placeholder' => 'Inserisci la tua email']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('età', 'età', ['class' => 'form-label']) !!}
        {!! Form::text('età', $staff['età'], ['class' => 'form-input', 'placeholder' => 'Inserisci la tua età']) !!}

    </div>
    <div class="form-group">
        {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}

@endsection('content')
