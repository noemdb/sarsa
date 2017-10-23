@extends('admin.layouts.dashboard.app')

@section('page_heading','Charts')

@section('section')

    <div class="col-sm-12">

        <div class="row">
            <div class="col-sm-6">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Line Chart')
                    @slot('panelBody')
                        @include('admin.charts.widgets.clinechart')
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Donut Chart')
                    @slot('panelBody')
                        <div style="max-width:400px; margin:0 auto;">@include('admin.charts.widgets.cdonutchart')</div>
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    
        <div class="row">
            <div class="col-sm-6">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Pie Chart')
                    @slot('panelBody')
                        @include('admin.charts.widgets.cpiechart')
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Bar Chart')
                    @slot('panelBody')
                        @include('admin.charts.widgets.cbarchart')
                    @endslot
                @endcomponent
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-sm-6">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Polar Chart')
                    @slot('panelBody')
                        @include('admin.charts.widgets.cpolar')
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Donut1 Chart')
                    @slot('panelBody')
                        @include('admin.charts.widgets.cdonut1')
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
@endsection