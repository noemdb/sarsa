<!-- Modal -->
<div class="modal fade" id="user-create" role="dialog">
  <div class="modal-dialog" role="document">
  
    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        

        

            <div class="panel panel-info">
              <div class="panel-heading">Formulario para el Registro de Nuevo usuario.</div>
              <div class="panel-body">
                {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'id'=>'form-user-create', 'role'=>'form']) !!}
                {{ csrf_field() }}

                {{-- partial con el formulario y campos --}}
                @include('admin.users.forms.fields')
                <div align="center">
                    <div class="btn-group">
                        <button type="submit" class="btn-user-create btn btn-primary" value="create" id="create">
                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                            Registrar 
                        </button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                          {{-- <i class="fa fa-close" aria-hidden="true"></i> --}}
                          Cerrar
                        </button>
                    </div>
                </div>
                {{-- </form> --}}
              {!! Form::close() !!}    
              </div>
            </div>

                      



        

      </div>
      {{-- 
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      --}}
    </div>
    
  </div>
</div>