<!--INI Modal -->
<div class="modal fade" id="user-create" role="dialog">

  <div class="modal-dialog" role="document">
  
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header detail">

        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          
          <i class="fa fa-close" aria-hidden="true"></i>

        </button>

        <h5 class="modal-title" align="left" id="myModalLabel"><strong>Registro de usuarios</strong></h5>

      </div>
      
      <div class="modal-body">

        @include('admin.users.forms.create',['class_form_create_user'=>'info'])

      </div>

    </div>
    
  </div>

</div>
<!--FIN Modal -->