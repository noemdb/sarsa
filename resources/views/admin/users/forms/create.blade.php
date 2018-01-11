<div class="panel panel-{{ $class_form_create_user or 'info' }}">
  <div class="panel-heading">
    Formulario para el Registro de Nuevo Usuario.
    <br>
    <strong>
      <small>
        <span id="text-user-create-result-oper" class="hide text-success"></span>
      </small>
    </strong>
  </div>
  <div class="panel-body">
    
    <div class="well">
      {{-- INI form --}}
      {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'id'=>'form-user-create']) !!}
            
            {{-- partial con el formulario y campos --}}
            @include('admin.users.forms.fields')

            <button type="submit" class="btn-user-create btn btn-primary btn-block" value="create" data-id="create" id="create">

                <span class="glyphicon glyphicon-save" aria-hidden="true"></span>Registrar

            </button>

            <button type="reset" class="btn-user-reset btn btn-info btn-block" value="Reset">

                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Reset 

            </button>
      
      {!! Form::close() !!}    
      {{-- FIN form --}}

    </div>

  </div>
</div>