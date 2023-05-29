
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_design.css') }}" >
    </head>
    <div class="logo">
        <a href="{{route('index')}}"><img src={{asset('img/img_Logo.png')}} alt="Logo" id="logo"></a>
    </div>
        @if (request()->is('catalogo'))
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
        @endif
    <nav>
        <div class="links">
            <li><a href="{{route('index')}}" title="Home del sito">Home</a></li>
            <li><a href="{{route('catalogo')}}" title="Catalogo delle offerte">Catalogo</a></li>
            <li><a href="{{route('homeAziende')}}" title="le nostre aziende">Le nostre aziende</a></li>
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
    <script src="js/scriptNav.js" async></script>
</html>

