{{-- .navbar-header --}}
@include('admin.layouts.dashboard.navbar.elements.navbar-header')

<ul class="nav navbar-top-links navbar-right">

    <li>

        {{-- boton para ocultar sidebar --}}
        {{-- @include('admin.layouts.dashboard.navbar.top-links.hide-sidebar') --}}

    </li>

    <li class="dropdown">

        @include('admin.layouts.dashboard.navbar.elements.messages')
        
    </li>
    
    <li class="dropdown">

        @include('admin.layouts.dashboard.navbar.elements.tasks')

    </li>
    
    <li class="dropdown">

        @include('admin.layouts.dashboard.navbar.elements.alerts')

    </li>

    <li class="dropdown">
        
        @include('admin.layouts.dashboard.navbar.elements.user')

    </li>

</ul>
<!-- /.navbar-top-links -->