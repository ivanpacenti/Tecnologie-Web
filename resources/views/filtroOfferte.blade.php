@extends('layouts.pageLayout')

@section('title','Catalogo')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >

    @isset($aziende)
        <form action="{{ route('filtroOfferte') }}" method="POST">
            <div class="checkboxprincipal">
                <div class="checktitle">Filtra per azienda</div>
                @foreach($aziende as $azienda)
                    <label class="containercheck">{{$azienda->nome}}
                        <input class ="check" type="checkbox" id="{{$azienda->nome}}" name="aziende_selezionate[]">
                        <span class="checkmark">
                    </span>

                    </label>
                @endforeach
                <button type="submit">Filtra</button>
                @endisset
            </div>
        </form>
        <div class="container">
            @isset($offerte)
                <div class="container2">
                    @foreach($offerte as $offerta)
                        <div class="containerCoupon" id="{{$aziende->find($offerta->emissione->azienda)->nome}}">
                            <div class="image">{{$aziende->find($offerta->emissione->azienda)->nome}}
                                <img src="{{ $offerta->immagine }}" alt="Imagine1" style="border-radius: 20px" width=90% height=90%>
                            </div>
                            <div class="containerCoupon2">
                                <div class="description">
                                    <div class="testocard">

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <h1>supa di più<h1>
                                @endisset

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



        @endsection('content')