@extends('admin.layouts.dashboard.app')

@section('page_heading','Charts')

@section('section')

    <div class="col-sm-12">

        <div class="row">
            <div class="col-sm-6">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Line Chart')
                    @slot('panelBody')
                        @include('admin.charts.widgets.flot-chart')
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
    <!-- jQuery -->
    <script src="{{ asset("vendor/jquery/jquery.min.js") }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset("vendor/bootstrap/js/bootstrap.min.js") }}"></script>

    {{-- <script src="{{ asset("js/Chart.js") }}"></script> --}}
    <script src="{{ asset("vendor/flot/jquery.flot.js") }}"></script>
    <script src="{{ asset("vendor/flot/jquery.flot.pie.js") }}"></script>
    <script src="{{ asset("vendor/flot/jquery.flot.resize.js") }}"></script>

    <script src="{{ asset("vendor/flot/jquery.flot.time.js") }}"></script>
    <script src="{{ asset("vendor/flot-tooltip/jquery.flot.tooltip.min.js") }}"></script>
    <script src="{{ asset("data/flot-data.js") }}"></script>
@endsection