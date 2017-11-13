{{-- INI dropdown-messages --}}
<a class="dropdown-toggle alert-primary btn" data-toggle="dropdown" href="#">
    {{-- <span class="label label-danger"> --}}
        <i class="fa fa-gears fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
        {{-- <span class="label label-danger">42</span> --}}
    {{-- </span> --}}
</a>

<ul class="dropdown-menu dropdown-user">

    <li class="sidebar-profile">
        @include('admin.layouts.dashboard.sidebar.elements.profile')
    </li>
    <li class="divider"></li>
    <li>
        <a href="#"><i class="glyphicon glyphicon-user"></i> Perfil de Usuario</a>
    </li>
    <li>
        <a href="#"><i class="glyphicon glyphicon-wrench"></i> Configuración</a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            <i class="glyphicon glyphicon-log-out"></i> Salir
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
{{-- FIN dropdown-messages --}}