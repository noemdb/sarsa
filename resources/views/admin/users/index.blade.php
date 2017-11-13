@extends('admin.layouts.dashboard.app')
@section('page_heading','Listado de Usuarios')
@section('section')
{{-- @include('admin.modal.dialoge_confirm') --}}
{{-- @include('admin.modal.operok') --}}
{{-- @include('admin.modal.opernook') --}}
<div class="container-fluid">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                Listados de Usuarios Registrados<br>
                <small class="text-default">{{$users->total()}} Usuarios</small>
                
                <div class="btn-group pull-right">
                    <a title="Crear nuevo Usuario" class="btn btn-primary" href="#" data-toggle="modal" data-target="#user-create" role="button">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </a>
                    {{--
                    <a title="Listado de Perfiles" class="btn btn-info" href="{{ route('profiles.index') }}" role="button">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    </a>
                    <a title="Eliminados" class="btn btn-danger" href="{{ route('users.trash') }}" role="button">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                    --}}
                </div>

            </h3>
        </div>

        <div class="panel-body">
            {{-- @include('admin.users.modal.createuser')                     --}}
            
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
            {{-- @include('admin.users.partials.field_search',['route'=>'users.index']) --}}
            {{-- FIN Barra de busqueda Filtros --}}

            {{-- partial con el listado de los usuarios --}}
            @include('admin.users.partials.table')

            {{-- botones de paginacon --}}
            <div align="right">                        
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
{!! Form::open(['route' => ['crub.destroy',':USER_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'role'=>'form']) !!}
{!! Form::close() !!}
@endsection