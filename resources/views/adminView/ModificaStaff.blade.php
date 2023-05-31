@extends('layouts.pageLayout')

@section('title','Admin | Edit User')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">

    {!! Form::model($staff, ['route' => ['ModificaStaff', $staff['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <h1>Modifica i dati di {{$staff['username']}}</h1>
    <div class="form-group">
        {!! Form::label('id', 'ID', ['class' => 'form-label']) !!}
        {!! Form::text('id', $staff['id'], ['class' => 'form-input','readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Nome', ['class' => 'form-label']) !!}
        {!! Form::text('name', $staff['name'], ['class' => 'form-input', 'placeholder' => 'cambia il tuo nome']) !!}
        @if ($errors->first('name'))
            <ul class="errors">
                @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('cognome', 'Cognome', ['class' => 'form-label']) !!}
        {!! Form::text('surname', $staff['surname'], ['class' => 'form-input', 'placeholder' => 'cognome']) !!}
        @if ($errors->first('surname'))
            <ul class="errors">
                @foreach ($errors->get('surname') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('età', 'Età', ['class' => 'form-label']) !!}
        {!! Form::text('età', $staff['età'], ['class' => 'form-input', 'placeholder' => 'Inserisci la tua età']) !!}
        @if ($errors->first('età'))
            <ul class="errors">
                @foreach ($errors->get('età') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
        {!! Form::email('email', $staff['email'], ['class' => 'form-input', 'placeholder' => 'Inserisci la tua email']) !!}
        @if ($errors->first('email'))
            <ul class="errors">
                @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('username', 'Username', ['class' => 'form-label']) !!}
        {!! Form::text('username', $staff['username'], ['class' => 'form-input', 'placeholder' => 'username', 'readonly'=>'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefono', 'Telefono') !!}
        {!! Form::text('telefono', null, ['class' => 'form-input']) !!}
        @if ($errors->first('telefono'))
            <ul class="errors">
                @foreach ($errors->get('telefono') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
        {!! Form::password('password',['value' => $staff['password'], 'class' => 'form-input', 'placeholder' => 'password']) !!}
        @if ($errors->first('password'))
            <ul class="errors">
                @foreach ($errors->get('password') as $message)
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
