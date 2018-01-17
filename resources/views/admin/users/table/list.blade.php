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
        
        @php ($profile = $user->profile)

        @php ($rol = $user->rols->last())
        
        <tr data-user="{{$user->id}}" data-profile="{{$profile->id or ''}}">
            <td id="td-count" class="hidden-xs">
                {{$n++}}
            </td>
            <td id="td-users-username-{{ $user->id }}">
                <span class="text-users-username-{{ $user->id }} text-{{ $user->is_active }}">
                    {{$user->username}}
                </span>
            </td>
            <td id="td-profiles-email-{{ $user->id }}" class="hidden-xs hidden-sm">
                <span class="text-profiles-email-{{ $profile->id or ''}}">
                    {{ $profile->email or ''}}
                </span>
            </td>

            <td id="td-users-is_active-{{ $user->id }}"  class="hidden-xs">
                <span class="text-users-is_active-{{ $user->id }} text-{{ $user->is_active }}">
                    {{$user->is_active}}
                </span>
            </td>

            <td id="td-rols-rango-{{$user->id}}">
                <span class="text-rols-rol-{{ $rol['id'] }} rol-{{ $rol['rol'] or '' }}">
                    {{$rol['rol']}}
                 </span>
            </td>

            <td id="td-rango-{{$user->id}}" class="hidden-sm">
                <span class="text-rols-rango-{{ $rol['id'] }} rango-{{ $rol['rango'] or '' }}">
                    {{$rol['rango']}}                
                </span>
            </td>

            <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $user->id }}">
                <div class="btn-group">
                    
                    
                    {{-- boton para mostrar en un modal de info de regsitro --}}
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" id="showuser_modal" data-target="#showuser_modal_{{$user->id}}">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    @include('admin.users.modals.show')

                    @empty($user->deleted_at)
                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $user->id }}" href="{{ route('users.edit',$user->id) }}" id="btn-edituser_{{$user->id}}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                    @endempty

                    <a title="Eliminar {{(isset($user->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="" id="btn-delete-userid_{{$user->id}}" data-target="#modal-del-confirm_{{$user->id}}" data-toggle="modal" role="button">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                    
                </div>
            </td>

            
        </tr>
        @endforeach
    </tbody>
</table>

<strong>
  <small>
    <span id="text-user-delete-result-oper" class="hide text-success"></span>
  </small>
</strong>

@section('stylesheet')

    @parent

    <link rel="stylesheet" href="{{ asset('vendor/datatables/DataTables-1.10.16/css/dataTables.bootstrap.css') }}">

@endsection

@section('scripts')
    @parent

    <script src="{{ asset("vendor/datatables/DataTables-1.10.16/js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("vendor/datatables/DataTables-1.10.16/js/dataTables.bootstrap.js") }}"></script>

    {{-- INI datatable --}}
    <script>

        $(document).ready(function() {
            $('#table-data-user').DataTable({
                responsive: false,
                pageLength: {{ Auth::user()->getSetting('numregpag_userlist') }},
                // order: [[ 0, "asc" ]],
                language: {
                    url: "{{ asset("vendor/datatables/lang/spanish.lang") }}"
                },
                 columnDefs: [ {
                      targets: 'no-sort',
                      orderable: false,
                } ]

            });
        });
        
    </script>
    {{-- FIN datatable --}}

@endsection