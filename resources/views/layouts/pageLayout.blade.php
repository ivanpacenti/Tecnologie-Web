<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         <meta charset="utf-8">
        <title>TecnoWeb | @yield('title')</title>
        @section('link')
        @show
        @section('scripts')
        @show
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
            @can('isStaff')
                @include('layouts/_navstaff')
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
