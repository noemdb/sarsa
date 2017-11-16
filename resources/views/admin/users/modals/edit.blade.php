<!-- Modal -->
<div class="modal fade " id="edituser_modal_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header detail">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          {{-- <span class="ion-close-round" aria-hidden="true"></span> --}}
          <i class="fa fa-close" aria-hidden="true"></i>
        </button>

        <h5 class="modal-title" align="left" id="myModalLabel"><strong>Datos de Usuario</strong></h5>
      </div>

      @if($user->is_active=='Activo')
          <div class="modal-body panel panel-info">
      @else
          <div class="modal-body panel panel-danger">
      @endif

      {{-- <div class="modal-body" align="left"> --}}

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#edituser_tab_{{$user->id}}_general">Generales</a></li>
          <li><a data-toggle="tab" href="#edituser_tab_{{$user->id}}_other1">Perfíl</a></li>
          <li><a data-toggle="tab" href="#edituser_tab_{{$user->id}}_other2">Roles</a></li>
        </ul>

        <div class="tab-content">
          <div id="edituser_tab_{{$user->id}}_general" class="tab-pane fade in active">
            {{-- <h3>General</h3> --}}
            {{-- <br> --}}
            {{-- <div class="panel panel-info"> --}}

            <div id="edituser_tab_{{$user->id}}_form" class="tab-pane fade in active">

              <div class="panel panel-warning">
                <div class="panel-heading">Formulario para la edición del Usuario: <strong>{{$user->username}}</strong></div>
                <div class="panel-body">
                    {!! Form::model($user,['route' => ['crub.update', $user->id], 'method' => 'PUT', 'id'=>'form-update-user_'.$user->id, 'role'=>'form']) !!}
                      {{ csrf_field() }}
                      {{ Form::hidden('id', '', array('id' => 'id')) }}

                      @include('admin.users.partials.field')

                      <div align="center">
                          <div class="form-group">
                              <button type="submit" class="btn-update-user btn btn-warning" id="btn-update-user">
                                  <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                  Actualizar 
                              </button>
                          </div>
                      </div>
                    {{-- </form> --}}
                    {!! Form::close() !!}
                  </div>
                </div>
            </div>

              {{-- @include('admin.users.partials.user') --}}
            {{-- </div> --}}
          </div>
          <div id="edituser_tab_{{$user->id}}_other1" class="tab-pane fade">
            {{-- <h3>Menu 1</h3> --}}
            @include('admin.users.partials.profile')
          </div>
          <div id="edituser_tab_{{$user->id}}_other2" class="tab-pane fade">
            {{-- <h3>Menu 2</h3> --}}
            @include('admin.users.partials.rols')
          </div>
        </div>

      </div>
      {{--
      <div class="modal-footer">

      </div>
      --}}
    </div>
  </div>
</div>