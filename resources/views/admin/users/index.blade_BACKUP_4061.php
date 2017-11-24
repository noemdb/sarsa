@extends('admin.layouts.dashboard.app')
{{-- @section('page_heading','Listado de Usuarios') --}}
@section('section')
{{-- @include('admin.modal.dialoge_confirm') --}}
{{-- @include('admin.modal.operok') --}}
{{-- @include('admin.modal.opernook') --}}
<div class="container-fluid">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                Listados de Usuarios Registrados<br>
                <small class="text-default"><strong>{{$users->count()}} Usuarios</strong></small>
                
                <div class="btn-group pull-right">
                    <a title="Crear nuevo Usuario" class="btn btn-primary" href="#" data-toggle="modal" data-target="#user-create" role="button">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </a>

                    {{--
                    <a title="Listado de Perfiles" class="btn btn-info" href="{{ route('profiles.index') }}" role="button">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    </a>
                    <a title="Eliminados" class="btn btn-danger" href="{{ route('users.trash') }}" role="button">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                    --}}
                </div>

            </h3>
        </div>

        <div class="panel-body">

            {{-- formulario para crear usuarios --}}
            @include('admin.users.modals.create')                    
            
            {{-- Mensaje flash sobreo operaciones con base de datos --}}
            @if (Session::has('operp_ok'))
                <div class="alert alert-success alert-dismissible show" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    {{Session::get('operp_ok')}}.
                </div>
            @endif

            {{-- INI Barra de busqueda Filtros --}}
            {{-- @include('admin.users.partials.field_search',['route'=>'users.index']) --}}
            {{-- FIN Barra de busqueda Filtros --}}

            {{-- partial con el listado de los usuarios --}}
            @include('admin.users.table.list')

            {{-- botones de paginacon --}}
            {{--
            <div align="right">                        
                {{ $users->links() }}
            </div>
            --}}
        </div>
    </div>
</div>
{!! Form::open(['route' => ['users.destroy',':USER_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'role'=>'form']) !!}
{!! Form::close() !!}
@endsection

@section('stylesheet')
    @parent
    <link rel="stylesheet" href="{{ asset('vendor/datatables/DataTables-1.10.16/css/dataTables.bootstrap.css') }}">
@endsection


@section('scripts')
    @parent
    <script src="{{ asset("vendor/datatables/DataTables-1.10.16/js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("vendor/datatables/DataTables-1.10.16/js/dataTables.bootstrap.js") }}"></script>

    <script>
        $(document).ready(function() {
            $('#table-data-user').DataTable({
                responsive: false,
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

    <script>
        $(document).ready(function () {

            // script para realizar para actualizar registros usando peticiones ajax
            $('.btn-update-user').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr'); //console.log(row); //fila contentiva de la data
                var id_user = row.data('id');  //console.log('id_user: '+id_user);
                var idform = '#form-update-user_'+id_user; //console.log(idform);
                var form = $(idform); //console.log(form.attr('action'));
                var url = form.attr('action'); //console.log(url);
                var data = form.serialize(); //console.log(data);
                var modal_active = 'edituser_modal_'+id_user; //console.log('modal_active: '+modal_active);

                $.post(url, data, function (result){
                    // $("#msg_modal_admin_operok").text(result.messenge);
                    console.log(result.messenge);
                    $("#"+modal_active).modal('hide');
                    $('#td-username-'+id_user).text(result.username);
                    $('#td-username-'+id_user).attr('class', 'text-'+result.is_active);
                    $('#td-is_active-'+id_user).text(result.is_active);
                    $('#td-is_active-'+id_user).attr('class', 'text-'+result.is_active);
                }).fail(function (result) {
                    console.log(result.messenge);
                    $.each(result.responseJSON.errors,function(index,valor){
                        // console.log('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_"+id_user).html(valor);
                        $("#error_msg_"+index+"_"+id_user).fadeIn();
                    });
                });

            });//fin del evento clic

            // script para realizar para registrar nuevo usuario usando peticiones ajax
            $('.btn-user-create').click(function (e) {
                // e.preventDefault();
                var id_user = $(this).attr('id'); //console.log(id_user);
                var idform = '#form-user-create'; //console.log(form.attr('action'));
                var form = $(idform); //console.log(idform);
                var url = form.attr('action'); //console.log(url);
                var data = form.serialize(); //console.log(data);
                var modal_active = 'user-create'; //console.log('modal_active: '+modal_active);

                $.post(url, data, function (result){
                    console.log(result.messenge);
                    //location.reload();
                }).fail(function (result) {
                    $.each(result.responseJSON.errors,function(index,valor){
<<<<<<< HEAD
                        console.log('Index: '+index+' - Valor: '+valor);
=======
                        console.log(result.messenge);
>>>>>>> 324efc59050d16f170d3d80ed2d218efa8b9270f
                        $("#msg_"+index+"_"+id_user).html(valor);
                        $("#error_msg_"+index+"_"+id_user).fadeIn();
                    });
                });
            });//fin del evento clic

            // script para realizar el borrado del registro
            $('.btn-delete').click(function (e) {
                r = confirm("Estas seguro de realizar esta acción?");
                if (r) {
                    // e.preventDefault();
                    var row = $(this).parents('tr'); //fila contentiva de la data
                    var id = row.data('id');  console.log(id);
                    var row_info = $('#user_table_collapse'+id).parents('tr'); console.log(row_info)//fila contentiva del collapsible
                    var form = $('#form-delete'); console.log(form.attr('action'));
                    var url = form.attr('action').replace(':USER_ID',id); console.log(url);
                    var data = form.serialize(); console.log(data);

                    $.post(url, data, function (result){
                        console.log(result.messenge);
                        row.fadeOut();
                        row_info.fadeOut();
                        $("#msg_modal_admin_operok").text('Registro eliminado');
                        $("#admin_operok").modal('show');
                    }).fail(function () {
                        // alert('El usuario no fué eliminado');
                        $("#admin_oper_nook").modal('toggle');
                        $.each(result.responseJSON.errors,function(index,valor){
                            //console.log('Index: '+index+' - Valor: '+valor);
                            $("#msg_"+index+"_"+id_user).html(valor);
                            $("#error_msg_"+index+"_"+id_user).fadeIn();
                        });                    
                    });
                }
            });//fin del evento clic

        });
    </script>

@endsection