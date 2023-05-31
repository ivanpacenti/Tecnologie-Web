{{--questa pagina modifica le area riservate--}}
@extends('layouts.pageLayout')

@section('title','Staff | Edit Profile')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">
    {!! Form::model($User, ['route' => ['editStaffxx', $User['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <h1>Modifica i tuoi dati personali</h1>
    <div class="form-group">
        {!! Form::label('id', 'ID', ['class' => 'form-label']) !!}
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
        {!! Form::label('name', 'Nome', ['class' => 'form-label']) !!}
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
        {!! Form::label('surname', 'Cognome', ['class' => 'form-label']) !!}
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
        {!! Form::label('età', 'Età', ['class' => 'form-label']) !!}
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
        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
        {!! Form::email('email', $User['email'], ['class' => 'form-input', 'placeholder' => 'Inserisci la tua email']) !!}
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
        {!! Form::text('username', $User['username'], ['class' => 'form-input', 'placeholder' => 'username', 'readonly'=>'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefono', 'Telefono') !!}
        {!! Form::text('telefono', $User['telefono'], ['class' => 'form-input']) !!}
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
        {!! Form::password('password',['value' => $User['password'], 'class' => 'form-input', 'placeholder' => 'password']) !!}
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
