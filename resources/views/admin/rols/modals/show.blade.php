<!-- Modal -->
<div class="modal fade " id="showrol_modal_{{ $rol->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_rol_{{ $rol->id }}">

  <div class="modal-dialog" role="document">

    <div class="modal-content">
      
      <div class="modal-header detail">

        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">

          {{-- <span class="ion-close-round" aria-hidden="true"></span> --}}
          <i class="fa fa-close" aria-hidden="true"></i>

        </button>

        <h4 class="modal-title" align="left" id="myModalLabel_rol_{{ $rol->id }}"><strong>Datos del Rol</strong></h4>

      </div>

      <div class="modal-body panel panel-{{ ($user->is_active=='Activo') ? 'info': 'danger' }} panel-rol-{{$user->id or ''}}">

        <ul class="nav nav-tabs">

          <li class="active"><a data-toggle="tab" href="#showrol_tab_{{$rol->id}}">Info. General</a></li>

          <li><a data-toggle="tab" href="#showuser_tab_{{$user->id}}">Usuario</a></li>

        </ul>

        <div class="tab-content">

          <div id="showrol_tab_{{$rol->id}}" class="tab-pane fade in active">

            {{-- @php($user = $rol->user) --}}
            @include('admin.rols.thumbnail.rol')
            
          </div>

          <div id="showuser_tab_{{$user->id}}" class="tab-pane">

              @php($user = $rol->user)
              @include('admin.users.thumbnail.user')

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