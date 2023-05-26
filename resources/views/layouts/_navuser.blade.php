<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_design.css') }}" >
</head>

<div class="logo">
    <img src={{asset('img/img_Logo.png')}} alt="Logo" id="logo">
</div>

<nav>
    <div class="links">
        <li><a href="{{ route('index') }}" title="Home del sito">Home</a></li>
        <li><a href="{{ route('user') }}" title="Home di User">Profilo</a></li>
        <li><a href="{{ route('catalogo') }}" title="Visualizza il Catalogo Prodotti">Catalogo</a></li>
        <li><a href="{{route('homeAziende')}}" title="le nostre aziende">Le nostre aziende</a></li>
        @auth
            <li><a href="" class="highlight" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endauth
    </div>
</nav>
