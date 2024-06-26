<html>
    <head>
        @extends('includes.header')
        @section('extra-headers')
            <link rel="stylesheet" href="{{ asset("css/reset.css") }}">
            <link rel="stylesheet" href="{{ asset("css/inicio.css") }}">
        @endsection
    </head>
    <body>
        <div id="contenedor-imagen-fondo">
            <img id="imagen-fondo" src="{{ asset("img/imagen-fondo.jpg") }}">
            <div class="registro">
                <h2 class="titulo-pagina">Crea tu cuenta</h2>
                
                <form method="POST" action="/usuarios/registro">
                    @csrf
                    <input class="form-control" type="text" name="Nombre" placeholder="Introduce tu nombre">
                    <input class="form-control" type="email" name="Email" placeholder="Introduce tu email">
                    <input class="form-control" type="password" name="Password" placeholder="Introduce tu contrasena">
                    <input class="boton-hover" type="submit" value="Entrar">
                </form>
                <hr>
                <p>Ya tienes cuenta? <br><a href="/usuarios/login">Inicia sesion</a></p>
            </div>
        </div>
        <a href="/">
            <svg id="logo" version="1.0" xmlns="http://www.w3.org/2000/svg" width="200px" height="100px" viewBox="0 0 302.000000 378.000000" preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,378.000000) scale(0.100000,-0.100000)" fill="#FFFFFF" stroke="none">
                    <path d="M1335 3693 c-300 -39 -677 -199 -877 -373 -158 -136 -265 -302 -308
                    -475 -81 -321 11 -756 228 -1085 209 -316 631 -555 1131 -639 l94 -16 166
                    -456 c91 -251 177 -472 190 -491 128 -185 431 -89 431 136 0 47 -26 128 -165
                    510 -91 249 -165 456 -165 460 0 4 32 46 71 94 215 264 367 565 426 842 26
                    125 24 373 -4 500 -40 176 -153 430 -258 580 -149 212 -355 355 -576 400 -88
                    19 -290 25 -384 13z m305 -490 c153 -41 268 -165 370 -402 63 -146 82 -226 82
                    -355 1 -241 -99 -480 -316 -756 l-82 -105 -50 3 c-68 3 -301 64 -406 105 -333
                    132 -516 334 -604 668 -106 399 38 626 501 789 214 75 366 91 505 53z"/>
                </g>
            </svg>
            <h1 id="titulo">Padel Booking</h1>
        </a>
        <a class="boton-acceso-admin boton-hover" target="_blank" href="{{ route('controlpanel') }}">Acceso Admin</a>
        <div class="registro">
            <form action="usuarios/guardar">
                <input type="text" name="Nombre" placeholder="Introduce tu nombre">
                <input type="email" email="Email" placeholder="Introduce tu email">
                <input type="password" password="Password" placeholder="Introduce tu contraseña">
                <input type="text" name="IsAdmin" value="0" hidden>
                <input type="submit" value="Entrar">
            </form>
        </div>    
    </body>
    <footer>
        <p id="footer">Grupo 09 - La Salle - Proyecto Fin de Ciclo 2024</p>
    </footer>
</html>