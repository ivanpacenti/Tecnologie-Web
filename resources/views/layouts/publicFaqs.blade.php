@section('title','Faq')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/faq_desing.css') }}" >

    <div class="listaFaq_cont">
       <!-- <div class="faq_title"> -->
        <h1>FAQ</h1>

       <!-- <div class="contenitore"> -->
    @isset($faqs)
            @foreach($faqs as $faq)
                @if(!empty($faq->domanda))
                <div class="faq_cont"> {{--contenitore per ogni singola faq--}}
                   <div class="questions-box">
                        <h4>{{$faq->domanda}}</h4>
                    </div>
                    <div class="answers-box">
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
   <!-- </div> -->
    </div>
@endsection('content')
