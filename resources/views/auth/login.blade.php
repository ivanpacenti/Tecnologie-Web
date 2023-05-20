@extends('layouts.pageLayout')

@section('title', 'Login')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/home_pub_design.css') }}">

    {{ Form::open(array('route' => 'login', 'class' => 'form')) }}
    <h1>Login</h1>
    <div  class="form-group">
        {{--                 LARAVEL collective--}}
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

    <div class="form-group">
        {{ Form::submit('Login', ['class' => 'form-button']) }}
    </div>
    <p> Se non hai già un account <a  href="{{ route('register') }}">registrati</a></p>

    {{ Form::close() }}

@endsection
