<!-- PAGINA CHE CONTIENE TUTTE LE FAQ -->
@section('title','Faq')

@extends('layouts.pageLayout')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

    <div class="listaFaq_cont">
        <div class="faq_title">
            <h1>FAQ</h1>
        </div>
        <div class="maincontainer">
            @isset($faqs)
                @foreach($faqs as $faq)
                    @if(!empty($faq->domanda))
                        <div class="main-box"> {{--contenitore per ogni singola faq--}}
                            <div class="upper-box">
                                <h4>{{$faq->domanda}}</h4>
                            </div>
                            <div class="inner-box">
                                <h4>{{$faq->risposta}}</h4>
                            </div>
                            <br>
                        </div>
                    @endif
                @endforeach
            @else
                <!-- <h1>Non ci sono Faq </h1> -->
                <button class="Visualizza altro">Visualizza altro</button>
            @endisset
        </div>
    </div>
@endsection('content')
