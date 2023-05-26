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
    <img src={{asset('img/img_Logo.png')}} alt="Logo" id="logo">
</div>

<nav>
    <div class="links">
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a href="{{route('catalogo')}}">Catalogo</a></li>
        <li><a href="{{ route('staff') }}" class="highlight" title="Profilo">Profilo</a></li>

{{--        @can('isMembroSenior')--}}
{{--            <li><a href="{{route('')}}">crudPacchetti</a></li>--}}
{{--        @endcan--}}
        <li><a href="{{route('visualizzaOfferte')}}">crudPromozioni</a></li>

        @auth
            <li><a href="" class="highlight" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endauth
    </div>
</nav>
</html>
