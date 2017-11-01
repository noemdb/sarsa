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
            <div class="col-lg-8 col-md-6 col-sm-8">

                {{-- INI chart con ajax-sql --}}
                @php ($id_chart='clinesqldashboard') {{--id de los elementos para generar el widget --}}
                @php ($urlapi='uservrstask') {{--Metodo api dentro de ChartController --}}
                @php ($tipo='cline') {{--Tipo de Chart --}}
                @component('elements.widgets.panel')
                    @slot('class', 'info')
                    @slot('panelControls', 'true')
                    @slot('id', $id_chart )
                    @slot('panelTitle', 'Tareas por Usuario')
                    @slot('panelBody')
                        @component('elements.charts.widgets.canvas')
                            @slot('ulpanel')
                                <ul class="nav nav-tabs ranges" data-canvas="{{ $id_chart }}" data-urlapi="{{ $urlapi }}" data-tipo="{{ $tipo }}">
                                    <li class="active"><a href="#">7 Días</a></li>
                                    <li><a href="#" data-range='30'>30 Días</a></li>
                                    <li><a href="#" data-range='90'>90 Días</a></li>
                                    <li><a href="#" data-range='180'>180 Días</a></li>
                                    {{-- <li><a href="#" data-range='360'>360 Días</a></li> --}}
                                </ul>
                            @endslot
                            @slot('id', $id_chart)
                        @endcomponent
                    @endslot
                @endcomponent
                {{-- FIN chart con ajax-sql --}}
            </div>
            <!-- /.col-lg-8 -->

            <div class="col-lg-4 col-md-6 col-sm-4">
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
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-8">

                {{-- INI chart2 con ajax-sql --}}
                @php ($id_chart2='clinesqldashboard_02') {{--id de los elementos para generar el widget --}}
                @php ($urlapi2='uservrstaskdone') {{--Metodo api dentro de ChartController --}}
                @php ($tipo2='cbar') {{--Tipo de Chart --}}
                @component('elements.widgets.panel')
                    @slot('class', 'info')
                    @slot('panelControls', 'true')
                    @slot('id', $id_chart2 )
                    @slot('panelTitle', 'Tareas Finalizadas por Usuario')
                    @slot('panelBody')
                        @component('elements.charts.widgets.canvas')
                            @slot('ulpanel')
                                <ul class="nav nav-tabs ranges" data-canvas="{{ $id_chart2 }}" data-urlapi="{{ $urlapi2 }}" data-tipo="{{ $tipo2 }}">
                                    <li class="active"><a href="#">7 Días</a></li>
                                    <li><a href="#" data-range='30'>30 Días</a></li>
                                    <li><a href="#" data-range='90'>90 Días</a></li>
                                    <li><a href="#" data-range='180'>180 Días</a></li>
                                    {{-- <li><a href="#" data-range='360'>360 Días</a></li> --}}
                                </ul>
                            @endslot
                            @slot('id', $id_chart2)
                        @endcomponent
                    @endslot
                @endcomponent
                {{-- FIN chart2 con ajax-sql --}}

                <canvas id="myChart" width="400" height="400"></canvas>

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

    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">

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

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

    {{-- INI data for linechart --}}
    <script>
 
        $(function() {

            //inicialización de la funcion ajax para obtener la data de la BD
            //(n.dias por defecto, id del elemento canvas para el chart, metodo del controlador)
            requestData(7,'{{ $id_chart }}','{{ $urlapi }}','{{ $tipo }}');
            requestData(7,'{{ $id_chart2 }}','{{ $urlapi2 }}','{{ $tipo2 }}');

            //Evento clic para el panel de tab nav-tabs (menu con las opciones)
            $('ul.ranges a').click(function(e){
                e.preventDefault();
                // Get the number of days from the data attribute
                var el = $(this);
                var days = $(this).data('range'); //alert(days);
                var ul = $(this).parents('ul');
                var canvas = ul.data('canvas'); //alert(canvas);
                var urlapi = ul.data('urlapi'); //alert(api);
                var tipo = ul.data('tipo'); //alert(api);

                // Request the data and render the chart using our handy function
                requestData(days,canvas,urlapi,tipo);
                // Make things pretty to show which button/tab the user clicked
                el.parent().addClass('active');
                el.parent().siblings().removeClass('active');                
            });

            // Create a function that will handle AJAX requests
            function requestData(days,canvas,urlapi,tipo){
                $.ajax({
                  type: "GET",
                  url: "{{url('admin/api/charts')}}/"+urlapi, // This is the URL to the API
                  data: { days: days }
                })
                .done(function( data ) {
                    if (document.getElementById(canvas)){
                        var apidata = JSON.parse(data);  console.log('apidata',apidata);
                        var cline = document.getElementById(canvas).getContext("2d");

                        console.log('labels',apidata.labels)
                        console.log('data',apidata.datasets[0].data)


                        var myChart = new Chart(cline, {
                        type: 'bar',
                        data: {
                            labels: apidata.labels,
                            datasets: [{
                                label: '# of Votes',
                                data: apidata.datasets[0].data,
                                // backgroundColor: [
                                //     'rgba(255, 99, 132, 0.2)',
                                //     'rgba(54, 162, 235, 0.2)',
                                //     'rgba(255, 206, 86, 0.2)',
                                //     'rgba(75, 192, 192, 0.2)',
                                //     'rgba(153, 102, 255, 0.2)',
                                //     'rgba(255, 159, 64, 0.2)'
                                // ],
                                // borderColor: [
                                //     'rgba(255,99,132,1)',
                                //     'rgba(54, 162, 235, 1)',
                                //     'rgba(255, 206, 86, 1)',
                                //     'rgba(75, 192, 192, 1)',
                                //     'rgba(153, 102, 255, 1)',
                                //     'rgba(255, 159, 64, 1)'
                                // ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });



                    }
                })
                .fail(function() {
                    console.log( "error occured" );
                });
            }

        });

    </script>
    {{-- FIN data for linechart --}}

@endsection
