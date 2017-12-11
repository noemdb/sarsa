{{-- <table class="table table-striped table-bordered table-hover" id="table-data-profile"> --}}
<table width="100%" class="table table-striped table-hover" id="table-data-profile">
    <thead>
        <tr>
            <th class="hidden-xs">N</th>
            <th>Usuario</th>
            <th class="hidden-xs hidden-sm">Nombre</th>
            <th class="hidden-xs">Email</th>
            <th>Estado</th>
            <th align="right" class="no-sort"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">
    @php ($n=1)
    @foreach($profiles as $profile)

        {{-- @php ($rol = $profile->rols->where('finicial','<=',date('Y-m-d'))->where('ffinal','>=',date('Y-m-d'))->last()) --}}
        
        <tr data-id="{{$profile->id}}" data-profile="{{$profile->profile->id or ''}}">
            <td class="hidden-xs">
                {{$n++}}
            </td>
            <td id="td-username-{{$profile->id}}" class="text text-{{ $profile->user->is_active }}">
                {{$profile->user->username}}
            </td>
            <td  id="td-fullname-{{$profile->id}}" class="hidden-xs hidden-sm">
                {{$profile->full_name or ''}}
                
            </td>

            <td id="td-is_email-{{$profile->id}}" class="hidden-xs ">
                {{$profile->email or ''}}
            </td>

            <td id="td-estado-{{$profile->id}}" class="text-{{ $profile->user->is_active }}">
                 {{$profile->user->is_active}}
            </td>


            <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $profile->id }}">
                <div class="btn-group">
                    
                    {{-- boton para mostrar en un modal de info de regsitro --}}
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" id="showuser_modal" data-target="#showuser_modal_{{$profile->id}}">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>

                    @include('admin.profiles.modals.show')

                    {{-- boton para mostrar en un modal de edicion de regsitro --}}
                    <a title="Editar resgistro" class="btn btn-warning btn-xs" href="#" data-toggle="modal" id="btn-edituser_{{$profile->id}}" data-target="#edituser_modal_{{$profile->id}}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    {{-- modal confirmacion de borrado del registro --}}
                    {{-- @include('admin.users.modal.del_corfirm') --}}

                    {{-- modal para la edición del registro --}}
                    {{-- @include('admin.users.modal.edituser') --}}

                    {{-- @include('admin.users.modals.edit') --}}

                    <a title="Eliminar" class="btn-delete btn btn-danger btn-xs" href="" id="btn-delete-userid_{{$profile->id}}" data-target="#modal-del-confirm_{{$profile->id}}" data-toggle="modal" role="button">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>

                </div>
            </td>

            
        </tr>
        @endforeach
    </tbody>
</table>