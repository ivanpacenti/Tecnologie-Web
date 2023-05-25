{{--NAVBAR DELL'ADMIN--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <script src="js/scriptHome.js" async></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_design.css') }}" >
</head>

<div class="logo">
    <img src="{{asset('img/img_Logo.png')}}" alt="Logo" id="logo">
</div>

<nav>
    <div class="links">
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a href="{{route('catalogo')}}">Catalogo</a></li>
        <li><a href="{{ route('admin') }}" class="highlight" title="Profilo">Profilo</a></li>
        <li><a href="{{route('statistiche')}}"> Statistiche</a></li>
        <li><a href="{{ route('adminAziende') }}">Aziende</a></li>
        <li><a href="{{route('adminFaqs')}}"> Faq</a></li>
        <li><a href="{{route('visualizzaUtente')}}">Utenti</a></li>
        <li><a href="">Staff</a></li>
        @auth
            <li><a href="" class="highlight" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endauth
    </div>
</nav>
</html>
