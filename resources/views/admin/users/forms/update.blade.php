<div class="panel panel-{{ Session::get('class_panel') ? Session::get('class_panel') : 'info' }}" id="panel_user_{{$user->id}}">
    
    <div class="panel-heading">
      Formulario para la edición del Usuario: <strong>{{$user->username}}</strong>
    </div>

    <div class="panel-body">
        {!! Form::model($user,['route' => ['users.update', $user->id], 'method' => 'PUT', 'id'=>'form-update-user_'.$user->id, 'role'=>'form']) !!}

          {{-- {{ csrf_field() }} --}}

          @include('admin.users.forms.fields')

          <div align="center">

              <div class="form-group" data-user="{{$user->id}}">

                  <button type="submit" class="btn-update-user btn btn-warning btn-block" id="btn-update-user-{{$user->id}}">
                      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                      Actualizar 
                  </button>

              </div>

          </div>
        
        {!! Form::close() !!}
        {{-- </form> --}}
    </div>
</div>

@section('scripts')

    @parent

    <script src="{{ asset("js/models/users/update.js") }}"></script>

@endsection