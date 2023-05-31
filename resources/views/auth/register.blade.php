{{--quesa pagina contiene la form della registrazione--}}

@extends('layouts.pageLayout')

@section('title', 'Sign In')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home_pub_design.css') }}">

    {{ Form::open(array('route' => 'register', 'class' => 'form')) }}
    <h1>Registrazione</h1>
    <div  class="form-group">
        {{ Form::label('name', 'Nome', ['class' => 'form-label']) }}
        {{ Form::text('name', '', ['class' => 'form-input', 'id' => 'name']) }}
        @if ($errors->first('name'))
            <ul class="errors">
                @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div  class="form-group">
        {{ Form::label('surname', 'Cognome', ['class' => 'form-label']) }}
        {{ Form::text('surname', '', ['class' => 'form-input', 'id' => 'surname']) }}
        @if ($errors->first('surname'))
            <ul class="errors">
                @foreach ($errors->get('surname') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div  class="form-group">
        {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
        {{ Form::text('email', '', ['class' => 'form-input','id' => 'email']) }}
        @if ($errors->first('email'))
            <ul class="errors">
                @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div  class="form-group">
        {{ Form::label('età', 'età', ['class' => 'form-label']) }}
        {{ Form::text('età', '', ['class' => 'form-input','id' => 'età']) }}
        @if ($errors->first('età'))
            <ul class="errors">
                @foreach ($errors->get('età') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div  class="form-group">
        {{ Form::label('telefono', 'telefono', ['class' => 'form-label']) }}
        {{ Form::text('telefono', '', ['class' => 'form-input','id' => 'telefono']) }}
        @if ($errors->first('telefono'))
            <ul class="errors">
                @foreach ($errors->get('telefono') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {{ Form::label('genere', 'Genere', ['class' => 'form-label']) }}
        {{ Form::select('genere', ['maschio' => 'Maschio', 'femmina' => 'Femmina'], null, ['id' => 'genere', 'class' => 'form-input'])}}
    </div>


    <div  class="form-group">
        {{ Form::label('username', 'Nome Utente', ['class' => 'form-label']) }}
        {{ Form::text('username', '', ['class' => 'form-input','id' => 'username']) }}
        @if ($errors->first('username'))
            <ul class="errors">
                @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>


    <div  class="form-group">
        {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
        {{ Form::password('password', ['class' => 'form-input', 'id' => 'password']) }}
        @if ($errors->first('password'))
            <ul class="errors">
                @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    {{--// tecninca che serve per il server laravel, va scritto cosi, e lo gestisce laravel si devono chiamare cosi e alravel si occupa nella sua validazione di definire questa sua caratteristica--}}
    <div  class="form-group">
        {{ Form::label('password-confirm', 'Conferma password', ['class' => 'form-label']) }}
        {{ Form::password('password_confirmation', ['class' => 'form-input', 'id' => 'password-confirm']) }}
    </div>

    <div class="container-form-btn">
        {{ Form::submit('Registrati', ['class' => 'form-button']) }}
    </div>

    {{ Form::close() }}

@endsection
