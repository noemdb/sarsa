@extends('admin.layouts.dashboard.app')
{{-- @section('page_heading','Listado de Usuarios') --}}
@section('section')

    <div class="container-fluid">
        
        {{-- INI Mensaje flash sobreo operaciones con base de datos --}}
        <div id="alert-result-oper" class="alert alert-success alert-dismissible {{ Session::get('operp_ok') ? 'show' : 'hide' }}" role="alert" align="center">
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button> --}}
            {{ Session::get('operp_ok') ? Session::get('operp_ok'): '' }}
        </div>
        {{-- FIN Mensaje flash sobreo operaciones con base de datos --}}
        
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                
               <h1>
                    Nuevos Roles

                    <div class="btn-group pull-right">
                        <a title="CRUD" class="btn btn-primary" href="{{ route('rols.index') }}" role="button">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                    </div>

                </h1>
                
                @include('admin.rols.forms.create',['class_form_create_rol'=>'info']) 
               
            </div>
        </div>

    </div>

@endsection

@section('scripts')

    @parent

    <script src="{{ asset("js/models/rols/create.js") }}"></script>

@endsection