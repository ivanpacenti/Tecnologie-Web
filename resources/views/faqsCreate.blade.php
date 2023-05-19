<h1>BEENVENUTO NELLA SEZIONE PER AGGIUNGERE UNA FAQ</h1>

<form method="POST" action="{{ route('faqsCreate') }}">
    @csrf
    <label> Domanda:</label> <input type="text" name="domanda" > <br><br>
    <label> Risposta:</label> <input type="text" name="risposta" > <br><br>
    <button type="submit"> Salva</button>
</form>
