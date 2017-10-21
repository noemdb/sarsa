{{-- INI dropdown-messages --}}
<a class="dropdown-toggle alert-danger btn" data-toggle="dropdown" href="#">
    {{-- <span class="label label-danger"> --}}
        <i class="fa fa-user fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
        <span class="label label-danger">42</span>
    {{-- </span> --}}
</a>

<ul class="dropdown-menu dropdown-user">
    <li>
        <a href="#"><i class="glyphicon glyphicon-user"></i> User Profile</a>
    </li>
    <li>
        <a href="#"><i class="glyphicon glyphicon-wrench"></i> Settings</a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            <i class="glyphicon glyphicon-log-out"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
{{-- FIN dropdown-messages --}}