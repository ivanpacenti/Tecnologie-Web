<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         <meta charset="utf-8">
    </head>

    <body>
        <header>
            @guest
                @include('layouts/_navpublic')
            @endguest
            @can('isUser')
                @include('layouts/_navpublic')
            @endcan
            @can('isAdmin')
                @include('layouts/_navadmin')
            @endcan
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            @include('layouts/footer')
        </footer>
    </body>
</html>
