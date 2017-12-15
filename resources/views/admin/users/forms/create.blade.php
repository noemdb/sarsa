<div class="panel panel-{{ $class_form_create_user or 'default' }}">
  <div class="panel-heading">Formulario para el Registro de Nuevo Usuario.</div>
  <div class="panel-body">
    {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'id'=>'form-user-create']) !!}
    {{-- {{ csrf_field() }} --}}

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        {{-- partial con el formulario y campos --}}
        @include('admin.users.forms.fields')
      </div>
    </div>
    
    <div align="center">
        <div class="btn-group">

          <button type="submit" class="btn-user-create btn btn-primary" value="create">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
              Registrar 
          </button>
          <button type="reset" class="btn-user-reset btn btn-warning" value="Reset">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
              Reset 
          </button>

        </div>
        
    </div>
    {{-- </form> --}}
  {!! Form::close() !!}    
  </div>
</div>

@section('scripts')
  
  @parent

  <script src="{{ asset("js/models/users/create.js") }}"></script>
    
@endsection