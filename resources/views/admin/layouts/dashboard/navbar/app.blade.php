{{-- .navbar-header --}}
@include('admin.layouts.dashboard.navbar.elements.navbar-header')

<ul class="nav navbar-top-links navbar-right">

    {{-- <li> --}}

        {{-- boton para ocultar sidebar --}}
        {{-- @include('admin.layouts.dashboard.navbar.top-links.hide-sidebar') --}}

    {{-- </li> --}}

    
    <li class="dropdown">

        @include('admin.layouts.dashboard.navbar.elements.ajaxmessages')
        
    </li>

    <li class="dropdown">

        @include('admin.layouts.dashboard.navbar.elements.ajaxtasks')
        
    </li>

    <li class="dropdown">

        @include('admin.layouts.dashboard.navbar.elements.ajaxalerts')
        
    </li>


    <li class="dropdown">

        @include('admin.layouts.dashboard.navbar.elements.ajaxlogdbs')
        
    </li>

    <li class="dropdown">

        @include('admin.layouts.dashboard.navbar.elements.ajaxloginouts')
        
    </li>

    <li class="dropdown">

        @include('admin.layouts.dashboard.navbar.elements.user')
        
    </li>



</ul>
<!-- /.navbar-top-links -->

