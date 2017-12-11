@extends('admin.layouts.dashboard.app')
{{-- @section('page_heading','Listado de Perfiles') --}}
@section('section')
{{-- @include('admin.modal.dialoge_confirm') --}}
{{-- @include('admin.modal.operok') --}}
{{-- @include('admin.modal.opernook') --}}
<div class="container-fluid">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                Listados de Perfiles Registrados<br>
                <small class="text-default">
                    <strong><span id="profile_counter">{{$profiles->count()}}</span> Perfiles</strong>
                </small>
                
                <div class="btn-group pull-right">
                    {{--
                    <a title="Crear nuevo Usuario" class="btn btn-primary" href="#" data-toggle="modal" data-target="#profile-create" role="button">
                        <i class="fa fa-id-card-plus" aria-hidden="true"></i>
                    </a>
                    --}}

                    <a title="Crear nuevo Usuario" class="btn btn-primary" href="{{ route('profiles.create') }}" role="button">
                        <i class="fa fa-id-card-plus" aria-hidden="true"></i>
                    </a>

                    {{--
                    <a title="Listado de Perfiles" class="btn btn-info" href="{{ route('profiles.index') }}" role="button">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    </a>
                    <a title="Eliminados" class="btn btn-danger" href="{{ route('profiles.trash') }}" role="button">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                    --}}

                </div>



            </h3>
        </div>

        <div class="panel-body">

            {{-- modal con el formulario para crear usuarios --}}
            {{-- @include('admin.profiles.modals.create') --}}
            
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
            {{-- @include('admin.profiles.partials.field_search',['route'=>'profiles.index']) --}}
            {{-- FIN Barra de busqueda Filtros --}}

            {{-- partial con el listado de los usuarios --}}
            @include('admin.profiles.table.list')

            {{-- botones de paginacon --}}
            {{--
            <div align="right">                        
                {{ $profiles->links() }}
            </div>
            --}}
        </div>
    </div>
</div>
{!! Form::open(['route' => ['profiles.destroy',':PROFILE_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'role'=>'form']) !!}
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
            $('#table-data-profile').DataTable({
                responsive: false,
                pageLength: {{ Auth::user()->getSetting('numregpag_profilelist') }},
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
            $('.btn-update-profile').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr'); //console.log(row); //fila contentiva de la data
                var id_profile = row.data('id');  //console.log('id_profile: '+id_profile);
                var idform = '#form-update-profile_'+id_profile; //console.log(idform);
                var form = $(idform); //console.log(form.attr('action'));
                var url = form.attr('action'); //console.log(url);
                var data = form.serialize(); //console.log(data);
                var modal_active = 'editprofile_modal_'+id_profile; //console.log('modal_active: '+modal_active);

                $.post(url, data, function (result){
                    // $("#msg_modal_admin_operok").text(result.messenge);
                    console.log(result.messenge);
                    $("#"+modal_active).modal('hide');
                    $('#td-username-'+id_profile).text(result.username);
                    $('#td-username-'+id_profile).attr('class', 'text-'+result.is_active);
                    $('#td-is_active-'+id_profile).text(result.is_active);
                    $('#td-is_active-'+id_profile).attr('class', 'text-'+result.is_active);
                }).fail(function (result) {
                    console.log(result.messenge);
                    $.each(result.responseJSON.errors,function(index,valor){
                        // console.log('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_"+id_profile).html(valor);
                        $("#error_msg_"+index+"_"+id_profile).fadeIn();
                    });
                });

            });//fin del evento clic

            // script para realizar el borrado del registro
            $('.btn-delete').click(function (e) {
                e.preventDefault();
                r = confirm("Estas seguro de realizar esta acción?");
                if (r) {
                    var row = $(this).parents('tr'); //fila contentiva de la data
                    var id = row.data('id');  console.log(id);
                    var row_info = $('#profile_table_collapse'+id).parents('tr'); console.log(row_info)//fila contentiva del collapsible
                    var form = $('#form-delete'); console.log(form.attr('action'));
                    var url = form.attr('action').replace(':PROFILE_ID',id); console.log(url);
                    var data = form.serialize(); console.log(data);

                    $.post(url, data, function (result){
                        console.log(result.messenge);
                        row.fadeOut();
                        row_info.fadeOut();
                        var profile_counter = $("#profile_counter").text() - 1;
                        $("#profile_counter").text(profile_counter);
                        $("#msg_modal_admin_operok").text('Registro eliminado');
                        $("#admin_operok").modal('show');
                    }).fail(function () {
                        // alert('El usuario no fué eliminado');
                        $("#admin_oper_nook").modal('toggle');
                        $.each(result.responseJSON.errors,function(index,valor){
                            //console.log('Index: '+index+' - Valor: '+valor);
                            $("#msg_"+index+"_"+id_profile).html(valor);
                            $("#error_msg_"+index+"_"+id_profile).fadeIn();
                        });                    
                    });
                }
            });//fin del evento clic

            // script para realizar para registrar nuevo usuario usando peticiones ajax
            // $('.btn-profile-create').click(function (e) {
            //     e.preventDefault();
            //     var id_profile = $(this).attr('id'); //console.log(id_profile);
            //     var idform = '#form-profile-create'; //console.log(idform);
            //     var form = $(idform); //console.log(form);
            //     var url = form.attr('action'); //console.log(url);
            //     var data = form.serialize(); //console.log(data);
            //     var modal_active = 'profile-create'; //console.log('modal_active: '+modal_active);

            //     $.post(url, data, function (result){
            //         console.log(result.messenge);
            //         location.reload();
            //     }).fail(function (result) {
            //         $.each(result.responseJSON.errors,function(index,valor){
            //             console.log(result.messenge);
            //             $("#msg_"+index+"_"+id_profile).html(valor);
            //             $("#error_msg_"+index+"_"+id_profile).fadeIn();
            //         });
            //     });
            // });//fin del evento clic

        });
    </script>
@endsection