@extends('layouts.pageLayout')

@section('title','Home')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home_pub_design.css') }}" >
    <div class="wrapper">
        <div class="container1">
            <div class="chisiamo">
                <h1 class="h1">Chi siamo?</h1>
                <div class="testochisiamo">
                    <p>Benvenuti nel sito dell'azienda di coupon!
                        Siamo specializzati in offrire ai nostri clienti una vasta gamma di coupon scontati su prodotti e servizi di alta qualità.
                        Il nostro sito web è progettato per garantire una facile navigazione, con una home page intuitiva che fornisce una panoramica sulle nostre aziende che mettono a disposizione i coupon.
                        Il nostro catalogo offre un'ampia selezione di offerte.
                        Se avete domande, controllate le nostre FAQ, troverete il collegamento in fondo alla pagina, dove troverete tutte le risposte alle domande più frequenti.
                        Siamo fieri di offrire i migliori prezzi sul mercato e di offrire ai nostri clienti un'esperienza di acquisto facile e conveniente.
                        Tuttavia, per mantenere i nostri prezzi bassi, non effettuiamo rimborsi su coupon acquistati.
                        ci raccomandiamo di stampare la pagina del coupon acquistato
                        Grazie per aver visitato il nostro sito web e speriamo che troverete offerte interessanti e convenienti che soddisfano le vostre esigenze.
                    </p>
                </div>
            </div>
        </div>

        <h1>LE NOSTRE AZIENDE</h1>
        <div class="wrapper">
            <div class="container-slide">
                <?php
                    $aziende=(new \App\Models\Azienda)->getAziende();
                    ?>
                @foreach($aziende as $azienda)
                <div class="slide fade">
                    <img src="{{$azienda->logo}}" alt="{{$azienda->nome}}">
                </div>
                @endforeach
            </div>
        </div>

    <div class="wrapper">
        <div>
        <h3> Siamo lieti di annunciare che abbiamo selezionato alcune aziende di eccellenza per la nostra collaborazione. Abbiamo dedicato tempo ed energie per identificare partner di alta qualità, che rispecchiano i nostri valori e obiettivi.
            Siamo fiduciosi che queste aziende saranno in grado di offrire prodotti e servizi di livello superiore.
            Per scoprire quali aziende abbiamo selezionato, ti invitiamo a fare clic <a href="{{asset('homeAziende')}}" class="buttonbar-add">qui</a>.</h3>
        </div>
        <script src="js/scriptHome.js" async></script>
    </div>
@endsection('content')
