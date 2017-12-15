$(document).ready(function () {
	// script para realizar para actualizar registros usando peticiones ajax
    $('.btn-update-user').click(function (e) {
        e.preventDefault();
        var row = $(this).parents('tr'); //console.log(row); //fila contentiva de la data
        var id_user = row.data('user');  console.log('id_user: '+id_user);
        var idform = '#form-update-user_'+id_user; //console.log(idform);
        var form = $(idform); //console.log(form.attr('action'));
        var url = form.attr('action'); //console.log(url);
        var data = form.serialize(); console.log(data);
        var modal_active = 'edit_modal_'+id_user; //console.log('modal_active: '+modal_active);

        //limpia los div de errores anteriores
        $(".div-alert").each(function(){
          $(this).removeClass("show");
          $(this).addClass("hide");
        });

        //limpia los div de los input del form
        $(".div-form-input").each(function(){
          $(this).removeClass("has-error");
        });

        $.post(url, data, function (result){
            // $("#msg_modal_admin_operok").text(result.messenge);
            console.log(result.messenge);
            // $("#"+modal_active).modal('hide');
            $('.text-users-username-'+id_user).text(result.username);
            $('.text-users-username-'+id_user).attr('class', 'text-'+result.is_active+' text-users-username-'+id_user);
            $('.text-users-is_active-'+id_user).text(result.is_active);
            $('.text-users-is_active-'+id_user).attr('class', 'text-'+result.is_active+' text-users-is_active-'+id_user);

            var id_div_oper = "#alert_result_ok_"+id_user;
            $(id_div_oper).removeClass("hide");
            $(id_div_oper).addClass( "show" );
            $(id_div_oper).text(result.messenge);
        }).fail(function (result) {
            //console.log(result.messenge);
            $.each(result.responseJSON.errors,function(index,valor){
                var id_error_msg = "#error_msg_"+index+"_"+id_user;
                var id_div_input = "#div_input_"+index+"_"+id_user;
                $(id_error_msg).text(valor);
                $(id_error_msg).removeClass("hide");
                $(id_error_msg).addClass( "show" );
                $(id_div_input).addClass( "has-error" );
            });
        });

    });
    //fin del evento clic
});