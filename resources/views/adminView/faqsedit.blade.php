@extends('layouts.adminLayout')

@section('title','PaginaAdmin|Edit FAQ')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_design.css') }}" >
{{--<div class="maincontainer">
    <form class="form" method="post" action="{{ route('edit')}}" >
        @csrf
        <div class="form-box">
            <input type="text" name="id" placeholder="Input id" value="{{$faq['id']}}">
        </div>
        <div class="form-box">
            <input type="text" name="domanda" placeholder="Inserisci domanda" value="{{$faq['domanda']}}">
        </div>
        <div class="form-box">
            <input type="text" name="risposta" placeholder="Inserisci risposta" value="{{$faq['risposta']}}">
        </div>
            <button type="submit"> AGGIORNA </button>
    </form>
</div>--}}
    {!! Form::model($faq, ['route' => ['edit', $faq['id']], 'class' => 'form']) !!}
    {!! Form::token() !!}
        <div class="form-group">
            {!! Form::label('id', 'ID') !!}
            {!! Form::text('id', $faq['id'], ['class' => 'form-input', 'placeholder' => 'Inserisci ID']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('domanda', 'Domanda') !!}
            {!! Form::text('domanda', $faq['domanda'], ['class' => 'form-input', 'placeholder' => 'Inserisci domanda']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('risposta', 'Risposta') !!}
            {!! Form::text('risposta', $faq['risposta'], ['class' => 'form-input','placeholder' => 'Inserisci risposta']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Aggiorna', ['class' => 'formbutton']) !!}
        </div>
    {!! Form::close() !!}

@endsection('content')
