<h1>BEENVENUTO NELLA SEZIONE PER AGGIUNGERE UNA FAQ</h1>

<form method="post" action="{{ route('salvafaq') }}">
    @csrf
    <label> Domanda:</label> <input type="text" name="domanda" > <br><br>
    <label> Name:</label>
    <input type="text" name="risposta" placeholder="Inserisci la risposta" required> <br><br>
    <button type="submit"> Salva</button>
</form>
