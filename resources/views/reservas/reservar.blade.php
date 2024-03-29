<html>
    <head>
    <link rel="stylesheet" href="{{ asset("public/css/reset.css") }}">
    <link rel="stylesheet" href="{{ asset("public/css/inicio.css") }}">
    </head>
    <body>
        <div id="contenedor-imagen-fondo">
            <img id="imagen-fondo" src="{{ asset("public/img/imagen-fondo.jpg") }}">
        </div>
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
        <div id="pistas">
            <form action="#" method="POST">
                @csrf
                <table>
                    <thead>
                        <tr>
                            <th class="celda-nombre-pista">Hora</th>
                            @foreach($pistas as $pista)
                            <th class="celda-nombre-pista">{{ $pista->DescripcionPista }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($horario as $hora)
                        <tr>
                            <td class="celda-hora">{{ date('H:i', strtotime($hora->HoraDesde)) . " - " . date('H:i', strtotime($hora->HoraHasta)) }}</td>
                            @foreach($pistas as $pista)
                            <td class="celda-pista">{{ $pista->CodigoPista }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </body>
    <footer>
        <p id="footer">Grupo 09 - La Salle - Proyecto Fin de Ciclo 2024</p>
    </footer>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    
    $('.celda-pista').click(function() {
        event.preventDefault();
        var fila = $(this);
        var ruta = $(this).data('url');
        Swal.fire({
            title: '¿Quiere reservar esta pista?',
            text: " ",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Reservar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var param = {
                        '_method' : 'delete'
                    }
                    $.ajax({
                        type: 'POST',
                        url: ruta,
                        data: param,
                        success: function(response) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: 'La pista ha sido reservada correctamente',
                                showConfirmButton: false,
                                timer: 2500
                            })
                        }
                    });
                }
        })
    });
</script>