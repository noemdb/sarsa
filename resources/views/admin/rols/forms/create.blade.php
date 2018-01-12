<div class="panel panel-{{ Session::get('class_panel') ? Session::get('class_panel') : 'info' }}" >

  <div class="panel-heading">

    Formulario para el Registro de Nuevo Rol. <strong>{{ $user->username or '' }}</strong>

    {{ $errors->has('finicial') ? ' has-error' : '' }}

    {{ $errors->first('finicial') }}

  </div>

  <div class="panel-body">

    <div class="well">

      {{-- <form> --}}
      {!! Form::open(['route' => 'rols.store', 'method' => 'POST', 'id'=>'form-rol-create-'. (isset($user->id)? $user->id : 'new')]) !!}

        @if(isset($user->id))

          {{ Form::hidden('user_id', $user->id) }}

        @else

          <div class="form-group div-form-input {{ $errors->has('user_id') ? ' has-error' : '' }}">

            <label for="user_id">Usuario</label>

            {!! Form::select('user_id',$user_list,old('user_id'),['class' => 'form-control','autofocus']); !!}
          
            <div class="div-alert-error alert alert-danger {{ $errors->has('user_id') ? 'show' : 'hide' }}" id="error_msg_user_id_{{$rol->id or 'create'}}" role="alert" align="center">
         
                {{ $errors->first('user_id') }}

            </div>

          </div>

        @endif

        {{-- partial con el formulario y campos --}}            
        @include('admin.rols.forms.fields')
        
        <button type="submit" class="btn-rol-create btn btn-primary btn-block" value="create" data-user="{{$user->id or 'create'}}">

            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>Registrar 

        </button>

        <button type="reset" class="btn-rol-reset btn btn-info btn-block" value="Reset">

            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Reset 

        </button>
        
      {!! Form::close() !!}
      {{-- </form> --}}

    </div>

  </div>   
  </div>
</div>