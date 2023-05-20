
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
    <head>
        <script src="js/scriptHome.js" async></script>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_design.css') }}" >
    </head>

    <div class="logo">
        <img src="img/img_Logo.png" alt="Logo" id="logo">
    </div>
    <div class="searchbar">
        <input type="text" placeholder="Cerca un coupon...">
    </div>
    <nav>
        <div class="links">
            <li><a href="{{route('index')}}" title="Home del sito">Home</a></li>
            <li><a href="{{route('catalogo')}}" title="Catalogo delle offerte">Catalogo</a></li>

            {{-- si attiva quando l'utente è loggato--}}
            @can('isUser')
                <li><a href="{{ route('user') }}" class="highlight" title="Profilo">Profilo</a></li>
            @endcan
            @can('isAdmin')
                <li><a href="{{ route('admin') }}" class="highlight" title="Profilo">Profilo</a></li>
            @endcan
            {{-- si attiva con qualsiasi utente loggato sia admin che utente che staff --}}
            @auth
                <li><a href="" class="highlight" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endauth

            {{-- si attiva solamente quando l'utente non è loggato--}}
            @guest
                <li><a href="{{ route('register') }}" title="Resgistrati al sito">Registrati</a></li>
                <li><a href="{{ route('login') }}" class="highlight" title="Accedi all'area riservata del sito">Login</a></li>
            @endguest
        </div>
    </nav>
</html>

