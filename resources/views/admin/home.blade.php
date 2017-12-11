@extends('admin.layouts.dashboard.app')

{{-- 
@section('page_heading')
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard
        </h1>
    </div>
@endsection 
--}}

@section('section')

    @component('elements.widgets.panel')
        @slot('panelTitle', 'Dashboard')
        @slot('class', 'primary')
        @slot('panelBody')

        {{-- INI panelBody--}}
        <div class="row">
            <div class="col-sm-12">

                {{-- INI row card --}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        {{-- INI card-collapse mensajes --}}
                        @component('elements.widgets.card_collapse')
                            @slot('class', 'navy')
                            @slot('class_icon', 'fa fa-comments fa-5x')
                            @slot('total', $messeges->where('estado','No Visto')->count())
                            @slot('text', 'Nuevos Mensajes')
                            @slot('headercollapse', 'Mas detalles')
                            @slot('idcollapse', 'idnotificaciones1')
                            @slot('bodycollapse')
                                {{-- INI messeges-list panel --}}
                                @component('elements.widgets.panel')
                                    @slot('badge',$messeges->where('estado','No Visto')->count())
                                    @slot('class','info')
                                    @slot('panelTitle', 'Nuevos')
                                    @slot('panelBody')
                                        @include('elements.widgets.messeges.list',[
                                            'messeges'=>$messeges->where('estado','No Visto')->take(5),
                                            'show_messeges'=>'true'
                                            ])
                                    @endslot
                                @endcomponent
                                {{-- FIN messeges-list panel --}}
                            @endslot
                        @endcomponent
                        {{-- FIN card-collapse mensajes --}}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        {{-- INI card-collapse tasks --}}
                        @component('elements.widgets.card_collapse')
                            @slot('class', 'green')
                            @slot('class_icon', 'fa fa-tasks fa-5x')
                            @slot('total', $tasks->where('estado','iniciada')->count())
                            @slot('text', 'Tareas Pendientes')
                            @slot('headercollapse', 'Mas detalles')
                            @slot('idcollapse', 'idtareas1')
                            @slot('bodycollapse')
                                {{-- INI tasks-list --}}
                                @component('elements.widgets.panel')
                                    @slot('badge',$tasks->where('estado','iniciada')->count())
                                    @slot('class','success')
                                    @slot('panelTitle', 'Pendientes')
                                    @slot('panelBody')
                                        @include('elements.widgets.tasks.list',[
                                            'tasks'=>$tasks->where('estado','iniciada')->take(5),
                                            'show_task'=>'true'
                                            ])
                                    @endslot
                                @endcomponent
                                {{-- FIN tasks-list --}}
                            @endslot
                        @endcomponent
                        {{-- INI card-collapse tasks --}}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        {{-- INI card-collapse alert --}}
                        @component('elements.widgets.card_collapse')
                            @slot('class', 'yellow')
                            @slot('class_icon', 'fa fa-bell fa-5x')
                            @slot('total', $alerts->where('estado','No Visto')->count())
                            @slot('text', 'Alertas Pendientes')
                            @slot('headercollapse', 'Mas detalles')
                            @slot('idcollapse', 'idalertas1')
                            @slot('bodycollapse')
                                {{-- INI alert-list --}}
                                @component('elements.widgets.panel')
                                    @slot('badge',$alerts->where('estado','No Visto')->count())
                                    @slot('class','warning')
                                    @slot('panelTitle', 'Pendientes')
                                    @slot('panelBody')
                                        @include('elements.widgets.alerts.list',[
                                            'alerts'=>$alerts->where('estado','No Visto')->take(5),
                                            'show_alert'=>'true'
                                            ])
                                    @endslot
                                @endcomponent
                                {{-- FIN alert-list --}}
                            @endslot
                        @endcomponent
                        {{-- INI card-collapse alert --}}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        {{-- INI card-collapse logdb --}}
                        @component('elements.widgets.card_collapse')
                            @slot('class', 'red')
                            @slot('class_icon', 'fa fa-database fa-5x')
                            @slot('total', $logdbs->count())
                            @slot('text', 'LogBD Ult. 96H')
                            @slot('headercollapse', 'Mas detalles')
                            @slot('idcollapse', 'idlogdbs1')
                            @slot('bodycollapse')
                                {{-- INI alert-list --}}
                                @component('elements.widgets.panel')
                                    @slot('badge',$logdbs->count())
                                    @slot('class','danger')
                                    @slot('panelTitle', 'Últimas 96H')
                                    @slot('panelBody')
                                        @include('elements.widgets.logdbs.list',[
                                            'logdbs'=>$logdbs->take(5),
                                            'show_logdb'=>'true'
                                            ])
                                    @endslot
                                @endcomponent
                                {{-- FIN alert-list --}}
                            @endslot
                        @endcomponent
                        {{-- INI card-collapse logdb --}}
                    </div>
                </div>
                {{-- FIN row card --}}

                {{-- INI Chart --}}
                <div class="row">
                    <div class="col-sm-12">
                        
                        {{-- INI pill --}}
                        {{-- INI Menu pill --}}
                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#tabusuarios">Usuarios</a></li>
                          <li><a data-toggle="tab" href="#tabtareas">Tareas</a></li>
                          {{-- <li><a data-toggle="tab" href="#tabchart3">Tareas 2</a></li> --}}
                        </ul>
                        {{-- FIN Menu pill --}}

                        {{-- INI Content pill --}}
                        <div class="tab-content">
                            <div id="tabusuarios" class="tab-pane fade in active">
                                {{-- <h3>Tab 1</h3> --}}

                                {{-- INI row usuarios 1 --}}
                                <div class="row">
                                    {{-- INI chart Usuarios Conect./Desconet. --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @php ($chart = ['range'=>'Todos','id_chart'=>'chartusersconnect','urlapi'=>route('usersconnect'),'tipo'=>'bar','limit'=>6 ])
                                        @section('scripts')
                                            @parent
                                            {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
                                            <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                                        @endsection
                                        @component('elements.widgets.panel')
                                            @slot('class', 'success')
                                            @slot('panelControls', 'true')
                                            @slot('id', $chart['id_chart'] )
                                            @slot('panelTitle', 'Usuarios Conect./Desconet.')
                                            @slot('iconTitle', 'fa fa-bar-chart fa-lg')
                                            @slot('panelBody')
                                                @component('elements.charts.widgets.canvas')
                                                    @slot('id', $chart['id_chart'])
                                                @endcomponent
                                            @endslot
                                        @endcomponent
                                    </div>
                                    {{-- FIN chart Usuarios Conect./Desconet. --}}

                                    {{-- INI chart Usuarios Act/Des --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @php ($chart = ['range'=>'Todos','id_chart'=>'chartusersactive','urlapi'=>route('usersactive'),'tipo'=>'pie','limit'=>6 ])
                                        @section('scripts')
                                            @parent
                                            {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
                                            <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                                        @endsection
                                        @component('elements.widgets.panel')
                                            @slot('class', 'warning')
                                            @slot('panelControls', 'true')
                                            @slot('id', $chart['id_chart'] )
                                            @slot('panelTitle', 'Usuarios Act/Des')
                                            @slot('iconTitle', 'fa fa-pie-chart fa-lg')
                                            @slot('panelBody')
                                                @component('elements.charts.widgets.canvas')
                                                    @slot('ulpanel')
                                                        <ul class="nav nav-tabs ranges" data-canvas="{{ $chart['id_chart'] }}" data-urlapi="{{ $chart['urlapi'] }}" data-tipo="{{ $chart['tipo'] }}" data-limit="{{ $chart['limit'] }}">
                                                            <li class="active"><a href="#" data-range="10000">Todo</a></li>
                                                            <li title="365 Días"><a href="#" data-range='365'>365D</a></li>
                                                            <li title="90 Días"><a href="#" data-range='90'>90D</a></li>
                                                            <li title="30 Días"><a href="#" data-range='30'>30D</a></li>
                                                            <li title="7 Días"><a href="#" data-range='7'>7D</a></li>
                                                        </ul>
                                                    @endslot
                                                    @slot('id', $chart['id_chart'])
                                                @endcomponent
                                            @endslot
                                        @endcomponent
                                    </div>
                                    {{-- FIN chart Usuarios Act/Des --}}
                                </div>
                                {{-- FIN row usuarios 1 --}}

                                {{-- INI row usuarios 2 --}}
                                <div class="row">
                                    {{-- INI chart Usuarios por Mes --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @php ($chart = ['range'=>'Todos','id_chart'=>'chartusersmonth','urlapi'=>route('usersmonth'),'tipo'=>'line','limit'=>8 ])
                                        @section('scripts')
                                            @parent
                                            {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
                                            <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                                        @endsection
                                        @component('elements.widgets.panel')
                                            @slot('class', 'danger')
                                            @slot('panelControls', 'true')
                                            @slot('id', $chart['id_chart'] )
                                            @slot('panelTitle', 'N. Usuarios por Mes')
                                            @slot('iconTitle', 'fa fa-line-chart fa-lg')
                                            @slot('panelBody')
                                                @component('elements.charts.widgets.canvas')
                                                    @slot('ulpanel')
                                                        <ul class="nav nav-tabs ranges" data-canvas="{{ $chart['id_chart'] }}" data-urlapi="{{ $chart['urlapi'] }}" data-tipo="{{ $chart['tipo'] }}" data-limit="{{ $chart['limit'] }}">
                                                            <li class="active" title="Todo los datos"><a href="#" data-range='Todos'>Todos</a></li>
                                                            <li title="12 Meses"><a href="#" data-range='12'>12M</a></li>
                                                            <li title="9 Meses"><a href="#" data-range='9'>9M</a></li>
                                                            <li title="6 Meses"><a href="#" data-range='6'>6M</a></li>
                                                            <li title="3 Meses"><a href="#" data-range='3'>3M</a></li>
                                                        </ul>
                                                    @endslot
                                                    @slot('id', $chart['id_chart'])
                                                @endcomponent
                                            @endslot
                                        @endcomponent
                                    </div>
                                    {{-- FIN chart Usuarios por Mes --}}
                                </div>
                                {{-- FIN row usuarios 2 --}}

                            </div>
                            {{-- FIN row usuarios --}}

                            <div id="tabtareas" class="tab-pane fade">
                                {{-- <h3>Tab 2</h3> --}}

                                {{-- INI row tareas1 --}}
                                <div class="row">
                                    {{-- INI chart Tareas por Mes --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @php ($chart = ['range'=>'Todos','id_chart'=>'chartasksmonth','urlapi'=>route('taskmonth'),'tipo'=>'line','limit'=>8 ])
                                        @section('scripts')
                                            @parent
                                            {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
                                            <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                                        @endsection
                                        @component('elements.widgets.panel')
                                            @slot('class', 'info')
                                            @slot('panelControls', 'true')
                                            @slot('id', $chart['id_chart'] )
                                            @slot('panelTitle', 'Tareas por Mes')
                                            @slot('iconTitle', 'fa fa-line-chart fa-lg')
                                            @slot('panelBody')
                                                @component('elements.charts.widgets.canvas')
                                                    @slot('ulpanel')
                                                        <ul class="nav nav-tabs ranges" data-canvas="{{ $chart['id_chart'] }}" data-urlapi="{{ $chart['urlapi'] }}" data-tipo="{{ $chart['tipo'] }}" data-limit="{{ $chart['limit'] }}">
                                                            <li class="active" title="Todo los datos"><a href="#" data-range='Todos'>Todos</a></li>
                                                            <li title="12 Meses"><a href="#" data-range='12'>12M</a></li>
                                                            <li title="9 Meses"><a href="#" data-range='9'>9M</a></li>
                                                            <li title="6 Meses"><a href="#" data-range='6'>6M</a></li>
                                                            <li title="3 Meses"><a href="#" data-range='3'>3M</a></li>
                                                        </ul>
                                                    @endslot
                                                    @slot('id', $chart['id_chart'])
                                                @endcomponent
                                            @endslot
                                        @endcomponent
                                    </div>
                                    {{-- FIN chart Tareas por Mes --}}

                                    {{-- INI chart Tareas por Usuario --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @php ($chart = ['range'=>'Todos','id_chart'=>'clinesqldashboard','urlapi'=>route('uservrstask'),'tipo'=>'bar','limit'=>8 ])
                                        @section('scripts')
                                            @parent
                                            {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
                                            <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                                        @endsection
                                        @component('elements.widgets.panel')
                                            @slot('class', 'success')
                                            @slot('panelControls', 'true')
                                            @slot('id', $chart['id_chart'] )
                                            @slot('panelTitle', 'Tareas por Usuario. Ult.('.$chart['limit'].')')
                                            @slot('iconTitle', 'fa fa-bar-chart fa-lg')
                                            @slot('panelBody')
                                                @component('elements.charts.widgets.canvas')
                                                    @slot('ulpanel')
                                                        <ul class="nav nav-tabs ranges" data-canvas="{{ $chart['id_chart'] }}" data-urlapi="{{ $chart['urlapi'] }}" data-tipo="{{ $chart['tipo'] }}" data-limit="{{ $chart['limit'] }}">
                                                            <li title="Todos los Días" class="active"><a href="#" data-range='Todos'>Todo</a></li>
                                                            <li title="365 Días"><a href="#" data-range='365'>365D</a></li>
                                                            <li title="180 Días"><a href="#" data-range='180'>180D</a></li>
                                                            <li title="90 Días"><a href="#" data-range='90'>90D</a></li>
                                                            <li title="30 Días"><a href="#" data-range='30'>30D</a></li>
                                                            <li title="7 Días"><a href="#" data-range='7'>7D</a></li>
                                                        </ul>
                                                    @endslot
                                                    @slot('id', $chart['id_chart'])
                                                @endcomponent
                                            @endslot
                                        @endcomponent
                                    </div>
                                    {{-- FIN chart Tareas por Usuario --}}
                                </div>
                                {{-- FIN row tareas1 --}}

                                {{-- INI row tareas2 --}}
                                <div class="row">
                                    {{-- INI chart Tareas Asignadas --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @php ($chart = ['range'=>'Todos','id_chart'=>'clinesqldashboard_03','urlapi'=>route('uservrstaskasig'),'tipo'=>'pie','limit'=>6 ])
                                        @section('scripts')
                                            @parent
                                            {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
                                            <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                                        @endsection
                                        @component('elements.widgets.panel')
                                            @slot('class', 'warning')
                                            @slot('panelControls', 'true')
                                            @slot('id', $chart['id_chart'] )
                                            @slot('panelTitle', 'Tareas Asignadas .Ult.('.$chart['limit'].')')
                                            @slot('iconTitle', 'fa fa-pie-chart fa-lg')
                                            @slot('panelBody')
                                                @component('elements.charts.widgets.canvas')
                                                    @slot('ulpanel')
                                                        <ul class="nav nav-tabs ranges" data-canvas="{{ $chart['id_chart'] }}" data-urlapi="{{ $chart['urlapi'] }}" data-tipo="{{ $chart['tipo'] }}" data-limit="{{ $chart['limit'] }}">
                                                            <li class="active"><a href="#" data-range="10000">Todo</a></li>
                                                            <li title="365 Días"><a href="#" data-range='365'>365D</a></li>
                                                            <li title="90 Días"><a href="#" data-range='90'>90D</a></li>
                                                            <li title="30 Días"><a href="#" data-range='30'>30D</a></li>
                                                            <li title="7 Días"><a href="#" data-range='7'>7D</a></li>
                                                        </ul>
                                                    @endslot
                                                    @slot('id', $chart['id_chart'])
                                                @endcomponent
                                            @endslot
                                        @endcomponent
                                    </div>
                                    {{-- FIN chart Tareas Asignadas --}}

                                    {{-- INI chart Tareas Asignadas/Finalizadas --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @php ($chart = ['range'=>'Todos','id_chart'=>'clinesqldashboard_04','urlapi'=>route('uservrstaskdone'),'tipo'=>'line','limit'=>8 ])
                                        @section('scripts')
                                            @parent
                                            {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
                                            <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                                        @endsection
                                        @component('elements.widgets.panel')
                                            @slot('class', 'danger')
                                            @slot('panelControls', 'true')
                                            @slot('id', $chart['id_chart'] )
                                            @slot('panelTitle', 'Tareas Asig./Final. Ult.('.$chart['limit'].')')
                                            @slot('iconTitle', 'fa fa-area-chart fa-lg')
                                            @slot('panelBody')
                                                @component('elements.charts.widgets.canvas')
                                                    @slot('ulpanel')
                                                        <ul class="nav nav-tabs ranges" data-canvas="{{ $chart['id_chart'] }}" data-urlapi="{{ $chart['urlapi'] }}" data-tipo="{{ $chart['tipo'] }}" data-limit="{{ $chart['limit'] }}">
                                                            <li class="active"><a href="#" data-range="10000">Todo</a></li>
                                                            <li title="365 Días"><a href="#" data-range='365'>365D</a></li>
                                                            <li title="90 Días"><a href="#" data-range='90'>90D</a></li>
                                                            <li title="90 Días"><a href="#" data-range='30'>30D</a></li>
                                                            <li title="7 Días"><a href="#" data-range='7'>7D</a></li>
                                                        </ul>
                                                    @endslot
                                                    @slot('id', $chart['id_chart'])
                                                @endcomponent
                                            @endslot
                                        @endcomponent
                                    </div>
                                    {{-- FIN chart con Tareas Asignadas/Finalizadas --}}
                                </div>
                                {{-- FIN row tareas2 --}}                  

                            </div>
                        </div>
                        {{-- FIN Content pill --}}
                        {{-- FIN pill --}}
                    </div>
                </div>
                {{-- FIN Chart --}}

                {{-- INI row table --}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        {{-- INI alert-list --}}
                        {{-- @component('elements.widgets.panel') --}}
                            {{-- @slot('badge',$alerts->count()) --}}
                            {{-- @slot('class','warning') --}}
                            {{-- @slot('panelTitle', 'Alertas') --}}
                            {{-- @slot('panelBody') --}}
                                {{-- @include('elements.widgets.alerts.list',[ --}}
                                    {{-- 'alerts'=>$alerts->sortBy('id')->take(5), --}}
                                    {{-- 'show_alert'=>'true' --}}
                                    {{-- ]) --}}
                            {{-- @endslot --}}
                        {{-- @endcomponent --}}
                        {{-- FIN alert-list --}}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        {{-- INI chat panel --}}
                        {{-- @component('elements.widgets.panel') --}}
                            {{-- @slot('class','success') --}}
                            {{-- @slot('panelControls', 'true') --}}
                            {{-- @slot('id', 'chats') --}}
                            {{-- @slot('badge', '24') --}}
                            {{-- @slot('panelTitle') --}}
                                {{-- @include('elements.chats.header') --}}
                            {{-- @endslot --}}
                            {{-- @slot('panelBody') --}}
                                {{-- @include('elements.chats.panel') --}}
                            {{-- @endslot --}}
                            {{-- @slot('panelFooter') --}}
                                {{-- @include('elements.chats.footer') --}}
                            {{-- @endslot --}}
                        {{-- @endcomponent --}}
                        {{-- FIN chat panel --}}
                    </div>
                </div>
                {{-- FIN row table --}}
            </div>
        </div>
        {{-- FIN panelBody--}}
        
        @endslot
    @endcomponent

@endsection
{{-- FIN section--}}

@section('stylesheet')

    {{-- <link rel="stylesheet" href="{{ asset('css/timeline.css') }}"> --}}

@endsection

@section('scripts')
    @parent
    <script src="{{ asset("js/Chart.js") }}"></script>
    {{-- <script src="{{ asset("js/utils.js") }}"></script> --}}
    <script src="{{ asset("js/ChartFunction.js") }}"></script>{{-- Funciones para generar los Chart --}}

    {{-- INI funciones para generar los Chart --}}
    <script>
 
        //Evento clic para el panel de tab nav-tabs (menu con las opciones)
        $('ul.ranges a').click(function(e){
            e.preventDefault();
            // Get the number of range from the data attribute
            var el = $(this);
            var range = $(this).data('range'); //alert(range);
            var ul = $(this).parents('ul');
            var canvas = ul.data('canvas'); //alert(canvas);
            var api = ul.data('urlapi'); //alert(urlapi);
            var tipo = ul.data('tipo'); //alert(tipo);
            var limit = ul.data('limit'); //alert(limit);

            // Request the data and render the chart using our handy function
            requestData(range,canvas,api,tipo,limit);
            // Make things pretty to show which button/tab the user clicked
            el.parent().addClass('active');
            el.parent().siblings().removeClass('active');

        });

    </script>
    {{-- FIN funciones para generar los Chart --}}

@endsection
