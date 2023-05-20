
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <script src="js/scriptHome.js" async></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo_pub_design.css') }}" >
</head>
@isset($aziende)
    <form action="{{ route('filtroOfferte') }}" method="POST" id="formCheckbox">
        <!--  csfr passa il token della richiesta al controller-->
        @csrf
        <div class="checkboxprincipal">
            <div class="checktitle">Filtra per azienda</div>
            @foreach($aziende as $azienda)
                <label class="containercheck">{{$azienda->nome}}
                    <input class ="check" type="checkbox" value="{{ $azienda->id }}" id="{{ $azienda->id }}" name="aziende_selezionate[]">
                    <span class="checkmark">
                    </span>

                </label>
            @endforeach
            @endisset
        </div>
    </form>
</html>
