<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Correo de pista reservada</title>
        <link rel="stylesheet" href="{{ asset("css/email.css") }}">
    </head>
    <body>
        <svg id="logo-email" version="1.0" xmlns="http://www.w3.org/2000/svg" width="200px" height="100px" viewBox="0 0 302.000000 378.000000" preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,378.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
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
        <h1 id="titulo-email">Padel Booking</h1>
        <table id="tabla-email">
            <thead>
                <tr>
                    <th style="background-color: #F49100; color: #FFFFFF">
                        Hola, {{ $nombre }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3>
                            Tienes reservada la pista {{ $pista }} para el {{ $fecha }} a las {{ $hora }}
                        </h3> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 id="enlace-email" style="background-color: #F49100; color: #FFFFFF">
                            Para anular la reserva, 
                            <a href="{{ $enlace }}" target="_blank" title="Eliminar reserva">Pulse este enlace</a>
                        </h3>                             
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>