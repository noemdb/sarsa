@extends('admin.layouts.dashboard.app')
{{-- @section('page_heading','Listado de Perfiles') --}}
@section('section')
{{-- @include('admin.modal.dialoge_confirm') --}}
{{-- @include('admin.modal.operok') --}}
{{-- @include('admin.modal.opernook') --}}
<div class="container-fluid">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                Listados de Perfiles Registrados<br>
                <small class="text-default">
                    <strong><span id="profile_counter">{{$profiles->count()}}</span> Perfiles</strong>
                </small>
                
                <div class="btn-group pull-right">
                    {{--
                    <a title="Crear nuevo Usuario" class="btn btn-primary" href="#" data-toggle="modal" data-target="#profile-create" role="button">
                        <i class="fa fa-id-card-plus" aria-hidden="true"></i>
                    </a>
                    --}}

                    <a title="Crear nuevo Usuario" class="btn btn-primary" href="{{ route('profiles.create') }}" role="button">
                        <i class="fa fa-id-card-plus" aria-hidden="true"></i>
                    </a>

                    {{--
                    <a title="Listado de Perfiles" class="btn btn-info" href="{{ route('profiles.index') }}" role="button">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    </a>
                    <a title="Eliminados" class="btn btn-danger" href="{{ route('profiles.trash') }}" role="button">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                    --}}

                </div>



            </h3>
        </div>

        <div class="panel-body">

            {{-- modal con el formulario para crear usuarios --}}
            {{-- @include('admin.profiles.modals.create') --}}
            
            {{-- Mensaje flash sobreo operaciones con base de datos --}}
            @if (Session::has('operp_ok'))
                <div class="alert alert-success alert-dismissible show" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    {{Session::get('operp_ok')}}.
                </div>
            @endif

            {{-- INI Barra de busqueda Filtros --}}
            {{-- @include('admin.profiles.partials.field_search',['route'=>'profiles.index']) --}}
            {{-- FIN Barra de busqueda Filtros --}}

            {{-- partial con el listado de los usuarios --}}
            @include('admin.profiles.table.list')

            {{-- botones de paginacon --}}
            {{--
            <div align="right">                        
                {{ $profiles->links() }}
            </div>
            --}}
        </div>
    </div>
</div>
{!! Form::open(['route' => ['profiles.destroy',':PROFILE_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'role'=>'form']) !!}
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
            $('#table-data-profile').DataTable({
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
    <script src="{{ asset("js/models/profiles/upgrade.js") }}"></script>
    <script src="{{ asset("js/models/profiles/delete.js") }}"></script>
    {{-- FIN script ajax json models --}}

@endsection