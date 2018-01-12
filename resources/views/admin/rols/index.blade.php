@extends('admin.layouts.dashboard.app')

{{-- @section('page_heading','Listado de Perfiles') --}}

@section('section')

<div class="container-fluid">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                Listados de Roles Registrados<br>
                <small class="text-default">
                    <strong><span id="profile_counter">{{$rols->count()}}</span> Roles</strong>
                </small>
                
                <div class="btn-group pull-right">

                    <a title="Crear nuevo Rol" class="btn btn-primary" href="{{ route('rols.create') }}" role="button">
                        <i class="fa fa-id-badge" aria-hidden="true"></i>
                    </a>

                </div>

            </h3>
        </div>

        <div class="panel-body">
            
            {{-- Mensaje flash sobreo operaciones con base de datos --}}
            @if (Session::has('operp_ok'))
                <div class="alert alert-success alert-dismissible show" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    {{Session::get('operp_ok')}}.
                </div>
            @endif

            {{-- partial con el listado de los usuarios --}}
            {{-- @php ($user = $rols->user) --}}
            @include('admin.rols.table.list')

        </div>
    </div>
</div>
{!! Form::open(['route' => ['rols.destroy',':PROFILE_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'role'=>'form']) !!}
{!! Form::close() !!}

@endsection

@section('stylesheet')
    @parent
    <link rel="stylesheet" href="{{ asset('vendor/datatables/DataTables-1.10.16/css/dataTables.bootstrap.css') }}">
@endsection


@section('scripts')
    @parent
    <script src="{{ asset("vendor/datatables/DataTables-1.10.16/js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("vendor/datatables/DataTables-1.10.16/js/dataTables.bootstrap.js") }}"></script>

    {{-- INI datatable --}}
    <script>
        $(document).ready(function() {
            $('#table-data-rols').DataTable({
                responsive: false,
                pageLength: {{ Auth::user()->getSetting('numregpag_profilelist') }},
                // order: [[ 0, "asc" ]],
                language: {
                    url: "{{ asset("vendor/datatables/lang/spanish.lang") }}"
                },
                 columnDefs: [ {
                      targets: 'no-sort',
                      orderable: false,
                } ]
            });
        });
    </script>
    {{-- FIN datatable --}}

    {{-- INI script ajax json models --}}
    {{-- <script src="{{ asset("js/models/roles/upgrade.js") }}"></script> --}}
    {{-- <script src="{{ asset("js/models/roles/delete.js") }}"></script> --}}
    {{-- <script src="{{ asset("js/models/users/upgrade.js") }}"></script> --}}
    {{-- FIN script ajax json models --}}

@endsection