<h1>ciao a tutti</h1>
@extends('layouts.pageLayout')
@section('title','Pagina modifca dati user')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_design.css') }}">

    {!! Form::model($User, ['route' => ['editx', $User['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <div class="form-group">
        {!! Form::label('id', 'ID') !!}
        {!! Form::text('id', $User['id'], ['class' => 'form-input', 'placeholder' => 'Inserisci ID']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'email') !!}
        {!! Form::text('email', $User['email'], ['class' => 'form-input', 'placeholder' => 'Inserisci la tua email']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}

@endsection('content')
