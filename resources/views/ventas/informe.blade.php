<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Listado de ventas</title>
    </head>
    <body>
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="200px" height="100px" viewBox="0 0 302.000000 378.000000" preserveAspectRatio="xMidYMid meet">
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
        <h1>Lista de ventas</h1>
        <table>
            <thead>
                <tr>
                    <th style="text-align:right"><h1>Listado de ventas</h1></th>    
                </tr>
            </thead>
        </table>
        <table style="width:100%; border-collapse: collapse">
            <thead>
                <tr style="border: 1px solid black">
                    <th style="border: 1px solid black; text-align: center">Codigo de venta</th>
                    <th style="border: 1px solid black; text-align: center">Línea</th>
                    <th style="border: 1px solid black; text-align: center">Cliente</th>
                    <th style="border: 1px solid black; text-align: center">Artículo</th>
                    <th style="border: 1px solid black; text-align: center">Reserva</th>
                    <th style="border: 1px solid black; text-align: center">Precio</th>
                    <th style="border: 1px solid black; text-align: center">Unidades</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                    <tr style="border: 1px solid black">
                        <td style="border: 1px solid black; text-align: center">{{ $venta->VentaId }}</td>
                        <td style="border: 1px solid black; text-align: center">{{ $venta->Linea }}</td>
                        <td style="border: 1px solid black; text-align: center">{{ $venta->UserId }}</td>
                        <td style="border: 1px solid black; text-align: center">{{ $venta->ArticuloId }}</td>
                        <td style="border: 1px solid black; text-align: center">{{ $venta->ReservaId }}</td>
                        <td style="border: 1px solid black; text-align: center">{{ number_format($venta->Precio, 2, ',', '.') }} €</td>
                        <td style="border: 1px solid black; text-align: center">{{ $venta->Unidades }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>