@extends('layouts.pageLayout')

@section('title', 'Login')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/home_pub_design.css') }}">
        <div class="container-contact">
            <div class="wrap-contact1">
                {{ Form::open(array('route' => 'login', 'class' => 'form')) }}

                <div  class="form-group">
                    <h3>Login</h3>
                    <p>inserisci qui i tuoi dati </p>
                    <p> Se non hai già un account <a  href="{{ route('register') }}">registrati</a></p>
                </div>
                <div  class="form-group">
                    {{--                 LARAVEL collective--}}
                    {{ Form::label('username', 'Nome Utente'/*, ['class' => 'label-input']*/) }}
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
                    {{ Form::label('password', 'Password'/*, ['class' => 'label-input']*/) }}
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

                {{ Form::close() }}
            </div>
        </div>
@endsection
