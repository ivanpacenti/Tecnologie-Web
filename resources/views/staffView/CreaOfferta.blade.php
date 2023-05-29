@extends('layouts.pageLayout')

@section('title', 'Staff | Create Offer')

@section('scripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $(function () {
        var actionUrl = "{{ route('CreaOfferta') }}";// definisce url a cui la richiesta di validazione va inviata
        var formId = 'CreaOfferta';
        // associa un endlear, appena l'utente sposta il cursone, blur è l'evento
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');// identifica l'id e poi attiva la funzione due elementi validation,
            doElemValidation(formElementId, actionUrl, formId);// gli passo l'id, l'url, e id form
        });
        // un altro endler
        $("#CreaOfferta").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId);
        });
    });
</script>

@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/form_design.css')}}" >

    {!! Form::open(['route' => 'CreaOfferta','id' => 'CreaOfferta', 'class' => 'form', 'files' => true]) !!}
    <h1>Aggiungi una nuova promozione</h1>

    <div class="form-group">
        {!! Form::label('modalità', 'Modalità') !!}
        {!! Form::text('modalità', null, ['class' => 'form-input', 'id' => 'modalità']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('', 'Descrizione') !!}
        {!! Form::text('', null, ['class' => 'form-input', 'id' => 'descrizione']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('dataInizio', 'Inizio') !!}
        {!! Form::date('dataInizio', null, ['class' => 'form-input-date', 'id' => 'dataInizio']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('dataFine', 'Scadenza') !!}
        {!! Form::date('dataFine', null, ['class' => 'form-input-date','id' => 'dataFine' ]) !!}

    </div>
    <div class="form-group">
        {!! Form::label('luogoFruizione', 'Luogo di fruizione') !!}
        {!! Form::text('luogoFruizione', null, ['class' => 'form-input','id' => 'luogoFruizione' ]) !!}

    </div>

    <div class="form-group">
        {!! Form::label('azienda', 'Azienda relativa') !!}
        {!! Form::select('azienda', $aziende, null, ['class' => 'form-input-select', 'id' => 'azienda']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('immagine', 'Immagine') !!}
        <div class="form-group-2">
            {!! Form::file('immagine', ['class' => 'form-file-input', 'id' => 'immagine']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Salva', ['class' => 'formbutton']) !!}
    </div>
    {!! Form::close() !!}
@endsection
