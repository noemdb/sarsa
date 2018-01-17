// script para realizar el borrado del registro
$('.btn-delete').click(function (e) {
    e.preventDefault();
    // r = confirm("Estas seguro de realizar esta acción?");
    if (confirm("Estas seguro de realizar esta acción?")) {
        var row = $(this).parents('tr'); //fila contentiva de la data
        var id = row.data('user');  //console.log(id);
        var row_info = $('#user_table_collapse'+id).parents('tr'); //console.log(row_info)//fila contentiva del collapsible
        var form = $('#form-delete'); //console.log(form.attr('action'));
        var url = form.attr('action').replace(':USER_ID',id); //console.log(url);
        var data = form.serialize(); //console.log(data);
        var text_user_delete = "#text-user-delete-result-oper"; //console.log('profile_create_ok: '+profile_create_ok);

        $.post(url, data, function (result){
            //console.log(result.messenge+result.operation);
            if (result.operation=='delete') {
                $('.btn-action-group-'+id).fadeOut();
            }
            if (result.operation=='forceDelete') {
                row.fadeOut();
                // row_info.fadeOut();
            }

            $(text_user_delete).removeClass("text-danger").addClass("text-success show").text(result.messenge);
            
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