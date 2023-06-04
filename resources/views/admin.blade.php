{{-- pagina admin--}}
@section('title','Admin | Profile')

@extends('layouts.pageLayout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

    <div class="maincontainer">
        <h1>
            BENVENUTO NELLA SEZIONE RISERVATA
        </h1>

        <details>
            <summary>Faq</summary>
            <div>
                Gestione delle FAQs
            </div>
        </details>
        <details>
            <summary>Aziende</summary>
            <div>
                Gestione delle aziende
            </div>
        </details>
        <details>
            <summary>Staff</summary>
            <div>
                Gestione dello staff
            </div>
        </details>
        <details>
            <summary>Statistiche</summary>
            <div>
                Visualizzazione delle statistiche
            </div>
        </details>
    </div>
@endsection('content')

