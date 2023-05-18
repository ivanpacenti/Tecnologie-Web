<h1>BEENVENUTO NELLA SEZIONE PER AGGIUNGERE UNA FAQ</h1>

<form method="post" action="{{ route('salvafaq') }}">
    @csrf
    <label> Domanda:</label> <input type="text" name="domanda" > <br><br>
    <label> Risposta:</label><input type="text" name="risposta" > <br><br>
    <button type="submit"> Salva</button>
</form>
