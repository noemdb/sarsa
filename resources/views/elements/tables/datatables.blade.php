@extends('admin.layouts.dashboard.app')

@section('page_heading','Tables')

@section('section')

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @include('admin.elements.tables.widgets.datatables', array('class'=>'table-striped table-bordered table-hover'))
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

@endsection

@section('stylesheet')

    <link rel="stylesheet" href="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables-responsive/dataTables.responsive.css') }}">

@endsection


@section('scripts')

    <script src="{{ asset("vendor/datatables/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("vendor/datatables-plugins/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ asset("vendor/datatables-responsive/dataTables.responsive.js") }}"></script>

    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                responsive: true,
                order: [[ 0, "desc" ]],
            });
        });
    </script>

@endsection