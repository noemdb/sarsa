<div class="sidebar-nav navbar-collapse" style="">
    <ul class="nav" id="side-menu">
        
        <li>
            @include('webmaster.layouts.dashboard.sidebar.elements.profile')
        </li>

        <li class="sidebar-search">
            @include('webmaster.layouts.dashboard.sidebar.elements.sidebar-search')
        </li>

        <li>
            <a href="{{ url ('webmaster/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </li>

        <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
            @include('webmaster.layouts.dashboard.sidebar.elements.charts')
        </li>

        <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
            @include('webmaster.layouts.dashboard.sidebar.elements.tables')
        </li>

        <li {{ (Request::is('*forms') ? 'class="active"' : '') }}>
            <a href="{{ url ('webmaster/forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a>
        </li>
        
        <li>
            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                    <a href="{{ url ('webmaster/panels') }}">Panels and Collapsibles</a>
                </li>
                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                    <a href="{{ url ('webmaster/buttons' ) }}">Buttons</a>
                </li>
                <li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>
                    <a href="{{ url('webmaster/notifications') }}">Alerts</a>
                </li>
                <li {{ (Request::is('*typography') ? 'class="active"' : '') }}>
                    <a href="{{ url ('webmaster/typography') }}">Typography</a>
                </li>
                <li {{ (Request::is('*icons') ? 'class="active"' : '') }}>
                    <a href="{{ url ('webmaster/icons') }}"> Icons</a>
                </li>
                <li {{ (Request::is('*grid') ? 'class="active"' : '') }}>
                    <a href="{{ url ('webmaster/grid') }}">Grid</a>
                </li>
                <li {{ (Request::is('*progressbars') ? 'class="active"' : '') }}>
                    <a href="{{ url ('webmaster/progressbars') }}">Progressbars</a>
                </li>
                <li {{ (Request::is('*collapse') ? 'class="active"' : '') }}>
                    <a href="{{ url ('webmaster/collapse') }}">Collapse</a>
                </li>
                <li {{ (Request::is('*stats') ? 'class="active"' : '') }}>
                    <a href="{{ url ('webmaster/stats') }}">Stats</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#">
                <i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="#">Second Level Item</a>
                </li>
                <li>
                    <a href="#">Second Level Item</a>
                </li>
                <li>
                    <a href="#">Third Level <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                    </ul>
                    <!-- /.nav-third-level -->
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#">
                <i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level">
                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                    <a href="{{ url ('admin/blank') }}">Blank Page</a>
                </li>
                <li>
                    <a href="{{ url ('admin/login') }}">Login Page</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li {{ (Request::is('*documentation') ? 'class="active"' : '') }}>
            <a href="{{ url ('admin/documentation') }}"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>
        </li>
    </ul>
</div>
<!-- /.sidebar-collapse -->