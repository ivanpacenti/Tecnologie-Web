

<form method="post" action="{{ route('edit')}}" >
    @csrf
    <input type="text" name="id" placeholder="Input id" value="{{$faq['id']}}"> <br><br>
    <input type="text" name="Domanda" placeholder="inserisci domanda" value="{{$faq['domanda']}}"> <br><br>
    <input type="text" name="Risposta" placeholder="inserisci risposta"value="{{$faq['risposta']}}"> <br><br>
    <button type="submit"> AGGIORNA </button>
</form>