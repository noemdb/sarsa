@extends('admin.layouts.dashboard.app')

@section('page_heading','Charts')

@section('section')

    <div class="col-sm-12">

        <div class="row">
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('panelTitle', 'Line Chart')
                    @slot('panelBody')
                        @include('admin.elements.charts.widgets.clinechart')
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('panelTitle', 'Donut Chart')
                    @slot('panelBody')
                        <div style="max-width:400px; margin:0 auto;">@include('admin.elements.charts.widgets.cdonutchart')</div>
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    
        <div class="row">
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('panelTitle', 'Pie Chart')
                    @slot('panelBody')
                        @include('admin.elements.charts.widgets.cpiechart')
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('panelTitle', 'Bar Chart')
                    @slot('panelBody')
                        @include('admin.elements.charts.widgets.cbarchart')
                    @endslot
                @endcomponent
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('panelTitle', 'Polar Chart')
                    @slot('panelBody')
                        @include('admin.elements.charts.widgets.cpolar')
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('admin.elements.widgets.panel')
                    @slot('panelTitle', 'Donut1 Chart')
                    @slot('panelBody')
                        @include('admin.elements.charts.widgets.cdonut1')
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

            if (typeof document.getElementById("cline")){
                var cline = document.getElementById("cline").getContext("2d");
                new Chart(cline).Line(lineChartData, {
                    responsive: true
                });
            }
        });
    </script>
    {{-- FIN data for linechart --}}

@endsection