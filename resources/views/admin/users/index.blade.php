@extends('admin.layouts.dashboard.app')
{{-- @section('page_heading','Listado de Usuarios') --}}
@section('section')
    {{-- @include('admin.modal.dialoge_confirm') --}}
    {{-- @include('admin.modal.operok') --}}
    {{-- @include('admin.modal.opernook') --}}
    <div class="container-fluid">

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>
                    Listados de Usuarios Registrados<br>
                    <small class="text-default">
                        <strong><span id="user_counter">{{$users->count()}}</span> Usuarios</strong>
                    </small>
                    
                    {{-- INI Menu rapido --}}
                    <div class="btn-group pull-right">

                        @include('admin.elements.buttons.user-create')

                        @include('admin.elements.buttons.profile-index')

                        @include('admin.elements.buttons.rol-index')

                        @include('admin.elements.buttons.url-refresh')

                    </div>
                    {{-- FIN Menu rapido --}}

                </h3>
            </div>

            <div class="panel-body">

                {{-- modal con el formulario para crear usuarios --}}
                @include('admin.users.modals.create')                    
                
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
                @include('admin.users.table.list')

            </div>
        </div>
    </div>

    {!! Form::open(['route' => ['users.destroy',':USER_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'role'=>'form']) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
    @parent

    {{-- INI script ajax json models --}}
    <script src="{{ asset("js/models/users/upgrade.js") }}"></script>
    <script src="{{ asset("js/models/users/delete.js") }}"></script>
    <script src="{{ asset("js/models/profiles/upgrade.js") }}"></script>
    <script src="{{ asset("js/models/profiles/create.js") }}"></script>
    {{-- FIN script ajax json models --}}

@endsection