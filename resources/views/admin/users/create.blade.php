@extends('admin.layouts.dashboard.app')
{{-- @section('page_heading','Listado de Usuarios') --}}
@section('section')
{{-- @include('admin.modal.dialoge_confirm') --}}
{{-- @include('admin.modal.operok') --}}
{{-- @include('admin.modal.opernook') --}}
<div class="container-fluid">
    
    {{-- Mensaje flash sobreo operaciones con base de datos --}}
    @if (Session::has('operp_ok'))
        <div class="alert alert-success alert-dismissible show" role="alert" align="center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
            {{Session::get('operp_ok')}}.
        </div>
    @endif

    {{-- INI forms.create panel --}}
    @component('elements.widgets.panel')
        {{-- @slot('badge',$messeges->where('estado','No Visto')->count()) --}}
        @slot('class','navy')
        @slot('panelTitle', 'Usuarios Nuevos')
        @slot('panelBody')
            <!--INI -->
            @include('admin.users.forms.create',['class_form_create_user'=>'info'])
            <!--FIN -->
        @endslot
    @endcomponent
    {{-- FIN forms.create panel --}}
    
</div>

@endsection