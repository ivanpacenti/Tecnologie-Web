<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >
</head>

<body>
<header>
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
