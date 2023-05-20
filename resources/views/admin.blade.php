{{-- pagina admin--}}
@section('title','PaginaAdmin')

@extends('layouts.pageLayout')

@section('content')
    <div class="Wrapper">

        <h1>
            BENVENUTO NELLA SEZIONE RISERVATA DEL SITO
        </h1>
        <div class="menu">
            <h3>Funzioni disponibili</h3>
            <details>
                <summary>Faq</summary>
                <div>
                    C.R.U.D delle faq
                </div>
            </details>
            <details>
                <summary>Statistiche</summary>
                <div>
                    Visualizzazione di diverse statiche, come visualizzazione numero coupon emessi
                </div>
            </details>
            <details>
                <summary>Aziende</summary>
                <div>
                    C.R.U.D. delle aziende
                </div>
            </details>
            <details>
                <summary>Staff</summary>
                <div>
                    Gestione e assegnazione compiti come membro senior
                </div>

            </details>
        </div>
    </div>
@endsection('content')

