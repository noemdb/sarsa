@extends('admin.layouts.dashboard.app')
{{-- @section('page_heading','Listado de Roles') --}}
@section('section')
    {{-- @include('admin.modal.dialoge_confirm') --}}
    {{-- @include('admin.modal.operok') --}}
    {{-- @include('admin.modal.opernook') --}}
    <div class="container-fluid">

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>
                    Listados de Roles Registrados<br>
                    <small class="text-default">
                        <strong><span id="rol_counter">{{$rols->count()}}</span> Roles</strong>
                    </small>

                    {{-- INI Menu rapido --}}
                    <div class="btn-group pull-right">

                        @include('admin.elements.buttons.rol-create')

                        @include('admin.elements.buttons.user-index')

                        @include('admin.elements.buttons.profile-index')        

                        @include('admin.elements.buttons.url-refresh')

                    </div>
                    {{-- FIN Menu rapido --}}

                </h3>
            </div>

            <div class="panel-body">
                
                {{-- INI Mensaje flash sobreo operaciones con base de datos --}}
                @if (Session::has('operp_ok'))
                    <div class="alert alert-success alert-dismissible show" role="alert" align="center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        {{Session::get('operp_ok')}}.
                    </div>
                @endif
                {{-- FIN Mensaje flash sobreo operaciones con base de datos --}}

                {{-- partial con el listado de los usuarios --}}
                {{-- @php ($user = $rols->user) --}}
                @include('admin.rols.table.list')

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    {{-- INI script ajax json models --}}
    {{-- <script src="{{ asset("js/models/roles/upgrade.js") }}"></script> --}}
    <script src="{{ asset("js/models/roles/delete.js") }}"></script>
    {{-- <script src="{{ asset("js/models/users/upgrade.js") }}"></script> --}}
    {{-- FIN script ajax json models --}}
@endsection