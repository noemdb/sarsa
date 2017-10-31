@extends('admin.layouts.dashboard.app')

@section('page_heading','Dashboard')

@section('section')

    {{-- /.row INI card--}}
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-3 col-md-6">
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
            <div class="col-lg-3 col-md-6">
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
            <div class="col-lg-3 col-md-6">
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
            <div class="col-lg-3 col-md-6">
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
            <div class="col-lg-8">
                {{-- INI timeline --}}
                {{-- 
                @component('elements.widgets.panel')
                    @slot('panelTitle', 'Responsive Timeline')
                    @slot('panelControls', 'true')
                    @slot('id', 'timeline')
                    @slot('panelBody')
                         @include('elements.timeline')
                    @endslot
                @endcomponent
                --}}
                {{-- FIN timeline --}}

                {{-- INI chart con ajax-sql --}}
                @component('elements.widgets.panel')
                    @slot('class', 'info')
                    @slot('panelControls', 'true')
                    @slot('id', 'clinesqldashboard')
                    @slot('panelTitle', 'Tareas por Usuario')
                    @slot('panelBody')
                        @component('elements.charts.widgets.canvas')
                            @slot('id', 'clinesqldashboard')
                        @endcomponent
                    @endslot
                @endcomponent
                {{-- FIN chart con ajax-sql --}}
            </div>
            <!-- /.col-lg-8 -->

            <div class="col-lg-4">
                {{-- INI Line Chart panel --}}
                {{-- 
                @component('elements.widgets.panel')
                    @slot('panelTitle', 'Line Chart')
                    @slot('panelControls', 'true')
                    @slot('id', 'clinechart')
                    @slot('panelBody')
                        @component('elements.charts.widgets.canvas')
                            @slot('id', 'cline')
                        @endcomponent
                    @endslot
                @endcomponent
                --}}
                {{-- INI Line Chart panel --}}

                

                {{-- INI chart con ajax --}}
                {{-- 
                @component('elements.widgets.panel')
                    @slot('class', 'success')
                    @slot('panelControls', 'true')
                    @slot('id', 'clinedashboard')
                    @slot('panelTitle', 'Tareas por Mes')
                    @slot('panelBody')
                        @component('elements.charts.widgets.canvas')
                            @slot('id', 'clinedashboard')
                        @endcomponent
                    @endslot
                @endcomponent
                --}}
                {{-- FIN chart con ajax --}}

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
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection

@section('stylesheet')

    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">

@endsection

@section('scripts')
    @parent
    <script src="{{ asset("js/Chart.js") }}"></script>
    {{-- <script src="{{ asset("vendor/raphael/raphael.min.js") }}"></script> --}}
    {{-- <script src="{{ asset("vendor/morrisjs/morris.min.js") }}"></script> --}}
    {{-- <script src="{{ asset("data/morris-data.js") }}"></script> --}}

{{-- INI data for linechart --}}
    <script>
 
        $(function() {
          // Create a function that will handle AJAX requests
          function requestData(days){
            $.ajax({
              type: "GET",
              url: "{{url('admin/api/charts/uservrstask')}}", // This is the URL to the API
              data: { days: days }
            })
            .done(function( data ) {
                
                var apidata = JSON.parse(data);
                // console.log(apidata);
                // console.log(lineChartDataSQL);
        
                if (document.getElementById("clinesqldashboard")){
                    var cline = document.getElementById("clinesqldashboard").getContext("2d");
                    new Chart(cline).Line(apidata, {
                        responsive: true
                    });
                }
            })
            .fail(function() {
              // If there is no communication between the server, show an error
              console.log( "error occured" );
            });
          }
          
          var lineChartDataSQL = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "Tareas Asignadas",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(244, 204, 11, 1)",
                    data: [65, 59, 80, 209, 56, 55, 305]
                }]

            };
          // Request initial data for the past 7 days:
          requestData(7, lineChartDataSQL);
        });

        $(document).ready(function() {
            
            // requestData(7, 'chart');

            var lineChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(6, 197, 172, 1)",
                    data: [65, 59, 80, 209, 56, 55, 305]
                }, {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(244, 204, 11, 1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
                , {
                    label: "My third dataset",
                    fillColor: "rgba(103, 65, 114,0.2)",
                    strokeColor: "rgba(102, 51, 153,1)",
                    pointColor: "rgba(154, 18, 179)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(244, 204, 11, 1)",
                    data: [2, 6, 80, 228, 143, 53, 22]
                }]

            };

            if (document.getElementById("clinedashboard")){
                var cline = document.getElementById("clinedashboard").getContext("2d");
                new Chart(cline).Line(lineChartData, {
                    responsive: true
                });
            }

        });
    </script>
    {{-- FIN data for linechart --}}

@endsection
