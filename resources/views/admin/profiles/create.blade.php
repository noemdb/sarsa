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
            <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                
               <h1>
                    Nuevos Perfiles

                    {{-- INI Menu rapido --}}
                    <div class="btn-group pull-right">

                        @include('admin.elements.buttons.profile-index')

                        @include('admin.elements.buttons.user-index')

                        @include('admin.elements.buttons.rol-index')       

                        @include('admin.elements.buttons.url-refresh')

                    </div>
                    {{-- FIN Menu rapido --}}

                </h1>
                
                @include('admin.profiles.forms.create',['class_form_create_profile'=>'info']) 

                <small id="profile_create_ok_{{$profile->id or 'create'}}" class="text text-weight text-right {{ Session::get('operp_ok') ? 'text-success show' : 'hide' }}" >
                    {{ Session::get('operp_ok') ? Session::get('operp_ok'): '' }}
                </small>
               
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    @parent

    <script src="{{ asset("js/models/profiles/create.js") }}"></script>

@endsection