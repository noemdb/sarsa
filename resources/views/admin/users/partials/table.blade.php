{{-- <table class="table table-striped table-bordered table-hover" id="table-data-user"> --}}
<table width="100%" class="table table-striped table-hover" id="table-data-user">
    <thead>
        <tr>
            <th class="hidden-xs">N</th>
            <th>Usuario</th>
            <th class="hidden-xs hidden-sm">Email</th>
            <th class="hidden-xs">Estado</th>
            <th><strong>Roles</strong></th>
            <th class="hidden-sm" title="Rango">Rango</th>
            <th align="right" class="no-sort"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">
    @php ($n=1)
    @foreach($users as $user)

        @php ($rol = $user->rols->where('finicial','<=',date('Y-m-d'))->where('ffinal','>=',date('Y-m-d'))->last())
        
        <tr data-id="{{$user->id}}" data-profile="{{$user->profile->id or ''}}">
            <td class="hidden-xs">
                {{$n++}}
            </td>
            <td id="username">

                <span class="text text-{{ $user->is_active }}">{{$user->username}}</span>

            </td>
            <td class="hidden-xs hidden-sm" id="email">
                {{$user->profile->email or ''}}
            </td>

            <td class="hidden-xs status-{{ $user->is_active }}" id="is_active">
                {{$user->is_active}}
            </td>

            <td class="rol-{{ $rol['rol'] or '' }}" id="rol">
                 {{$rol['rol']}}
            </td>

            <td class="hidden-sm rango-{{ $rol['rango'] or '' }}" id="rango">
                {{$rol['rango']}}                
            </td>

            <td align="right" style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $user->id }}">
                <div class="btn-group">
                    
                    {{-- boton para mostrar en un modal de info de regsitro --}}
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" id="showuser_modal" data-target="#showuser_modal_{{$user->id}}">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>

                    @include('admin.users.modals.showuser')


                    {{-- boton para mostrar en un modal de edicion de regsitro --}}
                    <a title="Editar resgistro" class="btn btn-warning btn-xs" href="#" data-toggle="modal" id="btn-edituser_{{$user->id}}" data-target="#edituser_modal_{{$user->id}}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    {{-- modal confirmacion de borrado del registro --}}
                    {{-- @include('admin.users.modal.del_corfirm') --}}

                    {{-- modal para la edición del registro --}}
                    {{-- @include('admin.users.modal.edituser') --}}

                    <a title="Eliminar" class="btn-delete btn btn-danger btn-xs" href="" id="btn-delete-userid_{{$user->id}}" data-target="#modal-del-confirm_{{$user->id}}" data-toggle="modal" role="button">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>

                </div>
            </td>

            
        </tr>
        @endforeach
    </tbody>
</table>