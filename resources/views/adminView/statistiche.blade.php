
@section('title','PaginaAdmin')

@extends('layouts.pageLayout')

@section('content')
<h1>  qui siamo nelle sezioni delle statistiche </h1>
<p>
<a href="{{route('NumeroCoupon')}}" class="buttonbar">numero totale di coupon emessi</a>
<p>
<p>
<a href="{{route('VisualizzaOfferte')}}"class="buttonbar">coupon emessi per ogni azienda</a>
</p>
<p>
<a href="{{route("visualizzaUtente")}}" class="buttonbar">
    coupon comprati per utente</a>
<p>
@endsection
