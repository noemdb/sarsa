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

        @php ($user = $profile->user)
        
        <tr data-profile="{{$profile->id}}" data-user="{{$user->id or ''}}">
            <td class="hidden-xs">
                {{$n++}}
            </td>
            {{-- 
            <td id="td-username-{{$profile->id}}" class="text text-{{ $user->is_active }}">
                {{$user->username}}
            </td> 
            --}}
            <td id="td-users-username-{{ $user->id or '' }}">
                <span class="text-users-username-{{ $user->id or '' }} text-{{ $user->is_active or '' }}">
                    {{$user->username or ''}}
                </span>
            </td>
            <td  id="td-fullname-{{$profile->id}}" class="hidden-xs hidden-sm">
                <span class="text-profiles-firstname-{{ $profile->id }}">{{$profile->firstname}}</span>
                <span class="text-profiles-lastname-{{ $profile->id }}">{{$profile->lastname}}</span>                
            </td>

            <td id="td-email-{{$profile->id}}" class="hidden-xs text-profiles-email-{{$profile->id}}">
                {{$profile->email}}
            </td>

            {{-- 
            <td id="td-estado-{{$profile->id}}" class="text-{{ $user->is_active }}">
                 {{$user->is_active}}
            </td> 
            --}}
            <td id="td-users-is_active-{{ $user->id or ''}}"  class="hidden-xs">
                <span class="text-users-is_active-{{ $user->id or '' }} text-{{ $user->is_active or '' }}">
                    {{$user->is_active or ''}}
                </span>
            </td>


            <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $profile->id }}">
                <div class="btn-group">
                    
                    {{-- boton para mostrar en un modal de info de regsitro --}}
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" id="showprofile_modal" data-target="#showprofile_modal_{{$profile->id}}">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    @include('admin.profiles.modals.show')

                    {{-- boton para mostrar en un modal de edicion de regsitro --}}
                    {{-- 
                    <a title="Editar resgistro" class="btn btn-warning btn-xs" href="#" data-toggle="modal" id="btn-editprofile_{{$profile->id}}" data-target="#edit_modal_{{$user->id}}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    @include('admin.profiles.modals.edit') 
                    --}}

                    <a title="Editar resgistro" class="btn btn-warning btn-xs" href="{{ route('profiles.edit',$profile->id) }}" id="btn-editprofile_{{$profile->id}}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <a title="Eliminar" class="btn-delete btn btn-danger btn-xs" href="" id="btn-delete-userid_{{$profile->id}}" data-target="#modal-del-confirm_{{$profile->id}}" data-toggle="modal" role="button">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </div>
                
            </td>

            
        </tr>
        @endforeach
    </tbody>
</table>