@extends('layouts.pageLayout')

@section('title','Pagina modifica coupon')

@section('content')
@isset($offerta)
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_design.css') }}">
    {!! Form::model($offerta, ['route' => ['editCoupon', $offerta['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
    <h1>Modifica il coupon</h1>
    <div class="form-group">
        {!! Form::label('id', 'id', ['class' => 'form-label']) !!}
        {!! Form::text('id', $offerta['id'], ['class' => 'form-input','readonly']) !!}
        @if ($errors->first('id'))
            <ul class="errors">
                @foreach ($errors->get('id') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('modalita', 'modalita', ['class' => 'form-label']) !!}
        {!! Form::text('modalita', $offerta['modalita'], ['class' => 'form-input', 'placeholder' => 'cambia la modalita']) !!}
        @if ($errors->first('modalita'))
            <ul class="errors">
                @foreach ($errors->get('modalita') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('luogoFruizione', 'luogoFruizione', ['class' => 'form-label']) !!}
        {!! Form::text('luogoFruizione', $offerta['luogoFruizione'], ['class' => 'form-input', 'placeholder' => 'cambia luogo di fruizione']) !!}
        @if ($errors->first('luogoFruizione'))
            <ul class="errors">
                @foreach ($errors->get('luogoFruizione') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
        <div class="form-group">
            {!! Form::label('immagine', 'immagine', ['class' => 'form-label']) !!}
            {!! Form::text('immagine', $offerta['immagine'], ['class' => 'form-input', 'placeholder' => 'cambia immagine Coupon']) !!}
            @if ($errors->first('immagine'))
                <ul class="errors">
                    @foreach ($errors->get('immagine') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    <div class="form-group">
        {!! Form::label('dataInizio', 'dataInizio', ['class' => 'form-label']) !!}
        {!! Form::text('dataInizio', $offerta['dataInizio'], ['class' => 'form-input', 'placeholder' => 'cambia data di inizio fruizione']) !!}
        @if ($errors->first('dataInizio'))
            <ul class="errors">
                @foreach ($errors->get('dataInizio') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('dataFine', 'dataFine', ['class' => 'form-label']) !!}
        {!! Form::text('dataFine', $offerta['dataFine'], ['class' => 'form-input', 'placeholder' => 'cambia data di fine fruizione']) !!}
        @if ($errors->first('dataFine'))
            <ul class="errors">
                @foreach ($errors->get('dataFine') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endisset

