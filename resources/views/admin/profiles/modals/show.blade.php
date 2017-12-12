<!-- Modal -->
<div class="modal fade " id="showprofile_modal_{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_profile_{{ $profile->id }}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header detail">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          {{-- <span class="ion-close-round" aria-hidden="true"></span> --}}
          <i class="fa fa-close" aria-hidden="true"></i>
        </button>

        <h4 class="modal-title" align="left" id="myModalLabel_profile_{{ $profile->id }}"><strong>Datos del Perfil</strong></h4>
      </div>

      <div class="modal-body panel panel-{{ ($user->is_active=='Activo') ? 'info': 'danger' }}">

      {{-- <div class="modal-body" align="left"> --}}

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#showprofile_tab_{{$profile->id}}">Perfíl</a></li>
          <li><a data-toggle="tab" href="#showuser_tab_{{$user->id}}">Usuario</a></li>
        </ul>

        <div class="tab-content">
          <div id="showprofile_tab_{{$profile->id}}" class="tab-pane fade in active">

            {{-- @php($user = $profile->user) --}}
            @include('admin.profiles.thumbnail.profile')
            
          </div>
          <div id="showuser_tab_{{$user->id}}" class="tab-pane">

              {{-- @php($user = $profile->user) --}}
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