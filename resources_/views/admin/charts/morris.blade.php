@extends('admin.layouts.dashboard.app')

@section('page_heading','Charts')

@section('section')

    <div class="col-sm-12">

        <div class="row">
            <div class="col-sm-6">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Area Chart Example')
                    @slot('panelBody')
                        @include('admin.charts.widgets.morris-area-chart')
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Bar Chart Example')
                    @slot('panelBody')
                        @include('admin.charts.widgets.morris-bar-chart')
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>

        <div class="row">
            <div class="col-sm-6">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Donut Chart Example')
                    @slot('panelBody')
                        @include('admin.charts.widgets.morris-donut-chart')
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
            </div>
            <!-- /.col-sm-6 -->
        </div>

        <!-- /.row -->
    </div>


    <!-- /.col-sm-12 -->

@endsection


@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('vendor/morrisjs/morris.css') }}">
@endsection

@section('scripts')
    {{-- <script src="{{ asset("js/Chart.js") }}"></script> --}}
    <script src="{{ asset("vendor/raphael/raphael.min.js") }}"></script>
    <script src="{{ asset("vendor/morrisjs/morris.min.js") }}"></script>
    <script src="{{ asset("data/morris-data.js") }}"></script>
@endsection