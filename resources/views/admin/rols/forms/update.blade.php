<div class="panel panel-{{ Session::get('class_panel') ? Session::get('class_panel') : 'info' }}" id="panel_rol_{{$rol->id or ''}}">

    <div class="panel-heading">Formulario para la edición del rol <b>ID{{$rol->id or ''}}</b> del usuario: <strong>{{$user->username or ''}}</strong></div>

    <div class="panel-body">

      {{-- INI form --}}
      {!! Form::model($rol,['route' => ['rols.update', $rol->id], 'method' => 'PUT', 'id'=>'form-update-rol_'.$rol->id, 'role'=>'form']) !!}
        
        {{ Form::hidden('id', $rol->id) }}

        {{ Form::hidden('user_id', $rol->user_id) }}

        @include('admin.rols.forms.fields')

        <div align="center">

            <div class="form-group" data-rol="{{$rol->id}}">

                <button type="submit" class="btn-update-rol btn btn-warning btn-block" id="btn-update-rol-{{$rol->id}}">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                    Actualizar 
                </button>
                {{-- Mensaje flash sobreo operaciones con base de datos --}}
                <div class="div-alert alert alert-success hide" id="alert_result_ok_{{$rol->id or 'create'}}" role="alert" align="center"></div>

            </div>

        </div>
      
      {!! Form::close() !!}
      {{-- FIN form --}}
      
    </div>
</div>

@section('scripts')

    @parent

    <script src="{{ asset("js/models/rols/update.js") }}"></script>

@endsection