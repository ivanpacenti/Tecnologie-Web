{{-- pagina admin--}}
@section('title','PaginaAdmin')

@extends('layouts.adminLayout')

@section('content')
<body>
    @isset($faqs)
        @foreach($faqs as $faq)
            <div class="main-box">
                <div class="upper-box">
                    <h3>Domanda:</h3>
                    <h5>{{$faq->domanda}}</h5>
                </div>

            <div class="inner-box">
                <h5>Risposta:</h5>
                <h6>{{$faq->risposta}}</h6>

        </div>
    </div>
</body>
        @endforeach
    @else
        <h1>NON funzionaaaaaaaaaaaa</h1>
    @endisset()

@endsection('content')
