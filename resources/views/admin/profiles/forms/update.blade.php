<div class="panel panel-{{ $class_form_update_profile or 'default' }}" id="panel_profile_{{$profile->id or 'create'}}">

    <div class="panel-heading">Formulario para la edición del Usuario: <strong>{{$user->username}}</strong></div>

    <div class="panel-body">

      {{-- INI form --}}
      {!! Form::model($profile,['route' => ['profiles.update', $profile->id], 'method' => 'PUT', 'id'=>'form-update-profile_'.$profile->id, 'role'=>'form']) !!}
        
        {{ Form::hidden('id', $profile->id) }}

        {{ Form::hidden('user_id', $profile->user_id) }}

        @include('admin.profiles.forms.fields')

        <div align="center">

            <div class="form-group" data-rol="{{$profile->id}}">

                <button type="submit" class="btn-update-profile btn btn-warning btn-block" id="btn-update-profile-{{$profile->id}}">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                    Actualizar 
                </button>
                {{-- Mensaje flash sobreo operaciones con base de datos --}}
                <div class="div-alert alert alert-success hide" id="alert_result_ok_{{$profile->id or 'create'}}" role="alert" align="center"></div>

            </div>

        </div>
      
      {!! Form::close() !!}
      {{-- FIN form --}}
      
    </div>
</div>

@section('scripts')

    @parent

    <script src="{{ asset("js/models/profiles/update.js") }}"></script>

@endsection