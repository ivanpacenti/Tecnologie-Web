@section('title','Dove Siamo?')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home_pub_design.css') }}" >

    <div class="form">
        <h1>Dove Siamo?</h1>
        <div id="map"></div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmz4UvbdM4VAiTW5dAYmlaab0eDKAGLow&callback=initMap" async defer></script> {{--inclusione della google API necessaria per la visualizzazione della mappa Google--}}
    <script src="js/scriptHome.js" async></script> {{--inclusione del file js che contiene la mappa--}}
@endsection

