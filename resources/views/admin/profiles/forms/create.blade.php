<div class="panel panel-{{ $class_form_create_profile or 'default' }}" >
  <div class="panel-heading">
    Formulario para el Registro de Nuevo Perfil. <strong>{{ $user->username or '' }}</strong>
  </div>
  <div class="panel-body">

    {!! Form::open(['route' => 'profiles.store', 'method' => 'POST', 'id'=>'form-profile-create-'.$user->id]) !!}

    <div class="row">
      <div class="col-md-12">

        @if(isset($user->id))

          {{ Form::hidden('user_id', $user->id) }}

        @else

          <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
            <label for="user_id">Usuario</label>
            {!! Form::select('user_id',$user_list,old('user_id'),['class' => 'form-control']); !!}
          
            <div class="div-alert-error alert alert-danger {{ $errors->has('user_id') ? 'show' : 'hide' }}" id="error_msg_user_id_{{$profile->id or 'create'}}" role="alert" align="center">
         
                {{ $errors->first('user_id') }}

            </div>
          </div>

        @endif

        {{-- partial con el formulario y campos --}}       
        @include('admin.profiles.forms.fields')

        <button type="submit" class="btn-profile-create btn btn-primary btn-block" value="create" data-user="{{$user->id}}">
            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
            Registrar 
        </button>
        <button type="reset" class="btn-profile-reset btn btn-info btn-block" value="Reset">
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
            Reset 
        </button>

      </div>
    </div>
    
    {{-- </form> --}}
  {!! Form::close() !!}    
  </div>
</div>