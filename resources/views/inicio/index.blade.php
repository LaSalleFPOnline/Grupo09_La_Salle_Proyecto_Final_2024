<html>
    <head>
        <link rel="stylesheet" href="{{ asset("public/css/inicio.css?version=1") }}">

    </head>
    <body>
        <h1 class="titulo">Padel Booking</h1>
        <a class="boton-acceso-admin" target="_blank" href="{{ route('controlpanel') }}">Acceso Admin</a>
        <a class="boton-tienda-online" target="_blank" href="{{ route('listar_pistas') }}">Tienda Online</a>
        <a class="boton-reservar-pista" target="_blank" href="{{ route('listar_pistas') }}">Reservar pistas</a>        
    </body>
    <footer>

    </footer>
</html>