{{-- INI dropdown-alerts --}}
<a class="dropdown-toggle alert-warning btn" data-toggle="dropdown" href="#">
        <i class="fa fa-bell fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
        <span class="label label-warning">{{ $alerts->where('estado','No Visto')->count() }}</span>        
</a>
<ul class="dropdown-menu dropdown-alerts">
    <li>
        {{-- INI alerts-list panel --}}
        @component('elements.widgets.panel')
            @slot('badge',$alerts->where('estado','No Visto')->count())
            @slot('class','warning')
            @slot('panelTitle', 'Nuevos')
            @slot('panelBody')
                @include('elements.widgets.alerts.list',[
                    'alerts'=>$alerts->where('estado','No Visto')->take(5),
                    'show_alert'=>'true'
                    ])
            @endslot
        @endcomponent
        {{-- FIN alerts-list panel --}}
    </li>
</ul>
