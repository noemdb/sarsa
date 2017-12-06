<div class="sidebar-nav navbar-collapse" style="">
    <ul class="nav" id="side-menu">
        
        {{-- 
        <li>
            @include('admin.layouts.dashboard.sidebar.elements.profile')
        </li> 
        --}}

        @if(Auth::user()->getSetting('sidebar_search')=='true')
            <li class="sidebar-search">
                @include('admin.layouts.dashboard.sidebar.elements.sidebar-search')
            </li>
        @endif

        @if(Auth::user()->getSetting('sidebar_dashboard')=='true')
            <li {{ (Request::is('*dashboard*') ? 'class=active' : '') }}>
                <a href="{{ url ('admin/dashboard') }}"><i class="fa fa-dashboard fa-fw text-primary"></i> Dashboard</a>
            </li>
        @endif

        @if(Auth::user()->getSetting('sidebar_modelos')=='true')
            <li {{ (Request::is('*models*') ? ' aria-expanded=true class=active ' : '') }}>
                @include('admin.layouts.dashboard.sidebar.elements.models')
            </li>
        @endif

        @if(Auth::user()->getSetting('sidebar_chart')=='true')
            <li {{ (Request::is('*charts*') ? 'class=active' : '') }}>
                @include('admin.layouts.dashboard.sidebar.elements.charts')
            </li>
        @endif

        @if(Auth::user()->getSetting('sidebar_tables')=='true')
            <li {{ (Request::is('*tables*') ? 'class=active' : '') }}>
                @include('admin.layouts.dashboard.sidebar.elements.tables')
            </li>
        @endif

        @if(Auth::user()->getSetting('sidebar_forms')=='true')
            <li {{ (Request::is('*forms*') ? 'class=active' : '') }}>
                <a href="{{ url ('admin/forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a>
            </li>
        @endif
        
    </ul>
</div>
{{-- /.sidebar-collapse --}}