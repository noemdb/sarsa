{{-- INI dropdown-messages --}}
<a class="dropdown-toggle alert-primary btn" data-toggle="dropdown" href="#">
    {{-- <span class="label label-primary"> --}}
        <i class="fa fa-comments fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
        <span class="label label-primary">{{ $messeges->where('estado','No Visto')->count() }}</span>        
    {{-- </span> --}}
</a>
<ul class="dropdown-menu dropdown-messages">
    <li>
        {{-- INI messeges-list panel --}}
        @component('elements.widgets.panel')
            @slot('badge',$messeges->where('estado','No Visto')->count())
            @slot('class','info')
            @slot('panelTitle', 'Nuevos')
            @slot('panelBody')
                @include('elements.widgets.messeges.list',['messeges'=>$messeges->where('estado','No Visto'),'show_messeges'=>'true'])
            @endslot
        @endcomponent
        {{-- FIN messeges-list panel --}}
    </li>
</ul>
