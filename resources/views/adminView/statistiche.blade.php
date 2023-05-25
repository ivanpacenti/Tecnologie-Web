
@section('title','PaginaAdmin')

@extends('layouts.pageLayout')

@section('content')
<h1>  qui siamo nelle sezioni delle statistiche </h1>
<h3> quali statistiche ti interessano??</h3>
<a href="{{route('NumeroCoupon')}}">numero totale di coupon emessi</a>

<a href="{{route('VisualizzaOfferte')}}">coupon emessi per ogni azienda</a>

<a href="{{route('index')}}">CCCCCCCCCC</a>



@endsection
