{{-- <table class="table table-striped table-bordered table-hover" id="table-data-rol"> --}}
<table width="100%" class="table table-striped table-hover" id="table-data-rols">
    <thead>
        <tr>
            <th>N</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Rango</th>
            <th class="hidden-xs hidden-sm">F.Inicial</th>
            <th class="hidden-xs hidden-sm">F.Final</th>
            <th align="right" class="no-sort"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">
    @php ($n=1)
    @foreach($rols as $rol)

        @php ($user = $rol->user)
        @php ($profile = $rol->profile)
        
        <tr data-rol="{{$rol->id}}" data-user="{{$user->id or ''}}">

            <td>
                {{$n++}}
            </td>

            <td id="td-users-username-{{ $user->id or '' }}">
                <span class="text-users-username-{{ $user->id or '' }} text-{{ $user->is_active or '' }}">
                    {{$user->username or ''}}
                </span>
            </td>

            <td  id="td-rols-rol-{{$rol->id or ''}}" title="{{ $rol->descripcion or ''}} ">
                <span class="text-rols-rol-{{$rol->id}} rol-{{ $rol->rol or '' }}">
                    {{$rol->rol}}       
                </span>
            </td>

            <td id="td-rols-rango-{{$rol->id or ''}}">
                <span class=" text-rols-rango-{{$rol->id}} rango-{{ $rol->rango or '' }}">
                    {{$rol->rango}}
                </span>
            </td>

            <td id="td-rols-finicial-{{ $rol->id or ''}}" class="hidden-xs hidden-sm">
                <span class="text-rols-finicial-{{$rol->id}}">
                    {{ (isset($rol->finicial)) ? Carbon\Carbon::parse($rol->finicial)->format('d-m-Y') : '' }}
                </span>
            </td>

            <td id="td-rols-ffinal-{{ $rol->id or ''}}" class="hidden-xs hidden-sm">
                <span class="text-rols-ffinal-{{$rol->id}}">
                    {{ (isset($rol->ffinal)) ? Carbon\Carbon::parse($rol->ffinal)->format('d-m-Y') : '' }}
                </span>
            </td>


            <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $rol->id }}">
                <div class="btn-group">
                    
                    {{-- boton para mostrar en un modal de info de regsitro --}}
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" id="showrol_modal" data-target="#showrol_modal_{{$rol->id}}">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    @include('admin.rols.modals.show')

                    {{-- boton para mostrar en un modal de edicion de regsitro --}}
                    <a title="Editar resgistro" class="btn btn-warning btn-xs" href="#" data-toggle="modal" id="btn-editrol_{{$rol->id}}" data-target="#edit_modal_{{$user->id}}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    {{-- @include('admin.rols.modals.edit') --}}

                    <a title="Eliminar" class="btn-delete btn btn-danger btn-xs" href="" id="btn-delete-userid_{{$rol->id}}" data-target="#modal-del-confirm_{{$rol->id}}" data-toggle="modal" role="button">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </div>
                
            </td>

            
        </tr>
        @endforeach
    </tbody>
</table>