@extends('admin.layouts.dashboard.app')
{{-- @section('page_heading','Listado de Usuarios') --}}
@section('section')

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
 
                {{-- INI Mensaje flash sobreo operaciones con base de datos --}}
                {{-- <div id="alert-result-oper" class="alert alert-success alert-dismissible {{ Session::get('operp_ok') ? 'show' : 'hide' }}" profilee="alert" align="center"> --}}
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button> --}}
                    {{-- {{ Session::get('operp_ok') ? Session::get('operp_ok'): '' }} --}}
                {{-- </div> --}}
                {{-- FIN Mensaje flash sobreo operaciones con base de datos --}}

               <h1>
                    
                    Actualizar Perfíl

                    <div class="btn-group pull-right">

                        <a title="CRUD" class="btn btn-primary" href="{{ route('profiles.index') }}" role="button">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                        
                        <a title="Edición" class="btn btn-info" href="{{ route('profiles.edit',$profile->id) }}" profilee="button">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </a>

                    </div>

                </h1>

                @include('admin.profiles.forms.update')

                <small id="profile_update_ok_{{$profile->id or ''}}" class="text text-weight text-right {{ Session::get('operp_ok') ? 'text-success show' : 'hide' }}" >
                    {{ Session::get('operp_ok') ? Session::get('operp_ok'): '' }}
                </small>
               
            </div>
        </div>

    </div>

@endsection