{{-- pagina admin--}}
@section('title','PaginaAdmin')

@extends('layouts.adminLayout')

@section('content')
<body>
<button class="AggiungiFaq">Aggiungi una faq</button>
    @isset($faqs)
        @foreach($faqs as $faq)
            <div class="main-box">
{{--                contenitore per ogni singola faq--}}
                <h2> Faq numero:{{$faq->id}} </h2>
                <div class="buttons-container">
                    <button class="bottoneModifica">Modifica</button>
                    <button class="bottoneModifica">Elimina</button>
                </div>
                <div class="upper-box">
                    <h2>Domanda:</h2>
                    <h4>{{$faq->domanda}}</h4>

                </div>
            <div class="inner-box">
                <h5>Risposta:</h5>
                <h6>{{$faq->risposta}}</h6>

        </div>
    </div>
</body>
        @endforeach
    @else
        <h1>Non ci sono Faq </h1>
        <button class="Aggiungi">Aggiungine una Faq</button>
    @endisset()

@endsection('content')