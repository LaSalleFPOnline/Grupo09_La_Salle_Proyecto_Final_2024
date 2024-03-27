<nav id="sidebar">
    <div class="sidebar-header">
        <h4 id="titulo-menu">Padel Booking</h4>
    </div>
    <ul class="list-unstyled">
        <p>Panel de control</p>
        <li>
            <a href="#">Reservas</a>
        </li>
        <li>
            <a href="{{ route('listar_ventas') }}">Ventas</a>
        </li>
        <li>
            <a href="{{ route('listar_cobros') }}">Cobros</a>
        </li>
        <li>
            <a href="#Almacen" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Almacen</a>
            <ul class="collapse list-unstyled" id="Almacen">
                <li>
                    <a href="#">Almacén</a>
                </li>
                <li>
                    <a href="#">Stock</a>
                </li>
                <li>
                    <a href="#">Operaciones</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#Tablas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tablas</a>
            <ul class="collapse list-unstyled" id="Tablas">
                <li>
                    <a href="{{ route('listar_articulos') }}">Artículos</a>
                </li>
                <li>
                    <a href="{{ route('listar_familias') }}">Familias</a>
                </li>
                <li>
                    <a href="{{ route('listar_pistas') }}">Pistas</a>
                </li>
                <li>
                    <a href="{{ route('listar_usuarios') }}">Usuarios</a>
                </li>
                <li>
                    <a href="{{ route('editar_datos_generales') }}">Datos generales</a>
                </li>                
            </ul>
        </li>
    </ul>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
