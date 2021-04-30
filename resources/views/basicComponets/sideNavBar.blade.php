@section('sideNavBar')

<!-- -->
<a href="#" onclick="openSideNav()">
    <i class="fa fa-bars fa-lg" aria-hidden="true" id="iconOpenNav"></i>
</a>

<div class="sidenav" id="menuBar">
    <a href="#" onclick="closeSideNav()">
        <i class="fa fa-bars fa-lg" aria-hidden="true" id="iconCloseNav"></i>
    </a>
    <div class="navList">
        <ul>
            <li><a href="">Perfil</a></li>
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="">Acerca de...</a></li>
            <li><a href="{{ route('objects.list') }}">Lista</a></li>
            <li><a href="">Contacto</a></li>
        </ul>
    </div>
</div>

@endsection
