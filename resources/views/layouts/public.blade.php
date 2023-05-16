<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <script src="js/scriptHome.js" async></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home_design.css') }}" >
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
    <p>ciao questo è un footer di prova</p>
</footer>
</body>
</html>
