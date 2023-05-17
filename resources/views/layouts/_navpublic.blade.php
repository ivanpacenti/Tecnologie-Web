
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
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('catalogo')}}">Catalogo</a></li>
            <li><a href="registrazione.html">Registrati</a></li>
            <li><a href="./login.html">Login</a></li>
            <li><a href="{{route('admin')}}">admin</a></li>
        </div>
    </nav>
</html>

