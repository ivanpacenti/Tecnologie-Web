
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
            <li><a href="registrazione.html" title="Resgistrati al sito">Registrati</a></li>
            <li><a href="{{route('admin')}}">admin</a></li>
            {{--    nell'ipotesi non ci sia un utente loggato va generato a valle dell'utente loggato va generata l'acnora di login, e quindi @guest è vera se non c'è un utente
            loggato all'atto della visualizzazione, e facciamo apparire la nostra ancora che attiva la rotta login e che è associata alla parola accedi e quindi utilizzando queste direttive attivo
            una navbar dinamica--}}
            @guest
                <li><a href="{{ route('login') }}" class="highlight" title="Accedi all'area riservata del sito">login</a></li>
            @endguest
        </div>
    </nav>
</html>

