<div class="panel panel-{{ $class_form_update_profile or 'default' }}">
    <div class="panel-heading">Formulario para la edición del Usuario: <strong>{{$user->username}}</strong></div>
    <div class="panel-body">
        {!! Form::model($profile,['route' => ['profiles.update', $profile->id], 'method' => 'PUT', 'id'=>'form-update-profile_'.$profile->id, 'role'=>'form']) !!}
          
          {{ Form::hidden('id', '', array('id' => $profile->id)) }}

          @include('admin.profiles.forms.fields')

          <div align="center">
              <div class="form-group">
                  <button type="submit" class="btn-update-profile btn btn-warning btn-block" id="btn-update-profile-{{$profile->id}}">
                      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                      Actualizar 
                  </button>
              </div>
          </div>
        {{-- </form> --}}
        {!! Form::close() !!}
    </div>
</div>