<div class="panel panel-{{ $class_form_create_profile or 'default' }}">
  <div class="panel-heading">Formulario para el Registro de Nuevo Perfil.</div>
  <div class="panel-body">
    {!! Form::open(['route' => 'profiles.store', 'method' => 'POST', 'id'=>'form-profile-create-'.$user->id]) !!}
    {{-- {{ csrf_field() }} --}}

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        {{-- partial con el formulario y campos --}}
        @include('admin.profiles.forms.fields')
      </div>
    </div>
    
    <div align="center">
        {{-- <div class="btn-group "> --}}

          <button type="submit" class="btn-profile-create btn btn-primary btn-block" value="create" data-user="{{$user->id}}">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
              Registrar 
          </button>
          <button type="reset" class="btn-profile-reset btn btn-warning btn-block" value="Reset">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
              Reset 
          </button>

        {{-- </div> --}}
        
    </div>
    {{-- </form> --}}
  {!! Form::close() !!}    
  </div>
</div>