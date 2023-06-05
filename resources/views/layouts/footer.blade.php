<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/footer_design.css') }}" >
    <br>
        <div class="footercontainer1">
            <div class="section-footer">
                <a href="{{route("index")}}">CHI SIAMO</a>
            </div>

            <div class="section-footer">
                <a href="{{route("dovesiamo")}}">DOVE SIAMO?</a>
            </div>

            <div class="section-footer">
                CONTATTACI
                <p>+39 335 89308426</p>
                <p><a  href="mailto:coupon@gmail.com">coupon@gmail.com</a></p>
            </div>

            <div class="section-footer">
                <a href="{{route("visualizza_listafaq")}}"> FAQ</a>
            </div>
        </div>
</body>

</html>


