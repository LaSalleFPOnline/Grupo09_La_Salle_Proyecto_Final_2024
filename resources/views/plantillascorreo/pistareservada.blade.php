<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Correo de pista reservada</title>
        <link rel="stylesheet" href="{{ asset("assets/css/correos.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome-free/css/all.min.css") }}">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h3 style="margin-top: 40px; text-align: center">
                                    Hola, {{ $nombre }},
                                </h3>
                                <h3 style="margin-top: 40px; margin-bottom: 20px; text-align: center">
                                    Tienes reservada la pista {{ $pista }} para el {{ $fecha }} a las {{ $hora }}
                                </h3> 
                                <h3 style="margin-top: 40px; text-align: center">
                                    Para anular la reserva, 
                                    <a href="{{ $enlace }}" target="_blank" title="Eliminar reserva">Pulse aquí</a>
                                </h3>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>