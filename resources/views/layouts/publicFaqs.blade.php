<!-- PAGINA CHE CONTIENE TUTTE LE FAQ -->
@section('title','FAQs')

@extends('layouts.pageLayout')

@section('content')

        <link rel="stylesheet" type="text/css" href="{{ asset('css/faq_design.css') }}">

                <h1>FAQs</h1>
                @isset($faqs)
                    @foreach($faqs as $faq)
                        @if(!empty($faq->domanda))
                            <div class="main-box_faq">
                                <div class="upper-box2">
                                    <h4>{{$faq->id}}. {{$faq->domanda}}</h4>
                                </div>
                                <div class="inner-box2">
                                    <h4 style="display: none;">{{$faq->risposta}}</h4>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                @endisset

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.upper-box2').click(function () {
                    $(this).siblings('.inner-box2').children('h4').toggle();
                });
            });
        </script>
@endsection


