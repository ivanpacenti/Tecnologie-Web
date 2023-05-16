<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
    <head>
        <script src="js/scriptHome.js" async></script>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home_pub_design.css') }}" >
        <title>Home | @yield('title', 'Coupon')</title>
    </head>

    <body>
        <header>
            @include('layouts/_navpublic')
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            @include('layouts/footer')
        </footer>
    </body>
</html>
