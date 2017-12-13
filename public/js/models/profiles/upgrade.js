$(document).ready(function () {
	// script para realizar para actualizar registros usando peticiones ajax
    $('.btn-update-profile').click(function (e) {
        e.preventDefault();
        var row = $(this).parents('tr'); //console.log(row); //fila contentiva de la data
        var id_profile = row.data('profile');  //console.log('id_profile: '+id_profile);
        var id_user = row.data('user');  //console.log('id_profile: '+id_user);
        var idform = '#form-update-profile_'+id_profile; //console.log(idform);
        var form = $(idform); //console.log(form.attr('action'));
        var url = form.attr('action'); //console.log(url);
        var data = form.serialize(); console.log(data);
        var modal_active = 'edit_modal_'+id_user; //console.log('modal_active: '+modal_active);

        $.post(url, data, function (result){
            // $("#msg_modal_admin_operok").text(result.messenge);
            console.log(result.messenge);
            $("#"+modal_active).modal('hide');
            $('.text-profiles-firstname-'+id_profile).text(result.firstname);
            $('.text-profiles-lastname-'+id_profile).text(result.lastname);
            $('.text-profiles-email-'+id_profile).text(result.email);
            // $('#td-profilename-'+id_profile).attr('class', 'text-'+result.is_active);
            // $('#td-is_active-'+id_profile).text(result.is_active);
            // $('#td-is_active-'+id_profile).attr('class', 'text-'+result.is_active);
        }).fail(function (result) {
            console.log(result.messenge);
            $.each(result.responseJSON.errors,function(index,valor){
                // console.log('Index: '+index+' - Valor: '+valor);
                $("#msg_"+index+"_"+id_profile).html(valor);
                $("#error_msg_"+index+"_"+id_profile).fadeIn();
            });
        });

    });
    //fin del evento clic
});