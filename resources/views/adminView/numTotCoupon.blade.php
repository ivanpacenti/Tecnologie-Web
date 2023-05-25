{{--numero totale di coupon emessi dalla azienda--}}

@section('title','PaginaAdmin')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
    <div class="maincontainer">
        <h1> Il numero totale di coupon emessi dal nostro sito è: {{$numTotCoupon}}</h1>
        <a href="{{route('statistiche')}}" class="buttonbarstats">torna indietro</a>
    </div>
@endsection
