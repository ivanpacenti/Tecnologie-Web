{{--quesa pagina contiene la form della registrazione--}}

@extends('layouts.pageLayout')

@section('title', 'Admin | Create Staff')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/form_design.css')}}" >

    {!! Form::open(['route' => 'staffcreate2', 'class' => 'form']) !!}
    {!! Form::token() !!}
    <h1>Aggiungi un nuovo membro staff</h1>
    <div class="form-group">
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', null, ['class' => 'form-input']) !!}
        @if ($errors->first('name'))
            <ul class="errors">
                @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('surname', 'Cognome') !!}
        {!! Form::text('surname', null, ['class' => 'form-input']) !!}
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
        {!! Form::text('età', null, ['class' => 'form-input', 'placeholder' => 'Inserisci la tua età']) !!}
        @if ($errors->first('età'))
            <ul class="errors">
                @foreach ($errors->get('età') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-input']) !!}
        @if ($errors->first('email'))
            <ul class="errors">
                @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('username', 'Username') !!}
        {!! Form::text('username', null, ['class' => 'form-input']) !!}
        @if ($errors->first('username'))
            <ul class="errors">
                @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {{ Form::label('role', 'Ruolo', ['class' => 'form-label']) }}
        {{ Form::select('role', ['staff' => 'Staff'], null, ['id' => 'role', 'class' => 'form-input'])}}
    </div>

    <div class="form-group">
        {{ Form::label('genere', 'Genere', ['class' => 'form-label']) }}
        {{ Form::select('genere', ['maschio' => 'Maschio', 'femmina' => 'Femmina'], null, ['id' => 'genere', 'class' => 'form-input'])}}
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

    <div  class="form-group">
        {{ Form::label('password-confirm', 'Conferma password', ['class' => 'form-label']) }}
        {{ Form::password('password_confirmation', ['class' => 'form-input', 'id' => 'password-confirm']) }}
    </div>

    <?php
    $aziende=(new \App\Models\Azienda)->getAziende();
    ?>
    @csrf
    <div class="form-group">
        {!! Form::label('aziende', 'Aziende da gestire:') !!}
        <div class="form-group-3">
            @foreach($aziende as $azienda)
                <label class="containercheck">
                    {!! Form::checkbox('aziende[]', $azienda->id, null, ['id' => $azienda->id, 'class' => 'form-check']) !!}
                    {{ $azienda->nome }}
                    <span class="checkmark"></span>
                </label>
            @endforeach
            @if ($errors->has('aziende'))
                <ul class="errors">
                    @foreach ($errors->get('aziende') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Salva', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}






@endsection

