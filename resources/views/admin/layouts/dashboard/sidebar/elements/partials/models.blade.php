<li>
    <a href="#">
        <i class="fa fa-{{$icon or 'asterisk'}} text-{{$class or 'default'}}" aria-hidden="true"> </i>
        {{$titulo or 'default'}}<span class="fa arrow"></span>
    </a>
    <ul class="nav nav-third-level">
        @if(Auth::user()->getSetting('sidebar_'.$models.'_crud')=='true')
            <li>
                <a href="{{ url ('admin/models/'.$models) }}">
                    <i class="fa fa-list text-purple" aria-hidden="true"> </i>
                    CRUD
                </a>
            </li>
        @endif
        @if(Auth::user()->getSetting('sidebar_'.$models.'_chart')=='true')
        <li>
            <a href="{{ url ('admin/models/'.$models.'/chart') }}">
                <i class="fa fa-pie-chart text-teal" aria-hidden="true"> </i>
                Gráficas
            </a>
        </li>
        @endif
    </ul>
    <!-- /.nav-third-level -->
</li>