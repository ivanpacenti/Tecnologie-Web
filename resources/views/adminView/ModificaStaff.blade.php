@extends('layouts.pageLayout')

@section('title','Admin | Edit User')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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

    <?php
    $aziende=(new \App\Models\Azienda)->getAziende();
    $aziende_abilitate=(new \App\Models\Assegnazione)->getAssegnazioneByUtente($staff['username'])->pluck('azienda');
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
        {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}
    <script>
        function abilitaCheckboxDaArray(numeri) {
            numeri.forEach(function(numero) {
                //abilita le checkbox in base alle aziende per cui lo staff è abilitato
                var checkbox = $('#' + numero);
                checkbox.prop('checked', true);
                checkbox.prop('disabled', false);
            });
        }

        // Esempio di utilizzo
        $(document).ready(function() {
            // prende l'array di numeri dal PHP e lo converte in JavaScript
            var arrayNumeri = {{$aziende_abilitate}};
            abilitaCheckboxDaArray(arrayNumeri);
        });
    </script>
@endsection('content')
