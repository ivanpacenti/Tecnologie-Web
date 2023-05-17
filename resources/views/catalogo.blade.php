@extends('layouts.public')

@section('title','Catalogo')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >
    
        <div class="checkboxprincipal">
            <div class="checktitle">Filtra per azienda</div>
            
            <label class="containercheck">One
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label class="containercheck">Two
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label class="containercheck">Three
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label class="containercheck">Four
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
        </div>

        <div class="container">

            <div class="container2">
            @isset($offerte)
                <h1>supa1<h1>
                @foreach($offerte as $offerta)
                <h1>supa2<h1>
                <div class="containerCoupon">
                    <div class="image">
                        <img src="{{ $offerta->immagine }}" alt="Imagine1" style="border-radius: 20px;" width=90% height=90%;>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            {{$offerta->descrizione}}
                        </div>

                        <div class="price">
                            funzionante
                        </div>
                    </div>
                </div>
                @endforeach

            @else
            <h1>supa di più<h1>
            @endisset()
                <!-- <div class="containerCoupon">
                    <div class="image">
                        <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine1" style="border-radius: 20px;" width=90% height=90%;>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            Coupon 2*3
                            
                        </div>

                        <div class="price">
                            prezzo scontato
                        </div>
                    </div>
                </div>

                <div class="containerCoupon">
                    <div class="image">
                        <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine1" style="border-radius: 20px;" width=90% height=90%;>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            Coupon 2*3
                            
                        </div>

                        <div class="price">
                            prezzo scontato
                        </div>
                    </div>
                </div>

                <div class="containerCoupon">
                    <div class="image">
                        <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine1" style="border-radius: 20px;" width=90% height=90%;>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            Coupon 2*3
                            
                        </div>

                        <div class="price">
                            prezzo scontato
                        </div>
                    </div>
                </div>

                <div class="containerCoupon">
                    <div class="image">
                        <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine1" style="border-radius: 20px;" width=90% height=90%;>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            Coupon 2*3
                            
                        </div>

                        <div class="price">
                            prezzo scontato
                        </div>
                    </div>
                </div>

                <div class="containerCoupon">
                    <div class="image">
                        <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine1" style="border-radius: 20px;" width=90% height=90%;>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            Coupon 2*3
                            
                        </div>

                        <div class="price">
                            prezzo scontato
                        </div>
                    </div>
                </div>

                <div class="containerCoupon">
                    <div class="image">
                        <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine1" style="border-radius: 20px;" width=90% height=90%;>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            Coupon 2*3
                            
                        </div>

                        <div class="price">
                            prezzo scontato
                        </div>
                    </div>
                </div>

                <div class="containerCoupon">
                    <div class="image">
                        <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine1" style="border-radius: 20px;" width=90% height=90%;>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            Coupon 2*3
                            
                        </div>

                        <div class="price">
                            prezzo scontato
                        </div>
                    </div>
                </div>

                <div class="containerCoupon">
                    <div class="image">
                        <img src="{{ asset('img/immagine_2.jpg') }}" alt="Imagine1" style="border-radius: 20px;" width=90% height=90%;>
                    </div>
                    <div class="containerCoupon2">
                        <div class="description">
                            Coupon 2*3
                            
                        </div>

                        <div class="price">
                            prezzo scontato
                        </div>
                    </div>
                </div>
            </div> -->
            
        </div>

@endsection('content')
