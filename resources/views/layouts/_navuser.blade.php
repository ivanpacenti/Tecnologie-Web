<ul>
    <li><a href="{{ route('user') }}" title="Va alla Home di User">DatiPersonali</a></li>
    <li><a href="{{ route('catalogo') }}" title="Visualizza il Catalogo Prodotti">Catalogo</a></li>
    <li><a href="{{ route('index') }}" title="Homedelsito">Home</a></li>
    @auth
        <li><a href="" class="highlight" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
</ul>
