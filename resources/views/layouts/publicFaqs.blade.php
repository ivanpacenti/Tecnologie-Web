<!-- PAGINA CHE CONTIENE TUTTE LE FAQ -->
@section('title','FAQs')

@extends('layouts.pageLayout')

@section('content')

        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}">

            <div class="maincontainer">
                <h1>FAQs</h1>
                @isset($faqs)
                    @foreach($faqs as $faq)
                        @if(!empty($faq->domanda))
                            <div class="main-box">
                                <div class="upper-box">
                                    <h4>{{$faq->id}}.{{$faq->domanda}}</h4>
                                </div>
                                <div class="inner-box">
                                    <h4 style="display: none;">{{$faq->risposta}}</h4>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <button class="Visualizza-altro">Visualizza altro</button>
                @endisset
            </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.upper-box').click(function () {
                    $(this).siblings('.inner-box').children('h4').toggle();
                });
            });
        </script>
@endsection


