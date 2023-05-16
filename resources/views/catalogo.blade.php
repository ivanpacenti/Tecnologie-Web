@extends('layouts.public')

@section('title','catalogo')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_design.css') }}" >
<!--menu a tendina dove escono le varie categorie disponibili-->
<div class="MenuTendina">
    <button class="BottoneMenu">CATEGORIE</button>
    <div class="dropdown-content">
        <a href="#">Sport</a>
        <a href="#">Moto</a>
        <a href="#">Cucina</a>
        <a href="#">Abbigliamento</a>
    </div>
</div>

<!--questo è un contenitore che contiene 3 div, in cui ci sono altri 2 div all'interno, il primo disposto in maniera flex
 il secondo disposto in colonna al suo interno-->

<h1 class="titolo">Hai scelto la categoria SPORT</h1>

<h2 class ="Titolo2"> AMAZON </h2>

<div class="DivSport">
    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine1" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon 2*3 </h2>
        </div>
    </div>

    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_3.jpg') }}" alt="Imagine2" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon  -20%  </h2>
        </div>
    </div>

    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine3" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon -10 euro </h2>
        </div>
    </div>

    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_3.jpg') }}" alt="Imagine3" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon  - 20 euro  </h2>
        </div>
    </div>

    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine3" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon 8*10t </h2>
        </div>
    </div>

    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_3.jpg') }}" alt="Imagine3" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon 2*1 </h2>
        </div>
    </div>
</div>

<h2 class="Titolo2"> GLOBO </h2>
<div class="DivSport">
    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine1" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon 2*3 </h2>
        </div>
    </div>

    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_3.jpg') }}" alt="Imagine2" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon  -20%  </h2>
        </div>
    </div>

    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine3" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon -10 euro </h2>
        </div>
    </div>

    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_3.jpg') }}" alt="Imagine3" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon  - 20 euro  </h2>
        </div>
    </div>

    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine3" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon 8*10t </h2>
        </div>
    </div>

    <div class="ContenitoreCoupon">

        <div class="Immagine">
            <img src="{{ asset('img/immagine_3.jpg') }}" alt="Imagine3" style="border-radius: 20px;">
        </div>

        <div class="Descrizione">
            <h2> Coupon 2*1 </h2>
        </div>
    </div>
</div>
@endsection('content')
