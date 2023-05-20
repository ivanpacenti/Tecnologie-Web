{{-- pagina admin--}}
@section('title','PaginaAdmin')

@extends('layouts.pageLayout')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_design.css') }}">

    <body>
    <div class="maincontainer">
        <h1>Benvenuto nella pagina di gestione delle FAQ</h1>
        <a href="{{route("faqsCreate")}}" class="buttonbar-add"> Aggiungi una FAQ</a>
        @isset($faqs)
            @foreach($faqs as $faq)
                {{--                @if(!empty($faq->domanda)) QUESTO LO METTO PER VALERIA --}}
                <div class="main-box"> {{--contenitore per ogni singola faq--}}
                    <h2> FAQ numero: {{$faq->id}} </h2>
                    <div class="buttons-container">
                        <a href="{{"edit/".$faq['id']}}" class="buttonbar">
                            Modifica</a> {{--<button class="bottoneModifica">Modifica</button>--}}
                        <a href="{{"delete/".$faq['id']}}" class="buttonbar">
                            Elimina</a> {{--<button class="bottoneModifica">Modifica</button>--}}
                    </div>
                    <div class="upper-box">
                        <h2>Domanda:</h2>
                        <h4>{{$faq->domanda}}</h4>
                    </div>
                    <div class="inner-box">
                        <h2>Risposta:</h2>
                        <h4>{{$faq->risposta}}</h4>
                    </div>
                </div>
                {{--                @endif --}}
            @endforeach
        @else
            <h1>Non ci sono Faq </h1>
            <button class="Aggiungi">Aggiungine una Faq</button>
        @endisset()

    </div>
    </body>
@endsection('content')
