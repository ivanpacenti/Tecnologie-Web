@extends('layouts.pageLayout')

@section('title','PaginaStaff|Edit Coupon')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}">

    {!! Form::model($offerta, ['route' => ['edit', $offerta['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <div class="form-group">
        {!! Form::label('id', 'ID') !!}
        {!! Form::text('id', $offerta['id'], ['class' => 'form-input', 'readonly']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('modalita', 'Modalita') !!}
        {!! Form::text('modalita', $offerta['modalita'], ['class' => 'form-input', 'placeholder' => 'Inserisci modalita']) !!}
        @if ($errors->first('modalita'))
            <ul class="errors">
                @foreach ($errors->get('domanda') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('luogoFruizione', 'luogoFruizione') !!}
        {!! Form::text('luogoFruizione', $offerta['luogoFruizione'], ['class' => 'form-input','placeholder' => 'Inserisci luogo di fruizione']) !!}
        @if ($errors->first('luogoFruizione'))
            <ul class="errors">
                @foreach ($errors->get('luogoFruizione') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('Modifica', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}

@endsection('content')


