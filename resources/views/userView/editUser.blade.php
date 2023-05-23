{{--questa pagina modifica le area riservate--}}
@extends('layouts.pageLayout')

@section('title','Pagina modifca dati user')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">

    {!! Form::model($User, ['route' => ['editx', $User['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <h1>Modifica i tuoi dati personali</h1>
    <div class="form-group">
        {!! Form::label('id', 'id', ['class' => 'form-label']) !!}
        {!! Form::text('id', $User['id'], ['class' => 'form-input','readonly']) !!}
        @if ($errors->first('id'))
            <ul class="errors">
                @foreach ($errors->get('id') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('name', 'name', ['class' => 'form-label']) !!}
        {!! Form::text('name', $User['name'], ['class' => 'form-input', 'placeholder' => 'cambia il tuo nome']) !!}
        @if ($errors->first('name'))
            <ul class="errors">
                @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('surname', 'surname', ['class' => 'form-label']) !!}
        {!! Form::text('surname', $User['surname'], ['class' => 'form-input', 'placeholder' => 'cognome']) !!}
        @if ($errors->first('surname'))
            <ul class="errors">
                @foreach ($errors->get('surname') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('username', 'username', ['class' => 'form-label']) !!}
        {!! Form::text('username', $User['username'], ['class' => 'form-input', 'placeholder' => 'username']) !!}
        @if ($errors->first('username'))
            <ul class="errors">
                @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('password', 'password', ['class' => 'form-label']) !!}
        {!! Form::text('password', $User['password'], ['class' => 'form-input', 'placeholder' => 'password']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'email', ['class' => 'form-label']) !!}
        {!! Form::text('email', $User['email'], ['class' => 'form-input', 'placeholder' => 'Inserisci la tua email']) !!}
        @if ($errors->first('email'))
            <ul class="errors">
                @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('età', 'età', ['class' => 'form-label']) !!}
        {!! Form::text('età', $User['età'], ['class' => 'form-input', 'placeholder' => 'Inserisci la tua età']) !!}
        @if ($errors->first('età'))
            <ul class="errors">
                @foreach ($errors->get('età') as $message)
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
