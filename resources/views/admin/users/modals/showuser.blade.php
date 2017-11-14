<!-- Modal -->
<div class="modal fade " id="showuser_modal_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header detail">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          {{-- <span class="ion-close-round" aria-hidden="true"></span> --}}
          <i class="fa fa-close" aria-hidden="true"></i>
        </button>

        <h5 class="modal-title" align="left" id="myModalLabel"><strong>Detalles de Usuario</strong></h5>
      </div>

      @if($user->is_active=='Activo')
          <div class="modal-body panel panel-info">
      @else
          <div class="modal-body panel panel-danger">
      @endif

      
      {{-- <div class="modal-body" align="left"> --}}


        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#showuser_tab_{{$user->id}}_general">Detalles</a></li>
          <li><a data-toggle="tab" href="#showuser_tab_{{$user->id}}_other1">Perfíl</a></li>
          <li><a data-toggle="tab" href="#showuser_tab_{{$user->id}}_other2">Roles</a></li>
        </ul>

        <div class="tab-content">
          <div id="showuser_tab_{{$user->id}}_general" class="tab-pane fade in active">
            {{-- <h3>General</h3> --}}
            {{-- <br> --}}
            {{-- <div class="panel panel-info"> --}}
              @include('admin.users.partials.user')
            {{-- </div> --}}
          </div>
          <div id="showuser_tab_{{$user->id}}_other1" class="tab-pane fade">
            {{-- <h3>Menu 1</h3> --}}
            @include('admin.users.partials.profile')
          </div>
          <div id="showuser_tab_{{$user->id}}_other2" class="tab-pane fade">
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