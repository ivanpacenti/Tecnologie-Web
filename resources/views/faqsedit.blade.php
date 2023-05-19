@extends('layouts.adminLayout')

@section('title','PaginaAdmin|Edit FAQ')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_design.css') }}" >
<div class="maincontainer">
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
</div>
@endsection('content')
