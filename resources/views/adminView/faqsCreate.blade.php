<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_desing.css') }}" >

<h1>BEENVENUTO NELLA SEZIONE PER AGGIUNGERE UNA FAQ</h1>

<form method="post" action="{{ route('faqsCreate') }}">
    @csrf
    <label> Domanda:</label> <input type="text" name="domanda" > <br><br>
    <label> Risposta:</label> <input type="text" name="risposta" > <br><br>
    <button type="submit"> Salva</button>
</form>
