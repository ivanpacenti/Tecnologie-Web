<link rel="stylesheet" type="text/css" href="{{ asset('css/form_design.css') }}" >

<h1>BEENVENUTO NELLA SEZIONE PER AGGIUNGERE UNA FAQ</h1>

{!! Form::open(['route' => 'faqsCreate2']) !!}
{!! Form::label('domanda', 'Domanda:') !!}
{!! Form::text('domanda', null, ['required']) !!} <br><br>
{!! Form::label('risposta', 'Risposta:') !!}
{!! Form::text('risposta', null, ['required']) !!} <br><br>
{!! Form::submit('Salva') !!}
{!! Form::close() !!}
