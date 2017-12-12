<!-- Modal -->
<div class="modal fade " id="editprofile_modal_{{$profile->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header detail">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          {{-- <span class="ion-close-round" aria-hidden="true"></span> --}}
          <i class="fa fa-close" aria-hidden="true"></i>
        </button>

        <h5 class="modal-title" align="left" id="myModalLabel"><strong>Datos de Usuario</strong></h5>
      </div>

      <div class="modal-body panel panel-{{ ($user->is_active=='Activo') ? 'info': 'danger' }}">

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#editprofile_tab_{{$user->id}}_general">Perfil</a></li>
          <li><a data-toggle="tab" href="#edituser_tab_{{$user->id}}_general">Usuario</a></li>
          <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
        </ul>

        <div class="tab-content">
          <div id="editprofile_tab_{{$user->id}}_general" class="tab-pane fade in active">
            {{-- <h3>HOME</h3> --}}
            @include('admin.profiles.forms.update',['class_form_update_profile'=>'warning'])
          </div>
          <div id="edituser_tab_{{$user->id}}_general" class="tab-pane fade">
            {{-- <h3>Menu 1</h3><p>Some content in menu 1.</p> --}}
            @include('admin.users.forms.update',['class_form_update_user'=>'warning'])
          </div>
          <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Some content in menu 2.</p>
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
