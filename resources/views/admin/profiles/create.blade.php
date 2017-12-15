@extends('admin.layouts.dashboard.app')
{{-- @section('page_heading','Listado de Usuarios') --}}
@section('section')
    {{-- @include('admin.modal.dialoge_confirm') --}}
    {{-- @include('admin.modal.operok') --}}
    {{-- @include('admin.modal.opernook') --}}
    <div class="container-fluid">
        
        {{-- INI Mensaje flash sobreo operaciones con base de datos --}}
        <div id="alert-result-oper" class="alert alert-success alert-dismissible {{ Session::get('operp_ok') ? 'show' : 'hide' }}" role="alert" align="center">
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button> --}}
            {{ Session::get('operp_ok') ? Session::get('operp_ok'): '' }}
        </div>
        {{-- FIN Mensaje flash sobreo operaciones con base de datos --}}
        
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                
               <h1>
                    Nuevos Perfiles

                    <div class="btn-group pull-right">
                        <a title="CRUD" class="btn btn-primary" href="{{ route('profiles.index') }}" role="button">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                    </div>

                </h1>
                @include('admin.profiles.forms.create',['class_form_create_profile'=>'info']) 
               
            </div>
        </div>

    </div>

@endsection