<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>LaProj5 | @yield('title', 'Catalogo')</title>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <h1><a href="">ACME S.p.A </a></h1>
            <p>i migliori prodotti alla portata di un click</p>
        </div>
    </div>

    <!-- end #header -->
    <div id="menu">
        @include('layouts/_navuser')
    </div>

    <!-- end #menu -->
    <div id="page">
        <div id="page-bgtop">
            <div id="page-bgbtm">
                @yield('content')
                <div style="clear: both;">&nbsp;</div>
            </div>
        </div>
    </div>

</body>
</html>
