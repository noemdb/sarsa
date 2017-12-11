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

      @if($user->is_active=='Activo')
          <div class="modal-body panel panel-info">
      @else
          <div class="modal-body panel panel-danger">
      @endif

      {{-- <div class="modal-body" align="left"> --}}

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#editprofile_tab_{{$profile->id}}_general">Perfil</a></li>
          <li><a data-toggle="tab" href="#edituser_tab_{{$profile->id}}_other1">Usuario</a></li>
        </ul>

        <div class="tab-content">

          <div id="editprofile_tab_{{$profile->id}}_general" class="tab-pane fade in active">

              @include('admin.profiles.forms.update',['class_form_update_profile'=>'warning'])

          </div>

          <div id="edituser_tab_{{$profile->id}}_other1" class="tab-pane fade">
            
            {{-- <h3>Menu 1</h3> --}}
            {{-- @include('admin.profiles.partials.profile') --}}

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