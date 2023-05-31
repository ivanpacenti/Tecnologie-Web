<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>



        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/footer_design.css') }}" >

    <br>
        <div class="footercontainer1">
            <div class="section">
                <a href="{{route("index")}}">CHI SIAMO</a>

            </div>

            <div class="section">
                <a href="{{route("dovesiamo")}}">DOVE SIAMO?</a>
            </div>

            <div class="section">
                <ul>
                <li><a class="boh" href="mailto:coupon@gmail.com">coupon@gmail.com</a></li>
                <li>+39 335 89308426</li>
                </ul>
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


