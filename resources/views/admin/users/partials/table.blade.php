<table class="table table-striped" id="table-data-user">
    <tr>
        <th class="hidden-xs">N</th>
        <th>Usuario</th>
        <th class="hidden-xs hidden-sm">Email</th>
        <th class="hidden-xs">Estado</th>
        <th><strong>Tipo</strong></th>
        <th class="hidden-xs" title="Roles">Roles</th>
        <td align="right"><strong>Aciones</strong></td>
    </tr>

    <tbody id="tdatos">
        @php ($n=1)
    @foreach($users as $user)
        
        <tr data-id="{{$user->id}}" data-profile="{{$user->id_profile}}">
            <td class="hidden-xs">{{$n++}}</td>
            <td id="username">
                 @if($user->is_active=="Desactivo")
                    <span class="text text-danger">{{$user->username}}</span>
                @else
                    <span class="text text-primary">{{$user->username}}</span>
                @endif

                @if(is_null($user->id_profile) && !$user->trashed())
                    <span class="label label-danger pull-right" title="Perfil no encontrado">
                        <span class="ion-alert" aria-hidden="true"></span>
                    </span>
                @endif

            </td>
            <td class="hidden-xs hidden-sm" id="email">{{$user->profile->email}}</td>
            <td class="hidden-xs alert alert-{{$user->is_active}}" id="is_active">
                {{$user->is_active}}
            </td>
            <td align="left" class="alert alert-{{$user->is_admin}}">
                {{$user->is_admin}}
            </td>

            <td class="hidden-xs" id="rol">
                <div class="label-group">
                    <span class="label label-user{{$user->is_user1}}">{{$user->is_user1}}</span>
                    <span class="label label-user{{$user->is_user2}}">{{$user->is_user2}}</span>
                    <span class="label label-user{{$user->is_user3}}">{{$user->is_user3}}</span>
                </div>
            </td>

            <td align="right" style="padding: 2px; vertical-align: middle;" id="action">
                <div class="btn-group">
                    
                    {{-- boton para mostrar en un modal de info de regsitro --}}
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" id="showuser_modal" data-target="#showuser_modal_{{$user->id}}">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    {{-- @include('admin.users.modal.showuser') --}}

                    @if ($user->trashed())
                        <a title="Restaurar"
                            {{-- onclick="return confirm('Estas seguro? se restaurará el usuario y su perfil asociado')" --}}
                            class="btn-restore btn btn-primary btn-xs"
                            {{-- href="{{route('users.restore',$user->id)}}" --}}
                            href="" 
                            role="button">
                            <span class="ion-loop" aria-hidden="true"></span>
                        </a>

                        <a  title="Borrar definitivamente" 
                            {{-- onclick="return confirm('Estas seguro? Se eliminará definitivamente usuario y su perfile asociado')" --}}
                            class="btn-force-destroy btn btn-danger btn-xs"
                            {{-- href="{{route('users.force_destroy',$user->id)}}" --}}
                            href="#" 
                            role="button">
                            <span class="ion-close-circled" aria-hidden="true"></span>
                        </a>
                    @else
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
                        


                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>