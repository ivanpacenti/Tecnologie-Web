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
    <a href="{{route('index')}}"><img src={{asset('img/img_Logo.png')}} alt="Logo" id="logo"></a>
</div>


    <div class="searchbar" >
        @csrf
        <form action="{{route('ricerca')}}" method="GET" id="searchForm" autocomplete="off">
            <input type="text" id="cercaCoupon" name="cercaCoupon" list="coupon" placeholder="Cerca Coupon..." class="searchslot">
            <input type="text" id="cercaAzienda" name="cercaAzienda" list="aziende" placeholder="Cerca Azienda..."class="searchslot">
            <datalist id="coupon">
                    <?php
                    $offerte=(new \App\Models\Offerta)->getOfferte();
                    ?>
                @foreach($offerte as $offerta)
                    <option value="{{$offerta->descrizione}}">
                @endforeach
            </datalist>
            <datalist id="aziende">
                    <?php
                    $aziende=(new \App\Models\Azienda)->getAziende();
                    ?>
                @foreach($aziende as $azienda)
                    <option value="{{$azienda->nome}}">
                @endforeach
            </datalist>
            <input type="submit" hidden />
        </form>
    </div>


<nav>
    <div class="links">
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a href="{{route('catalogo')}}">Catalogo</a></li>
        <li><a href="{{ route('staff') }}" class="highlight" title="Profilo">Profilo</a></li>
        <li><a href="{{route('visualizzaOfferte')}}">Promozioni</a></li>

        @auth
            <li><a href="" class="highlight" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endauth
    </div>
</nav>
</html>
