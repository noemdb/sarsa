@extends('admin.layouts.dashboard.app')

@section('page_heading','Charts')

@section('section')

    <div class="col-sm-12">

        <div class="row">
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('class', 'info')
                    @slot('panelControls', 'true')
                    @slot('id', 'clinedashboard')
                    @slot('panelTitle', 'Line Chart')
                    @slot('panelBody')
                        @component('admin.elements.charts.widgets.canvas')
                            @slot('id', 'clinedashboard')
                        @endcomponent
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('class', 'warning')
                    @slot('panelControls', 'true')
                    @slot('id', 'cdonutdashboard')
                    @slot('panelTitle', 'Donut Chart')
                    @slot('panelBody')
                        @component('admin.elements.charts.widgets.canvas')
                            @slot('id', 'cdonutdashboard')
                        @endcomponent
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    
        <div class="row">
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('class', 'danger')
                    @slot('panelControls', 'true')
                    @slot('id', 'cpiedashboard')
                    @slot('panelTitle', 'Pie Chart')
                    @slot('panelBody')
                        @component('admin.elements.charts.widgets.canvas')
                            @slot('id', 'cpiedashboard')
                        @endcomponent
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('class', 'success')
                    @slot('panelControls', 'true')
                    @slot('id', 'cbardashboard')
                    @slot('panelTitle', 'Bar Chart')
                    @slot('panelBody')
                        @component('admin.elements.charts.widgets.canvas')
                            @slot('id', 'cbardashboard')
                        @endcomponent
                    @endslot
                @endcomponent
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('class', 'info')
                    @slot('panelControls', 'true')
                    @slot('id', 'cpolardashboard')
                    @slot('panelTitle', 'Bar Chart')
                    @slot('panelTitle', 'Polar Chart')
                    @slot('panelBody')
                        @component('admin.elements.charts.widgets.canvas')
                            @slot('id', 'cpolardashboard')
                        @endcomponent
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('class', 'warning')
                    @slot('panelControls', 'true')
                    @slot('id', 'cdonut1dashboard')
                    @slot('panelTitle', 'Donut1 Chart')
                    @slot('panelBody')
                        @component('admin.elements.charts.widgets.canvas')
                            @slot('id', 'cdonut1dashboard')
                        @endcomponent
                    @endslot
                @endcomponent
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.col-sm-12 -->

@endsection


@section('stylesheet')
    {{-- <link rel="stylesheet" href="{{ asset('vendor/morrisjs/morris.css') }}"> --}}
@endsection

@section('scripts')
    @parent
    <script src="{{ asset("js/Chart.js") }}"></script>
    {{-- <script src="{{ asset("vendor/raphael/raphael.min.js") }}"></script>
    <script src="{{ asset("vendor/morrisjs/morris.min.js") }}"></script>
    <script src="{{ asset("data/morris-data.js") }}"></script> --}}
    
    {{-- INI data for linechart --}}
    <script>
        $(document).ready(function() {
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

            var pdata = [{
                    value: 300,
                    color: "#F7464A",
                    highlight: "#FF5A5E",
                    label: "Red"
                }, {
                    value: 50,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                }, {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "Yellow"
                }];
            if (document.getElementById("cpiedashboard")){
                var cpie = document.getElementById("cpiedashboard").getContext("2d");
                new Chart(cpie).Pie(pdata, { responsive: true });
            }

            var ddata = [{
                    value: 50,
                    color: "#F7464A",
                    highlight: "#FF5A5E",
                    label: "Red"
                }, {
                    value: 300,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                }, {
                    value: 160,
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "Yellow"
                }];
            if (document.getElementById("cdonutdashboard")){
                var cdonut = document.getElementById("cdonutdashboard").getContext("2d");
                new Chart(cdonut).Doughnut(ddata, { responsive: true });
            }

            var bdata = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    data: [130, 160, 95, 205, 170, 135, 200]
                }, {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    data: [85, 90, 160, 145, 180, 130, 195]
                }]

            };
            if (document.getElementById("cbardashboard")){
                var cbar = document.getElementById("cbardashboard").getContext("2d");
                new Chart(cbar).Bar(bdata, {
                    responsive: true
                });
            }

            var podata = [{
                value: 300,
                color: "#F7464A",
                highlight: "#FF5A5E",
                label: "Red"
            }, {
                value: 50,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Green"
            }, {
                value: 100,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Yellow"
            }, {
                value: 40,
                color: "#949FB1",
                highlight: "#A8B3C5",
                label: "Grey"
            }, {
                value: 120,
                color: "#4D5360",
                highlight: "#616774",
                label: "Dark Grey"
            }];
            if (document.getElementById("cpolardashboard")){
                var cpolar = document.getElementById("cpolardashboard").getContext("2d");
                new Chart(cpolar).PolarArea(podata, { responsive: true });
            }

            var ddata1 = [{
                value: 80,
                color: "#F7464A",
                highlight: "#FF5A5E",
                label: "Red"
            },
            {
                value: 100,
                color: "#29B6F6",
                highlight: "#4FC3F7",
                label: "blue"
            },
             {
                value: 300,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Green"
            }, {
                value: 160,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Yellow"
            }];
            if (document.getElementById("cdonut1dashboard")){
                var cdonut1 = document.getElementById("cdonut1dashboard").getContext("2d");
                new Chart(cdonut1).Doughnut(ddata1, { responsive: true });
            }


        });
    </script>
    {{-- FIN data for linechart --}}

@endsection