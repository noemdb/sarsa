{{-- INI dropdown-messages --}}
<a class="dropdown-toggle alert-info btn" data-toggle="dropdown" href="#">
        <i class="fa fa-tasks fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
        <span class="label label-info">{{ $tasks->where('estado','iniciada')->count() }}</span>        
</a>
<ul class="dropdown-menu dropdown-messages">
    <li>
        {{-- INI tasks-list panel --}}
        @component('elements.widgets.panel')
            @slot('badge',$tasks->where('estado','iniciada')->count())
            @slot('class','info')
            @slot('panelTitle', 'Nuevos')
            @slot('panelBody')
                @include('elements.widgets.tasks.list',[
                    'tasks'=>$tasks->where('estado','iniciada'),
                    'show_task'=>'true'
                    ])
            @endslot
        @endcomponent
        {{-- FIN tasks-list panel --}}
    </li>
</ul>
