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

    });
    //fin del evento clic
});