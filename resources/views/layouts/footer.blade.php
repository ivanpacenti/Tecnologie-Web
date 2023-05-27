<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>



        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/footer_design.css') }}" >

    <br>
        <div class="footercontainer1">
            <div class="section">
                CHI SIAMO

            </div>

            <div class="section">
                <a href="{{route("dovesiamo")}}">DOVE SIAMO?</a>
            </div>

            <div class="section">
                CONTATTACI
                <br>coupon@gmail.com
                <br>+39 335 89308426
            </div>
            <div class="section">
                <a href="{{route("visualizza_listafaq")}}"> FAQ</a>

            </div>
            </div>
                    </div>
                </div>
            </div>
</body>

</html>


