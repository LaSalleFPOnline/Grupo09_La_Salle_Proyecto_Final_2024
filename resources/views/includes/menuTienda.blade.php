<nav id="sidebar-tienda">
    <div class="sidebar-header">
        <h4 id="titulo-menu">Padel Booking</h4>
    </div>
    <ul class="list-unstyled">
        <p>Familias de artículos</p>
        <li>
            @foreach($familias as $familia)
            <ul>
                <a href="{{ route('listar_articulos_tienda', ['id' => $familia->id]) }}">{{ $familia->DescripcionFamilia }}</a>
            </ul>
            @endforeach          
            </ul>
        </li>
    </ul>
</nav>