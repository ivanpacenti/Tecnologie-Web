<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         <meta charset="utf-8">
         <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
    </head>

    <body>
        <header>
        {{--    <!-- @if(login=admin)--}}
        {{--        @include('layouts/_navadmin')--}}
        {{--    @elseif(login=staff)--}}
        {{--        @include('layouts/_navstaff')--}}
        {{--    @elseif(login=utente)--}}
        {{--        @include('layouts/_navutente')--}}
        {{--    @endif--}}
        {{--    Idea per la realizzazione di un unico 'user/profile' in cui, in base al tipo di accesso, viene visualizzato un determinato header da definire-->--}}

            @include('layouts/_navadmin')
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            @include('layouts/footer')
        </footer>
    </body>
</html>
