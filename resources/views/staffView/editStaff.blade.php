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
        {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
        {!! Form::password('password',['value' => $User['password'], 'class' => 'form-input', 'placeholder' => 'password']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}

@endsection('content')
