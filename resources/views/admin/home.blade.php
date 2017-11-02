@extends('admin.layouts.dashboard.app')

@section('page_heading','Dashboard')

@section('section')

    {{-- /.row INI card--}}
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                {{-- INI card-collapse mensajes --}}
                @component('elements.widgets.card_collapse')
                    @slot('class', 'primary')
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
            <div class="col-lg-3 col-md-6 col-sm-6">
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
            <div class="col-lg-3 col-md-6 col-sm-6">
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
            <div class="col-lg-3 col-md-6 col-sm-6">
                {{-- INI card-collapse disponibles --}}
                @component('elements.widgets.card')
                    @slot('class', 'red')
                    @slot('class_icon', 'fa fa-support fa-5x')
                    @slot('total', '158')
                    @slot('text', 'Nuevas Tickets!')
                @endcomponent
                {{-- INI card-collapse disponibles --}}
            </div>
        </div>
         {{-- /.row FIN card --}}

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">

                {{-- INI chart Tareas por Usuario --}}
                @php ($chart = ['id_chart'=>'clinesqldashboard','api'=>'uservrstask','tipo'=>'bar','limit'=>8 ])
                @section('scripts')
                    @parent
                    <script> requestData(7,'{{ $chart['id_chart'] }}','{{ $chart['api'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                @endsection
                @component('elements.widgets.panel')
                    @slot('class', 'info')
                    @slot('panelControls', 'true')
                    @slot('id', $chart['id_chart'] )
                    @slot('panelTitle', 'Tareas por Usuario. Ult.('.$chart['limit'].')')
                    @slot('panelBody')
                        @component('elements.charts.widgets.canvas')
                            @slot('ulpanel')
                                <ul class="nav nav-tabs ranges" data-canvas="{{ $chart['id_chart'] }}" data-api="{{ $chart['api'] }}" data-tipo="{{ $chart['tipo'] }}" data-limit="{{ $chart['limit'] }}">
                                    <li class="active"><a href="#">7 Días</a></li>
                                    <li><a href="#" data-range='30'>30 Días</a></li>
                                    <li><a href="#" data-range='90'>90 Días</a></li>
                                    <li><a href="#" data-range='180'>180 Días</a></li>
                                    {{-- <li><a href="#" data-range='360'>360 Días</a></li> --}}
                                </ul>
                            @endslot
                            @slot('id', $chart['id_chart'])
                        @endcomponent
                    @endslot
                @endcomponent
                {{-- FIN chart Tareas por Usuario --}}

            </div>
            <!-- /.col-lg-8 -->

            <div class="col-lg-6 col-md-6 col-sm-12">

                {{-- INI chart Tareas por Mes --}}
                @php ($chart = ['id_chart'=>'chartasksmonth','api'=>'taskmonth','tipo'=>'line','limit'=>8 ])
                @section('scripts')
                    @parent
                    <script> requestData(7,'{{ $chart['id_chart'] }}','{{ $chart['api'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                @endsection
                @component('elements.widgets.panel')
                    @slot('class', 'info')
                    @slot('panelControls', 'true')
                    @slot('id', $chart['id_chart'] )
                    @slot('panelTitle', 'Tareas por Mes')
                    @slot('panelBody')
                        @component('elements.charts.widgets.canvas')
                            @slot('id', $chart['id_chart'])
                        @endcomponent
                    @endslot
                @endcomponent
                {{-- FIN chart Tareas por Mes --}}

            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                {{-- INI chart Tareas Asignadas --}}
                @php ($chart = ['id_chart'=>'clinesqldashboard_02','api'=>'uservrstaskasig','tipo'=>'line','limit'=>8 ])
                @section('scripts')
                    @parent
                    <script> requestData(7,'{{ $chart['id_chart'] }}','{{ $chart['api'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                @endsection
                @component('elements.widgets.panel')
                    @slot('class', 'info')
                    @slot('panelControls', 'true')
                    @slot('id', $chart['id_chart'] )
                    @slot('panelTitle', 'Tareas Asignadas .Ult.('.$chart['limit'].')')
                    @slot('panelBody')
                        @component('elements.charts.widgets.canvas')
                            @slot('ulpanel')
                                <ul class="nav nav-tabs ranges" data-canvas="{{ $chart['id_chart'] }}" data-api="{{ $chart['api'] }}" data-tipo="{{ $chart['tipo'] }}" data-limit="{{ $chart['limit'] }}">
                                    <li class="active"><a href="#">7 Días</a></li>
                                    <li><a href="#" data-range='30'>30 Días</a></li>
                                    <li><a href="#" data-range='90'>90 Días</a></li>
                                    <li><a href="#" data-range='180'>180 Días</a></li>
                                    {{-- <li><a href="#" data-range='360'>360 Días</a></li> --}}
                                </ul>
                            @endslot
                            @slot('id', $chart['id_chart'])
                        @endcomponent
                    @endslot
                @endcomponent
                {{-- FIN chart Tareas Asignadas --}}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                {{-- INI chart Tareas Asignadas/Finalizadas --}}
                @php ($chart = ['id_chart'=>'clinesqldashboard_03','api'=>'uservrstaskdone','tipo'=>'line','limit'=>8 ])
                @section('scripts')
                    @parent
                    <script> requestData(7,'{{ $chart['id_chart'] }}','{{ $chart['api'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
                @endsection
                @component('elements.widgets.panel')
                    @slot('class', 'success')
                    @slot('panelControls', 'true')
                    @slot('id', $chart['id_chart'] )
                    @slot('panelTitle', 'Tareas Asignadas/Finalizadas. Ult.('.$chart['limit'].')')
                    @slot('panelBody')
                        @component('elements.charts.widgets.canvas')
                            @slot('ulpanel')
                                <ul class="nav nav-tabs ranges" data-canvas="{{ $chart['id_chart'] }}" data-api="{{ $chart['api'] }}" data-tipo="{{ $chart['tipo'] }}" data-limit="{{ $chart['limit'] }}">
                                    <li class="active"><a href="#">7 Días</a></li>
                                    <li><a href="#" data-range='30'>30 Días</a></li>
                                    <li><a href="#" data-range='90'>90 Días</a></li>
                                    <li><a href="#" data-range='180'>180 Días</a></li>
                                    {{-- <li><a href="#" data-range='360'>360 Días</a></li> --}}
                                </ul>
                            @endslot
                            @slot('id', $chart['id_chart'])
                        @endcomponent
                    @endslot
                @endcomponent
                {{-- FIN chart con Tareas Asignadas/Finalizadas --}}
            </div>
        </div>
        <!-- /.row -->
                
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-8">
                {{-- INI alert-list --}}
                @component('elements.widgets.panel')
                    @slot('badge',$alerts->count())
                    @slot('class','warning')
                    @slot('panelTitle', 'Alertas')
                    @slot('panelBody')
                        @include('elements.widgets.alerts.list',[
                            'alerts'=>$alerts->sortBy('id')->take(5),
                            'show_alert'=>'true'
                            ])
                    @endslot
                @endcomponent
                {{-- FIN alert-list --}}
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                {{-- INI chat panel --}}
                @component('elements.widgets.panel')
                    @slot('class','success')
                    {{-- @slot('panelControls', 'true') --}}
                    @slot('id', 'chats')
                    @slot('badge', '24')
                    @slot('panelTitle')
                        @include('elements.chats.header')
                    @endslot
                    @slot('panelBody')
                        @include('elements.chats.panel')
                    @endslot
                    @slot('panelFooter')
                        @include('elements.chats.footer')
                    @endslot
                @endcomponent
                {{-- FIN chat panel --}}
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.col-sm-12 -->

@endsection

@section('stylesheet')

    {{-- <link rel="stylesheet" href="{{ asset('css/timeline.css') }}"> --}}

    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>

@endsection

@section('scripts')
    @parent
    <script src="{{ asset("js/Chart.js") }}"></script>
    <script src="{{ asset("js/utils.js") }}"></script>

    {{-- INI funciones para generar los Chart --}}
    <script>
 
        //Evento clic para el panel de tab nav-tabs (menu con las opciones)
        $('ul.ranges a').click(function(e){
            e.preventDefault();
            // Get the number of days from the data attribute
            var el = $(this);
            var days = $(this).data('range'); //alert(days);
            var ul = $(this).parents('ul');
            var canvas = ul.data('canvas'); //alert(canvas);
            var api = ul.data('api'); //alert(api);
            var tipo = ul.data('tipo'); //alert(api);
            var limit = ul.data('limit'); //alert(limit);

            // Request the data and render the chart using our handy function
            requestData(days,canvas,api,tipo,limit);
            // Make things pretty to show which button/tab the user clicked
            el.parent().addClass('active');
            el.parent().siblings().removeClass('active');

        });

        // Create a function that will handle AJAX requests
        function requestData(days,canvas,api,tipo,limit){
            var url = "{{url('admin/api/charts')}}/"+api+"?limit="+limit; //alert(url);
            $.ajax({
              type: "GET",
              url: url, // This is the URL to the API
              data: { days: days }
            })
            .done(function( data ) {

                //INI asegurar dibujar en un canvas nuevo para evitar solapamiento de chart
                $('#'+canvas).remove(); // elimina el canvas antiguo                   
                var newcanvas = document.createElement('canvas'); //console.log(newcanvas); //crea
                newcanvas.id  = canvas; //console.log(newcanvas); // 
                div = document.getElementById('div'+canvas); //console.log(div);
                div.appendChild(newcanvas);
                //FIN asegurar dibujar en un canvas nuevo para evitar solapamiento de chart

                var apidata = JSON.parse(data);  //console.log('apidata',apidata);
                var context = document.getElementById(canvas).getContext("2d");
                
                var myChart = new Chart(context, {
                    type: tipo,
                    data: apidata,
                    options: {
                        responsive: true,
                        scaleShowValues: true,
                        scales: {
                            yAxes: [{ ticks: { beginAtZero: true } }],
                            xAxes: [{ ticks: { autoSkip: false } }]
                        }
                    }
                });

            })
            .fail(function() {
                console.log( "error occured" );
            });
        }

    </script>
    {{-- FIN funciones para generar los Chart --}}

@endsection
